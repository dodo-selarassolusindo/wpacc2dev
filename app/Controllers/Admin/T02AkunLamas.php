<?php  namespace App\Controllers\Admin;


use App\Entities\Admin\T02AkunLama;

class T02AkunLamas extends \App\Controllers\GoBaseController { 

	use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\T02AkunLamaModel';

    protected static $singularObjectNameCc = 'akunLama';
    protected static $singularObjectName = 'Akun Lama';
    protected static $pluralObjectName = 'Akun Lama';
    protected static $controllerSlug = 't02-akun-lamas';

    protected static $viewPath = 'admin/t02AkunLamaViews/';

    protected $indexRoute = 'akunLamaList';

    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T02AkunLamas.moduleTitle');
        parent::initController($request, $response, $logger);
        
    }

    public function index() {
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
        $this->viewData['usingClientSideDataTable'] = true;
        
		$this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('T02AkunLamas.akunLama')]);
        parent::index();

    }

    public function add() {
        
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :
            

				if ($this->canValidate()) :
					try {
						$successfulResult = $this->model->skipValidation(true)->save($sanitizedData);
					} catch (\Exception $e) {
						$noException = false;
						$this->dealWithException($e);
					}
				else:
					$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T02AkunLamas.akunLama'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				endif;
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            endif;
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('T02AkunLamas.akunLama'))]).'.';
                $message .= anchor(route_to('editAkunLama', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('successMessage', $message);
                    else:
                        return $this->redirect2listView('successMessage', $message);
                    endif;
                else:
                    $this->viewData['successMessage'] = $message;
                endif;

            endif; // $noException && $successfulResult

        endif; // ($requestMethod === 'post')

        $this->viewData['t02AkunLama'] = isset($sanitizedData) ? new T02AkunLama($sanitizedData) : new T02AkunLama();

        $this->viewData['formAction'] = route_to('createAkunLama');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('T02AkunLamas.akunLama').' '.lang('Basic.global.addNewSuffix');
        

        return $this->displayForm(__METHOD__);
    } // end function add()

    public function edit($requestedId = null) {
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
        if ($requestedId == null) :
            return $this->redirect2listView();
        endif;
        $id = filter_var($requestedId, FILTER_SANITIZE_URL);
        $t02AkunLama = $this->model->find($id);

        if ($t02AkunLama == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T02AkunLamas.akunLama')), $id]);
            return $this->redirect2listView('errorMessage', $message);
        endif;

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');
        
            $postData = $this->request->getPost();
            			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            
            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :
            
            

            	if ($this->canValidate()) :
            	    try {
            	        $successfulResult = $this->model->skipValidation(true)->update($id, $sanitizedData);
            	    } catch (\Exception $e) {
            	        $noException = false;
            	        $this->dealWithException($e);
            	    }
            	else:
            	    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T02AkunLamas.akunLama'))]);
            	    $this->session->setFlashdata('formErrors', $this->model->errors());
            	
            	endif;
            	
            	$t02AkunLama->fill($sanitizedData);

            	$thenRedirect = true;
            endif;
            if ($noException && $successfulResult) :
                $id = $t02AkunLama->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('T02AkunLamas.akunLama'))]).'.';
                $message .= anchor(route_to('editAkunLama', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('successMessage', $message);
                    else:
                        return $this->redirect2listView('successMessage', $message);
                    endif;
                else:
                    $this->viewData['successMessage'] = $message;
                endif;
        
            endif; // $noException && $successfulResult
        endif; // ($requestMethod === 'post')

        $this->viewData['t02AkunLama'] = $t02AkunLama;

        $this->viewData['formAction'] = route_to('updateAkunLama', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('T02AkunLamas.akunLama').' '.lang('Basic.global.edit3');
        
        
        return $this->displayForm(__METHOD__, $id);
    } // end function edit(...)
    
    

    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id';
            $menu = $this->model->getAllForMenu($reqVal.', nama', 'nama', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->nama = '- '.lang('Basic.global.None').' -';
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
            $columns2select = [$reqId ?? 'id', $reqText ?? 'nama'];
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
        
}
