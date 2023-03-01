<?php  namespace App\Controllers\Admin;


use App\Models\Admin\T01AkunModel;
use App\Entities\Admin\T31Jurnald;

class T31Jurnalds extends \App\Controllers\GoBaseController { 

	use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\T31JurnaldModel';

    protected static $singularObjectNameCc = 'jurnald';
    protected static $singularObjectName = 'Jurnald';
    protected static $pluralObjectName = 'Jurnald';
    protected static $controllerSlug = 't31-jurnalds';

    protected static $viewPath = 'admin/t31JurnaldViews/';

    protected $indexRoute = 'jurnaldList';

    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T31Jurnalds.moduleTitle');
        parent::initController($request, $response, $logger);
        
    }

    public function index() {
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
        $this->viewData['usingClientSideDataTable'] = true;
        
		 $this->viewData['jurnaldList'] = $this->model->findAllWithT01Akun('*');

		$this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('T31Jurnalds.jurnald')]);
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
					$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T31Jurnalds.jurnald'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				endif;
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            endif;
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('T31Jurnalds.jurnald'))]).'.';
                $message .= anchor(route_to('editJurnald', $id), lang('Basic.global.continueEditing').'?');
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

        $this->viewData['t31Jurnald'] = isset($sanitizedData) ? new T31Jurnald($sanitizedData) : new T31Jurnald();
		$this->viewData['akunList'] = $this->getAkunListItems();

        $this->viewData['formAction'] = route_to('createJurnald');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('T31Jurnalds.jurnald').' '.lang('Basic.global.addNewSuffix');
        

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
        $t31Jurnald = $this->model->find($id);

        if ($t31Jurnald == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T31Jurnalds.jurnald')), $id]);
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
            	    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T31Jurnalds.jurnald'))]);
            	    $this->session->setFlashdata('formErrors', $this->model->errors());
            	
            	endif;
            	
            	$t31Jurnald->fill($sanitizedData);

            	$thenRedirect = true;
            endif;
            if ($noException && $successfulResult) :
                $id = $t31Jurnald->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('T31Jurnalds.jurnald'))]).'.';
                $message .= anchor(route_to('editJurnald', $id), lang('Basic.global.continueEditing').'?');
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

        $this->viewData['t31Jurnald'] = $t31Jurnald;
		$this->viewData['akunList'] = $this->getAkunListItems();

        $this->viewData['formAction'] = route_to('updateJurnald', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('T31Jurnalds.jurnald').' '.lang('Basic.global.edit3');
        
        
        return $this->displayForm(__METHOD__, $id);
    } // end function edit(...)
    
    

    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id';
            $menu = $this->model->getAllForMenu($reqVal.', jurnal', 'jurnal', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->jurnal = '- '.lang('Basic.global.None').' -';
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
            $columns2select = [$reqId ?? 'id', $reqText ?? 'jurnal'];
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
        

	protected function getAkunListItems() { 
	$t01AkunModel = model('App\Models\Admin\T01AkunModel');
			$onlyActiveOnes = true;
			$data = $t01AkunModel->getAllForCiMenu('id, nama','nama', $onlyActiveOnes, lang('Basic.global.pleaseSelectA', [mb_strtolower(lang('T01Akuns.akun'))]) );

		return $data;
	}

}
