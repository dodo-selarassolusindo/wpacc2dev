<?php

namespace App\Controllers;

class Home extends BaseController {

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
		$this->viewData['currentModule'] = 'Dashboard';
		parent::initController($request, $response, $logger);
		$this->viewData['currentLocale'] = $this->request->getLocale();
		helper(['text', 'auth']);
	}

	/**
	* Index Page for this controller.
	*
	* @return string
	*/
	public function index() {

		$this->viewData['pageTitle'] = 'WP ACC 2';
		$this->viewData['pageSubTitle'] = lang('Basic.global.Dashboard');

		$authGroupModel = model('App\Models\Admin\AuthGroupModel');

		$userModel = model('UserModel');

		$authPermissionModel = model('App\Models\Admin\AuthPermissionModel');

		$t00GrupAkunModel = model('App\Models\Admin\T00GrupAkunModel');

		$t01AkunModel = model('App\Models\Admin\T01AkunModel');

		$t02AkunLamaModel = model('App\Models\Admin\T02AkunLamaModel');

		$t03AkunBackupModel = model('App\Models\Admin\T03AkunBackupModel');

		$t30JurnalModel = model('App\Models\Admin\T30JurnalModel');

		$t31JurnaldModel = model('App\Models\Admin\T31JurnaldModel');

		$t32JurnalLamaModel = model('App\Models\Admin\T32JurnalLamaModel');

		$t33JurnalLamadModel = model('App\Models\Admin\T33JurnalLamadModel');

		$t34JurnalBackupModel = model('App\Models\Admin\T34JurnalBackupModel');

		$t35JurnalBackupdModel = model('App\Models\Admin\T35JurnalBackupdModel');

		$this->viewData['totalNrOfGroup'] = $authGroupModel->getCount();

		// $this->viewData['groupList'] = $authGroupModel->findAll(5);

		$this->viewData['totalNrOfUser'] = $userModel->getCount();

		// $this->viewData['userList'] = $userModel->findAll(5);

		$this->viewData['totalNrOfPermission'] = $authPermissionModel->getCount();

		// $this->viewData['permissionList'] = $authPermissionModel->findAll(5);

		$this->viewData['totalNrOfGrupAkun'] = $t00GrupAkunModel->getCount();

		// $this->viewData['grupAkunList'] = $t00GrupAkunModel->findAll(5);

		$this->viewData['totalNrOfAkun'] = $t01AkunModel->getCount();

		// $this->viewData['akunList'] = $t01AkunModel->findAll(5);

		$this->viewData['totalNrOfAkunLama'] = $t02AkunLamaModel->getCount();

		// $this->viewData['akunLamaList'] = $t02AkunLamaModel->findAll(5);

		$this->viewData['totalNrOfAkunBackup'] = $t03AkunBackupModel->getCount();

		// $this->viewData['akunBackupList'] = $t03AkunBackupModel->findAll(5);

		$this->viewData['totalNrOfJurnal'] = $t30JurnalModel->getCount();

		// $this->viewData['jurnalList'] = $t30JurnalModel->findAll(5);

		$this->viewData['totalNrOfJurnald'] = $t31JurnaldModel->getCount();

		// $this->viewData['jurnaldList'] = $t31JurnaldModel->findAll(5);

		$this->viewData['totalNrOfJurnalLama'] = $t32JurnalLamaModel->getCount();

		// $this->viewData['jurnalLamaList'] = $t32JurnalLamaModel->findAll(5);

		$this->viewData['totalNrOfJurnalLamad'] = $t33JurnalLamadModel->getCount();

		// $this->viewData['jurnalLamadList'] = $t33JurnalLamadModel->findAll(5);

		$this->viewData['totalNrOfJurnalBackup'] = $t34JurnalBackupModel->getCount();

		// $this->viewData['jurnalBackupList'] = $t34JurnalBackupModel->findAll(5);

		$this->viewData['totalNrOfJurnalBackupd'] = $t35JurnalBackupdModel->getCount();

		// $this->viewData['jurnalBackupdList'] = $t35JurnalBackupdModel->findAll(5);

		return view('dashboardHome', $this->viewData);
	}
}