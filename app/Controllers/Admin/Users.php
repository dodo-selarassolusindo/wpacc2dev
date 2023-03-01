<?php  namespace App\Controllers\Admin;


use App\Controllers\GoBaseResourceController;

use App\Models\Collection;

use App\Entities\User;

use App\Models\UserModel;

class Users extends \App\Controllers\GoBaseResourceController { 

    protected $modelName = UserModel::class;
    protected $format = 'json';

    protected static $singularObjectName = 'User';
    protected static $singularObjectNameCc = 'user';
    protected static $pluralObjectName = 'User';
    protected static $pluralObjectNameCc = 'user';

    protected static $controllerSlug = 'users';

    protected static $viewPath = 'admin/userViews/';

    protected $indexRoute = 'userList';

    protected $formValidationRules = [
			'email' => 'required|max_length[255]|valid_email',
			'first_name' => 'trim|permit_empty|max_length[60]',
			'last_name' => 'trim|permit_empty|max_length[60]',
			'password' => 'strong_password',
			'picture' => 'trim|permit_empty|max_length[128]',
			'primary_phone' => 'trim|permit_empty|max_length[17]',
			'reset_expires' => 'valid_date|permit_empty',
			'status' => 'trim|permit_empty|max_length[255]',
			'status_message' => 'trim|permit_empty|max_length[255]',
			'username' => 'trim|permit_empty|required|alpha_numeric_punct|min_length[3]|max_length[30]|max_length[30]',
			'uuid' => 'trim|permit_empty|max_length[36]',
		];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('Users.moduleTitle');
        $this->viewData['usingSweetAlert'] = true;
        parent::initController($request, $response, $logger);
    }


    public function index() {
        if ( !logged_in() ) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
		if ( !in_groups('admin') ) {
			return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
		}
        $viewData = [
                'currentModule' => static::$controllerSlug,
                'pageSubTitle' => lang('Basic.global.ManageAllRecords', [lang('Users.user')]),
                'user' => new User(),
                'usingServerSideDataTable' => true,
                
            ];

        $viewData = array_merge($this->viewData, $viewData); // merge any possible values from the parent controller class

        return view(static::$viewPath.'viewUserList', $viewData);
    }


    public function add() {
        
        if ( !logged_in() ) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
		if ( !in_groups('admin') ) {
			return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
		}

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
            
			$permissions = $postData['permissions'] ?? $this->request->getPost('permissions');
			$groups = $postData['groups'] ?? $this->request->getPost('groups');
			unset($postData['permissions']);
			unset($postData['groups']);
			
			if (isset($postData['password']) && empty($postData['password']) ) :
			    unset($postData['password']);
			    unset($postData['pass_confirm']);
			endif;

			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);

			$this->formValidationRules['email'] .= "|is_unique[users.email]";
			$this->formValidationRules['password'] .= "|required";
			$this->formValidationRules['username'] .= "|is_unique[users.username]";

            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :


			$user = new User($sanitizedData);

			$this->db = $this->model->db;
			$this->db->transBegin();
    
				try {
				    if (!$successfulResult = $this->model->insert($user)) :
							$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('Users.user'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				    else:
				        $id = $successfulResult;
				        if ($permissions != null) :
				            foreach ($permissions as $permission) :
				                $this->authorize->addPermissionToUser($permission, $id);
				            endforeach;
				        endif;
            
				        if ($groups != null) :
				            foreach ($groups as $group) :
				                $this->authorize->addUserToGroup($id, $group);
				            endforeach;
				        endif;
    
				        $this->db->transCommit();
				    endif;
				} catch (\Exception $e) {
				    $this->db->transRollback();
				    $noException = false;
				    $this->dealWithException($e);
				}
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            endif;
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('Users.user'))]).'.';
                $message .= anchor( "admin/users/{$id}/edit" , lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to( $this->indexRoute )  )->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;

            endif; // $noException && $successfulResult

        endif; // ($requestMethod === 'post')

        $this->viewData['user'] = isset($sanitizedData) ? new User($sanitizedData) : new User();
		$this->viewData['permissions'] = [];
		$this->viewData['groups'] = [];
		$this->viewData['permissionsOfUser'] = [];
		$this->viewData['groupsOfUser'] = [];

		$permissions = $this->authorize->permissions();
		foreach ($permissions as $item) :
		    $this->viewData['permissions'] += [$item['id'] => $item['name']];
		endforeach;


		$groups = $this->authorize->groups();
		foreach ($groups as $obj) :
		    $this->viewData['groups'] += [$obj->id => $obj->name];
		endforeach;

		$this->viewData['permissionsOfUser'] = isset($user) ? array_keys($user->getPermissions()) : [];
		$this->viewData['groupsOfUser'] = isset($user) ? array_keys($user->getRoles()) : [];


        $this->viewData['formAction'] = route_to('createUser');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('Users.moduleTitle').' '.lang('Basic.global.addNewSuffix');
        

        return $this->displayForm(__METHOD__);
    } // end function add()

    public function edit($requestedId = null) {
        if ( !logged_in() ) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
		if ( !in_groups('admin') ) {
			return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
		}
        if ($requestedId == null) :
            return $this->redirect2listView();
        endif;
        $id = filter_var($requestedId, FILTER_SANITIZE_URL);
        $user = $this->model->find($id);
        
        if ($user == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('Users.user')), $id]);
            return $this->redirect2listView('sweet-error', $message);
        endif;
        
        $requestMethod = $this->request->getMethod();
        
        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
            
			$permissions = $postData['permissions'] ?? $this->request->getPost('permissions');
			$groups = $postData['groups'] ?? $this->request->getPost('groups');
			unset($postData['permissions']);
			unset($postData['groups']);
			
			if (isset($postData['password']) && empty($postData['password']) ) :
			    unset($postData['password']);
			    unset($postData['pass_confirm']);
			endif;

			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);
