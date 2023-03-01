<?php  namespace App\Controllers\Admin;


use App\Controllers\GoBaseResourceController;

use App\Models\Collection;

use App\Entities\Admin\T30Jurnal;

use App\Models\Admin\T30JurnalModel;

class T30Jurnals extends \App\Controllers\GoBaseResourceController { 

    protected $modelName = T30JurnalModel::class;
    protected $format = 'json';

    /**
     * @var \Myth\Auth\Authorization\FlatAuthorization
     */
    protected $authorize;

    /**
     * @var \Myth\Auth\Authentication\LocalAuthenticator
     */
    protected $auth;



    protected static $controllerSlug = 't30-jurnals';

    protected static $viewPath = 'admin/t30JurnalViews/';

    protected $indexRoute = 'jurnalList';
    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T30Jurnals.moduleTitle');
        $this->viewData['usingSweetAlert'] = true;
        parent::initController($request, $response, $logger);
    }


    public function index() {
        if (!logged_in()) {
			return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
		}
        $viewData = [
                'currentModule' => static::$controllerSlug,
                'pageSubTitle' => lang('Basic.global.ManageAllRecords', [lang('T30Jurnals.jurnal')]),
                't30Jurnal' => new T30Jurnal(),
                'usingServerSideDataTable' => true,
                
            ];



        $viewData = array_merge($this->viewData, $viewData); // merge any possible values from the parent controller class

        return view(static::$viewPath.'viewJurnalList', $viewData);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return array an array
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $postData = $this->request->getPost();
            $sanitizedData = $this->sanitized($postData, true);


            

            try {
				if (!$formValid = $this->canValidate()) {
					return $this->fail($this->model->errors(), 422);
				}

				$result = $this->model->skipValidation(true)->save($sanitizedData);
            } catch (\Exception $e) {
                $db = $this->model->db;
                $query = $db->getLastQuery();
                $queryStr = $query != null ? $query->getQuery() : '';
                try {
                    $dbError = $db->error();
                } catch (\Exception $e2) {
                    log_message('error', $e2->getMessage().PHP_EOL);
                }
                $userFriendlyErrMsg = lang('Basic.global.persistErr1', [mb_strtolower(lang('T30Jurnals.jurnal'))]);
                if (isset($dbError['code']) && $dbError['code'] == 1062) :
                    $userFriendlyErrMsg .= PHP_EOL.lang('Basic.global.persistDuplErr', [mb_strtolower(lang('T30Jurnals.jurnal'))]);
                endif;
                log_message('error', $userFriendlyErrMsg.PHP_EOL.$e->getMessage().PHP_EOL.$queryStr);
                
                return $this->fail($userFriendlyErrMsg, 500);
            }
            $data = [ 'success' => $result ];
            return $this->respondCreated($data, lang('Basic.global.saveSuccess', [mb_strtolower(lang('T30Jurnals.jurnal'))]).'.');
        } else {
            $this->failUnauthorized();
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int $id
     *
     * @return array an array
     */
    public function edit($id = null)
    {
        if (!$found = $this->model->find($id)) {
            return $this->failNotFound(lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T30Jurnals.jurnal')), $id]));
        }

        return $this->respond(['data' => $found], 200, 'Record successfully retrieved.');
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int $id
     *
     * @return array an array
     */
    public function update($id = null)
    {
        if ($this->request->isAJAX()) {
            $postData = $this->request->getRawInput();
            $sanitizedData = $this->sanitized($postData, true);

            

            
            if (!$formValid = $this->canValidate()) {
                return $this->fail($this->model->errors(), 422);
            }
            try {
                $result = $this->model->skipValidation(true)->update($id, $sanitizedData);
            } catch (\Exception $e) {
                $db = $this->model->db;
                $query = $db->getLastQuery();
                $queryStr = $query != null ? $query->getQuery() : '';
                try {
                    $dbError = $db->error();
                } catch (\Exception $e2) {
                    log_message('error', $e2->getMessage().PHP_EOL);
                }
                $userFriendlyErrMsg = lang('Basic.global.persistErr3', [mb_strtolower(lang('T30Jurnals.jurnal')), 'ID', $id]);
                if ($dbError['code'] == 1062) :
                    $userFriendlyErrMsg .= PHP_EOL.lang('Basic.global.persistDuplErr', [mb_strtolower(lang('T30Jurnals.jurnal'))]);
                endif;
                log_message('error', $userFriendlyErrMsg.PHP_EOL.$e->getMessage().PHP_EOL.$query);
                return $this->fail($userFriendlyErrMsg, 500);
            }
            $data = [ 'success' => $result ];
            return $this->respondUpdated($data, lang('Basic.global.updateSuccess', [mb_strtolower(lang('T30Jurnals.jurnal'))]).'.', [$id]);
        } else {
            $this->failUnauthorized();
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int $id
     *
     * @return array an array
     */
    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {

            return $this->failNotFound(lang('Basic.global.deleteError', [mb_strtolower(lang('Jurnal.jurnal'))]));
        }

        $message = lang('Basic.global.deleteSuccess', [mb_strtolower(lang('Jurnal.jurnal'))]);
        $response = $this->respondDeleted(['id' => $id, 'msg' => $message]);
        return $response;
    }

    

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
            $order = T30JurnalModel::SORTABLE[$requestedOrder > 0 ? $requestedOrder : 1];
            $dir = $reqData['order']['0']['dir'] ?? 'asc';

            $resourceData = $this->model->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject();
			foreach ($resourceData as $item) :
if (isset($item->keterangan) && strlen($item->keterangan) > 100) :
    $item->keterangan = character_limiter($item->keterangan, 100);
endif;
			endforeach;

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
            $menu = $this->model->getAllForMenu($reqVal.', nomor', 'nomor', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->nomor = '- '.lang('Basic.global.None').' -';
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
            $columns2select = [$reqId ?? 'id', $reqText ?? 'nomor'];
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
