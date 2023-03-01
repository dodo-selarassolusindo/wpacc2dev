<?php  namespace App\Controllers\Admin;


use App\Models\Admin\T00GrupAkunModel;
use App\Entities\Admin\T01Akun;

class T01Akuns extends \App\Controllers\GoBaseController { 

	use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\T01AkunModel';

    protected static $singularObjectNameCc = 'akun';
    protected static $singularObjectName = 'Akun';
    protected static $pluralObjectName = 'Akun';
    protected static $controllerSlug = 't01-akuns';

    protected static $viewPath = 'admin/t01AkunViews/';

    protected $indexRoute = 'akunList';

    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T01Akuns.moduleTitle');
        parent::initController($request, $response, $logger);
                 $this->viewData['usingSweetAlert'] = true;

         if (session('errorMessage')) {
            $this->session->setFlashData('sweet-error', session('errorMessage'));
         }
         if (session('successMessage')) {
            $this->session->setFlashData('sweet-success', session('successMessage'));
         }
    }

    public function index() {
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
        $this->viewData['usingClientSideDataTable'] = true;
        
		 $this->viewData['akunList'] = $this->model->findAllWithT00GrupAkun('*');

		$this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('T01Akuns.akun')]);
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
            $successfulResult = false; // for now
            

				if ($this->canValidate()) :
					try {
						$successfulResult = $this->model->skipValidation(true)->save($sanitizedData);
					} catch (\Exception $e) {
						$noException = false;
						$this->dealWithException($e);
					}
				else:
					$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T01Akuns.akun'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				endif;
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('T01Akuns.akun'))]).'.';
                $message .= anchor(route_to('editAkun', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;

            endif; // $noException && $successfulResult

        endif; // ($requestMethod === 'post')

        $this->viewData['t01Akun'] = isset($sanitizedData) ? new T01Akun($sanitizedData) : new T01Akun();
		$this->viewData['grupAkunList'] = $this->getGrupAkunListItems($t01Akun->grup_akun ?? null);

        $this->viewData['formAction'] = route_to('createAkun');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('T01Akuns.akun').' '.lang('Basic.global.addNewSuffix');
        

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
        $t01Akun = $this->model->find($id);

        if ($t01Akun == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T01Akuns.akun')), $id]);
            return $this->redirect2listView('sweet-error', $message);
        endif;

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');
        
            $postData = $this->request->getPost();
            			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            
            $noException = true;
            $successfulResult = false; // for now
            
            

            	if ($this->canValidate()) :
            	    try {
            	        $successfulResult = $this->model->skipValidation(true)->update($id, $sanitizedData);
            	    } catch (\Exception $e) {
            	        $noException = false;
            	        $this->dealWithException($e);
            	    }
            	else:
            	    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T01Akuns.akun'))]);
            	    $this->session->setFlashdata('formErrors', $this->model->errors());
            	
            	endif;
            	
            	$t01Akun->fill($sanitizedData);

            	$thenRedirect = true;
            
            if ($noException && $successfulResult) :
                $id = $t01Akun->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('T01Akuns.akun'))]).'.';
                $message .= anchor(route_to('editAkun', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;
        
            endif; // $noException && $successfulResult
        endif; // ($requestMethod === 'post')

        $this->viewData['t01Akun'] = $t01Akun;
		$this->viewData['grupAkunList'] = $this->getGrupAkunListItems($t01Akun->grup_akun ?? null);

        $this->viewData['formAction'] = route_to('updateAkun', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('T01Akuns.akun').' '.lang('Basic.global.edit3');
        
        
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
        

	protected function getGrupAkunListItems($selId = null) { 
		$data = [''=>lang('Basic.global.pleaseSelectA', [mb_strtolower(lang('T00GrupAkuns.grupAkun'))])];
        if (!empty($selId)) :
            	$t00GrupAkunModel = model('App\Models\Admin\T00GrupAkunModel');

            $selOption = $t00GrupAkunModel->where('id', $selId)->findColumn('nama');
            if (!empty($selOption)) :
                $data[$selId] = $selOption[0];
            endif;
        endif;
		return $data;
	}

}