if ($this->request->getPost('active') == null ) {
				$sanitizedData['active'] = false;
			}
if ($this->request->getPost('force_pass_reset') == null ) {
				$sanitizedData['force_pass_reset'] = false;
			}


			$this->formValidationRules['email'] .= "|is_unique[users.email,id,{$id}]";
			$this->formValidationRules['password'] .= "|permit_empty|if_exist";
			$this->formValidationRules['username'] .= "|is_unique[users.username,id,{$id}]";

            
			$_REQUEST['id'] = $id;
            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :
            

            
            $this->db = $this->model->db;
            $this->db->transBegin();
            
            try {
                $user->fill($sanitizedData);
                $this->model->skipValidation(true)->update($id, $user);
            
                // delete existing permissions first
                $this->db->table('auth_users_permissions')->where('user_id', $id)->delete();
            
                // insert back submitted permissions
                if ($permissions != null) :
                    foreach ($permissions as $permission) :
                        $this->authorize->addPermissionToUser($permission, $id);
                    endforeach;
                endif;
        
                // delete existing groups from the user for resetting
                $this->db->table('auth_groups_users')->where('user_id', $id)->delete();

                if ($groups != null) :
                    foreach ($groups as $group) :
                        $this->authorize->addUserToGroup($id, $group);
                    endforeach;
                endif;

                $successfulResult = $this->db->transStatus();
                $this->db->transCommit();
            
            } catch (\Exception $e) {
                $this->db->transRollback();
                $noException = false;
                $this->dealWithException($e);
            }
                $thenRedirect = true;
            endif;
            if ($noException && $successfulResult) :
                $id = $user->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('Users.user'))]).'.';
                $message .= anchor( "admin/users/{$id}/edit" , lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));
            
                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to( $this->indexRoute )  )->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;
            
            endif; // $noException && $successfulResult
        endif; // ($requestMethod === 'post')
            
        $this->viewData['user'] = $user;
        		$this->viewData['permissions'] = [];
		$this->viewData['groups'] = [];
		$this->viewData['permissionsOfUser'] = [];
		$this->viewData['groupsOfUser'] = [];

		$permissions = $this->authorize->permissions();
		foreach ($permissions as $item) :
		    $this->viewData['permissions'] += [$item['id'] => $item['name']];
		endforeach;


		$groups = $this->authorize->groups();
		foreach ($groups as $obj) :
		    $this->viewData['groups'] += [$obj->id => $obj->name];
		endforeach;

		$this->viewData['permissionsOfUser'] = isset($user) ? array_keys($user->getPermissions()) : [];
		$this->viewData['groupsOfUser'] = isset($user) ? array_keys($user->getRoles()) : [];


        		$this->viewData['formAction'] = route_to('updateUser', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('Users.moduleTitle').' '.lang('Basic.global.edit3');
        
        
        return $this->displayForm(__METHOD__, $id);
        
    } // end function edit(...)
    


    public function datatable() {
        if ($this->request->isAJAX()) {
            $reqData = $this->request->getPost();
            if (!isset($reqData['draw']) || !isset($reqData['columns']) ) {
                $errstr = 'No data available in response to this specific request.';
                $response = $this->respond(Collection::datatable(  [], 0, 0, $errstr ), 400, $errstr);
                return $response;
            }
            $start = $reqData['start'] ?? 0;
            $length = $reqData['length'] ?? 5;
            $search = $reqData['search']['value'];
            $requestedOrder = $reqData['order']['0']['column'] ?? 1;
            $order = UserModel::SORTABLE[$requestedOrder > 0 ? $requestedOrder : 1];
            $dir = $reqData['order']['0']['dir'] ?? 'asc';

            $resourceData = $this->model->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject();

            return $this->respond(Collection::datatable(
                $resourceData,
                $this->model->getResource()->countAllResults(),
                $this->model->getResource($search)->countAllResults()
            ));
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }

    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id';
            $menu = $this->model->getAllForMenu($reqVal.', username', 'username', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->username = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
                'menu' => $menu,
                $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }

    public function menuItems() {
        if ($this->request->isAJAX()) {
            $searchStr = goSanitize($this->request->getPost('searchTerm'))[0];
            $reqId = goSanitize($this->request->getPost('id'))[0];
            $reqText = goSanitize($this->request->getPost('text'))[0];
            $onlyActiveOnes = false;
            $columns2select = [$reqId ?? 'id', $reqText ?? 'username'];
            $onlyActiveOnes = false;
            $menu = $this->model->getSelect2MenuItems($columns2select, $columns2select[1], $onlyActiveOnes, $searchStr);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->text = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
                'menu' => $menu,
                $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }

    /**
    * Show user profile or process data update.
    *
    * @return mixed
    */
    public function profile() {

        if (!logged_in()) {
            return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
        }

        $user = user();

        if ($this->request->getMethod() === 'post') {
            $id = user_id();
            $validationRules = [
                'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
                'username' => "required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,{$id}]",
                'password' => 'if_exist',
                'pass_confirm' => 'matches[password]',
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $postData = $this->request->getPost();
            $sanitizedData = $this->sanitized($postData);

            $sanitizedData['active'] = true;

            // if ($this->request->getPost('force_pass_reset') == null ) {
            $sanitizedData['force_pass_reset'] = false;
            // }

            if ($this->request->getPost('password')) {
                $user->password = $this->request->getPost('password');
                unset($sanitizedData['password']);
            }

            if (!empty($sanitizedData)) {
                $user->fill($sanitizedData);
            }

            $successMessage = lang('Basic.global.updateSuccess', [mb_strtolower(lang('Users.user'))]) . '.';
            $errorMessage = lang('Basic.global.persistErr2', [mb_strtolower(lang('Users.user'))]);

            if ($this->model->skipValidation(true)->update(user()->id, $user)) {
                return redirect()->to(base_url() )->with('sweet-success', $successMessage);
            }

            return redirect()->back()->withInput()->with('sweet-error', $errorMessage);
        }

        $hasFirstName = false;
        $hasLastName = false;
        if (isset($user->first_name) && !empty($user->first_name)) {
            $firstName = trim($user->first_name);
            $hasFirstName = true;
        }
        if (isset($user->last_name) && !empty($user->last_name)) {
            $lastName = trim($user->last_name);
            $hasLastName = true;
        }
        $this->viewData['firstName'] = $firstName ?? '';
        $this->viewData['lastName'] = $lastName ?? '';
        $this->viewData['userPic'] = isset($user->picture) && !empty($user->picture) ? $user->picture : '/assets/generic-user-avatar.png';
        $this->viewData['title'] = lang('Basic.global.profile');
        $this->viewData['userName'] = ($hasFirstName || $hasLastName) && method_exists($user, 'getFullName') ? $user->getFullName() : $user->username;
        $this->viewData['joinDate'] = user()->created_at->toLocalizedString('MMM d, yyyy'); // . ' ' . user()->created_at->humanize() ;

        $this->viewData['validation'] = \Config\Services::validation();

        return view('authViews/profile', $this->viewData);

    }
}
