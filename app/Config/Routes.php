<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
require SYSTEMPATH . 'Config/Routes.php';
}

/**
* --------------------------------------------------------------------
* Router Setup
* --------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Additional in-file definitions

$routes->group('admin', [], function($routes) {
	
	$routes->group('auth-groups', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'AuthGroups::index', ['as' => 'groupList']);
		$routes->get('add', 'AuthGroups::add', ['as' => 'newGroup']);
		$routes->post('add', 'AuthGroups::add', ['as' => 'createGroup']);
		$routes->post('create', 'AuthGroups::create', ['as' => 'ajaxCreateGroup']);
		$routes->put('(:num)/update', 'AuthGroups::update/$1', ['as' => 'ajaxUpdateGroup']);
		$routes->post('(:num)/edit', 'AuthGroups::edit/$1', ['as' => 'updateGroup']);
		$routes->post('datatable', 'AuthGroups::datatable', ['as' => 'dataTableOfGroup']);
		$routes->post('allmenuitems', 'AuthGroups::allItemsSelect', ['as' => 'select2ItemsOfGroup']);
		$routes->post('menuitems', 'AuthGroups::menuItems', ['as' => 'menuItemsOfGroup']);
	});
	$routes->resource('auth-groups', ['namespace'  => 'App\Controllers\Admin', 'controller' => 'AuthGroups', 'except' => 'show,new,create,update']);

	
	$routes->group('users', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'Users::index', ['as' => 'userList']);
		$routes->get('add', 'Users::add', ['as' => 'newUser']);
		$routes->post('add', 'Users::add', ['as' => 'createUser']);
		$routes->post('create', 'Users::create', ['as' => 'ajaxCreateUser']);
		$routes->put('(:num)/update', 'Users::update/$1', ['as' => 'ajaxUpdateUser']);
		$routes->post('(:num)/edit', 'Users::edit/$1', ['as' => 'updateUser']);
		$routes->post('datatable', 'Users::datatable', ['as' => 'dataTableOfUser']);
		$routes->post('allmenuitems', 'Users::allItemsSelect', ['as' => 'select2ItemsOfUser']);
		$routes->post('menuitems', 'Users::menuItems', ['as' => 'menuItemsOfUser']);
	});
	$routes->resource('users', ['namespace'  => 'App\Controllers\Admin', 'controller' => 'Users', 'except' => 'show,new,create,update']);

	
	$routes->group('auth-permissions', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'AuthPermissions::index', ['as' => 'permissionList']);
		$routes->get('add', 'AuthPermissions::add', ['as' => 'newPermission']);
		$routes->post('add', 'AuthPermissions::add', ['as' => 'createPermission']);
		$routes->post('create', 'AuthPermissions::create', ['as' => 'ajaxCreatePermission']);
		$routes->put('(:num)/update', 'AuthPermissions::update/$1', ['as' => 'ajaxUpdatePermission']);
		$routes->post('(:num)/edit', 'AuthPermissions::edit/$1', ['as' => 'updatePermission']);
		$routes->post('datatable', 'AuthPermissions::datatable', ['as' => 'dataTableOfPermission']);
		$routes->post('allmenuitems', 'AuthPermissions::allItemsSelect', ['as' => 'select2ItemsOfPermission']);
		$routes->post('menuitems', 'AuthPermissions::menuItems', ['as' => 'menuItemsOfPermission']);
	});
	$routes->resource('auth-permissions', ['namespace'  => 'App\Controllers\Admin', 'controller' => 'AuthPermissions', 'except' => 'show,new,create,update']);

	
	$routes->group('t00-grup-akuns', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T00GrupAkuns::index', ['as' => 'grupAkunList']);
		$routes->get('add', 'T00GrupAkuns::add', ['as' => 'newGrupAkun']);
		$routes->post('add', 'T00GrupAkuns::add', ['as' => 'createGrupAkun']);
		$routes->post('create', 'T00GrupAkuns::create', ['as' => 'ajaxCreateGrupAkun']);
		$routes->put('(:num)/update', 'T00GrupAkuns::update/$1', ['as' => 'ajaxUpdateGrupAkun']);
		$routes->post('(:num)/edit', 'T00GrupAkuns::edit/$1', ['as' => 'updateGrupAkun']);
		$routes->post('datatable', 'T00GrupAkuns::datatable', ['as' => 'dataTableOfGrupAkun']);
		$routes->post('allmenuitems', 'T00GrupAkuns::allItemsSelect', ['as' => 'select2ItemsOfGrupAkun']);
		$routes->post('menuitems', 'T00GrupAkuns::menuItems', ['as' => 'menuItemsOfGrupAkun']);
	});
	$routes->resource('t00-grup-akuns', ['namespace'  => 'App\Controllers\Admin', 'controller' => 'T00GrupAkuns', 'except' => 'show,new,create,update']);

	
	$routes->group('t01-akuns', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T01Akuns::index', ['as' => 'akunList']);
		$routes->get('index', 'T01Akuns::index', ['as' => 'akunIndex']);
		$routes->get('list', 'T01Akuns::index', ['as' => 'akunList2']);
		$routes->get('add', 'T01Akuns::add', ['as' => 'newAkun']);
		$routes->post('add', 'T01Akuns::add', ['as' => 'createAkun']);
		$routes->get('edit/(:num)', 'T01Akuns::edit/$1', ['as' => 'editAkun']);
		$routes->post('edit/(:num)', 'T01Akuns::edit/$1', ['as' => 'updateAkun']);
		$routes->get('delete/(:num)', 'T01Akuns::delete/$1', ['as' => 'deleteAkun']);
		$routes->post('allmenuitems', 'T01Akuns::allItemsSelect', ['as' => 'select2ItemsOfAkun']);
		$routes->post('menuitems', 'T01Akuns::menuItems', ['as' => 'menuItemsOfAkun']);
	});
	
	$routes->group('t02-akun-lamas', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T02AkunLamas::index', ['as' => 'akunLamaList']);
		$routes->get('index', 'T02AkunLamas::index', ['as' => 'akunLamaIndex']);
		$routes->get('list', 'T02AkunLamas::index', ['as' => 'akunLamaList2']);
		$routes->get('add', 'T02AkunLamas::add', ['as' => 'newAkunLama']);
		$routes->post('add', 'T02AkunLamas::add', ['as' => 'createAkunLama']);
		$routes->get('edit/(:num)', 'T02AkunLamas::edit/$1', ['as' => 'editAkunLama']);
		$routes->post('edit/(:num)', 'T02AkunLamas::edit/$1', ['as' => 'updateAkunLama']);
		$routes->get('delete/(:num)', 'T02AkunLamas::delete/$1', ['as' => 'deleteAkunLama']);
		$routes->post('allmenuitems', 'T02AkunLamas::allItemsSelect', ['as' => 'select2ItemsOfAkunLama']);
		$routes->post('menuitems', 'T02AkunLamas::menuItems', ['as' => 'menuItemsOfAkunLama']);
	});
	
	$routes->group('t03-akun-backups', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T03AkunBackups::index', ['as' => 'akunBackupList']);
		$routes->get('index', 'T03AkunBackups::index', ['as' => 'akunBackupIndex']);
		$routes->get('list', 'T03AkunBackups::index', ['as' => 'akunBackupList2']);
		$routes->get('add', 'T03AkunBackups::add', ['as' => 'newAkunBackup']);
		$routes->post('add', 'T03AkunBackups::add', ['as' => 'createAkunBackup']);
		$routes->get('edit/(:num)', 'T03AkunBackups::edit/$1', ['as' => 'editAkunBackup']);
		$routes->post('edit/(:num)', 'T03AkunBackups::edit/$1', ['as' => 'updateAkunBackup']);
		$routes->get('delete/(:num)', 'T03AkunBackups::delete/$1', ['as' => 'deleteAkunBackup']);
		$routes->post('allmenuitems', 'T03AkunBackups::allItemsSelect', ['as' => 'select2ItemsOfAkunBackup']);
		$routes->post('menuitems', 'T03AkunBackups::menuItems', ['as' => 'menuItemsOfAkunBackup']);
	});
	
	$routes->group('t30-jurnals', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T30Jurnals::index', ['as' => 'jurnalList']);
		$routes->get('add', 'T30Jurnals::add', ['as' => 'newJurnal']);
		$routes->post('add', 'T30Jurnals::add', ['as' => 'createJurnal']);
		$routes->post('create', 'T30Jurnals::create', ['as' => 'ajaxCreateJurnal']);
		$routes->put('(:num)/update', 'T30Jurnals::update/$1', ['as' => 'ajaxUpdateJurnal']);
		$routes->post('(:num)/edit', 'T30Jurnals::edit/$1', ['as' => 'updateJurnal']);
		$routes->post('datatable', 'T30Jurnals::datatable', ['as' => 'dataTableOfJurnal']);
		$routes->post('allmenuitems', 'T30Jurnals::allItemsSelect', ['as' => 'select2ItemsOfJurnal']);
		$routes->post('menuitems', 'T30Jurnals::menuItems', ['as' => 'menuItemsOfJurnal']);
	});
	$routes->resource('t30-jurnals', ['namespace'  => 'App\Controllers\Admin', 'controller' => 'T30Jurnals', 'except' => 'show,new,create,update']);

	
	$routes->group('t31-jurnalds', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T31Jurnalds::index', ['as' => 'jurnaldList']);
		$routes->get('index', 'T31Jurnalds::index', ['as' => 'jurnaldIndex']);
		$routes->get('list', 'T31Jurnalds::index', ['as' => 'jurnaldList2']);
		$routes->get('add', 'T31Jurnalds::add', ['as' => 'newJurnald']);
		$routes->post('add', 'T31Jurnalds::add', ['as' => 'createJurnald']);
		$routes->get('edit/(:num)', 'T31Jurnalds::edit/$1', ['as' => 'editJurnald']);
		$routes->post('edit/(:num)', 'T31Jurnalds::edit/$1', ['as' => 'updateJurnald']);
		$routes->get('delete/(:num)', 'T31Jurnalds::delete/$1', ['as' => 'deleteJurnald']);
		$routes->post('allmenuitems', 'T31Jurnalds::allItemsSelect', ['as' => 'select2ItemsOfJurnald']);
		$routes->post('menuitems', 'T31Jurnalds::menuItems', ['as' => 'menuItemsOfJurnald']);
	});
	
	$routes->group('t32-jurnal-lamas', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T32JurnalLamas::index', ['as' => 'jurnalLamaList']);
		$routes->get('index', 'T32JurnalLamas::index', ['as' => 'jurnalLamaIndex']);
		$routes->get('list', 'T32JurnalLamas::index', ['as' => 'jurnalLamaList2']);
		$routes->get('add', 'T32JurnalLamas::add', ['as' => 'newJurnalLama']);
		$routes->post('add', 'T32JurnalLamas::add', ['as' => 'createJurnalLama']);
		$routes->get('edit/(:num)', 'T32JurnalLamas::edit/$1', ['as' => 'editJurnalLama']);
		$routes->post('edit/(:num)', 'T32JurnalLamas::edit/$1', ['as' => 'updateJurnalLama']);
		$routes->get('delete/(:num)', 'T32JurnalLamas::delete/$1', ['as' => 'deleteJurnalLama']);
		$routes->post('allmenuitems', 'T32JurnalLamas::allItemsSelect', ['as' => 'select2ItemsOfJurnalLama']);
		$routes->post('menuitems', 'T32JurnalLamas::menuItems', ['as' => 'menuItemsOfJurnalLama']);
	});
	
	$routes->group('t33-jurnal-lamads', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T33JurnalLamads::index', ['as' => 'jurnalLamadList']);
		$routes->get('index', 'T33JurnalLamads::index', ['as' => 'jurnalLamadIndex']);
		$routes->get('list', 'T33JurnalLamads::index', ['as' => 'jurnalLamadList2']);
		$routes->get('add', 'T33JurnalLamads::add', ['as' => 'newJurnalLamad']);
		$routes->post('add', 'T33JurnalLamads::add', ['as' => 'createJurnalLamad']);
		$routes->get('edit/(:num)', 'T33JurnalLamads::edit/$1', ['as' => 'editJurnalLamad']);
		$routes->post('edit/(:num)', 'T33JurnalLamads::edit/$1', ['as' => 'updateJurnalLamad']);
		$routes->get('delete/(:num)', 'T33JurnalLamads::delete/$1', ['as' => 'deleteJurnalLamad']);
		$routes->post('allmenuitems', 'T33JurnalLamads::allItemsSelect', ['as' => 'select2ItemsOfJurnalLamad']);
		$routes->post('menuitems', 'T33JurnalLamads::menuItems', ['as' => 'menuItemsOfJurnalLamad']);
	});
	
	$routes->group('t34-jurnal-backups', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T34JurnalBackups::index', ['as' => 'jurnalBackupList']);
		$routes->get('index', 'T34JurnalBackups::index', ['as' => 'jurnalBackupIndex']);
		$routes->get('list', 'T34JurnalBackups::index', ['as' => 'jurnalBackupList2']);
		$routes->get('add', 'T34JurnalBackups::add', ['as' => 'newJurnalBackup']);
		$routes->post('add', 'T34JurnalBackups::add', ['as' => 'createJurnalBackup']);
		$routes->get('edit/(:num)', 'T34JurnalBackups::edit/$1', ['as' => 'editJurnalBackup']);
		$routes->post('edit/(:num)', 'T34JurnalBackups::edit/$1', ['as' => 'updateJurnalBackup']);
		$routes->get('delete/(:num)', 'T34JurnalBackups::delete/$1', ['as' => 'deleteJurnalBackup']);
		$routes->post('allmenuitems', 'T34JurnalBackups::allItemsSelect', ['as' => 'select2ItemsOfJurnalBackup']);
		$routes->post('menuitems', 'T34JurnalBackups::menuItems', ['as' => 'menuItemsOfJurnalBackup']);
	});
	
	$routes->group('t35-jurnal-backupds', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'T35JurnalBackupds::index', ['as' => 'jurnalBackupdList']);
		$routes->get('index', 'T35JurnalBackupds::index', ['as' => 'jurnalBackupdIndex']);
		$routes->get('list', 'T35JurnalBackupds::index', ['as' => 'jurnalBackupdList2']);
		$routes->get('add', 'T35JurnalBackupds::add', ['as' => 'newJurnalBackupd']);
		$routes->post('add', 'T35JurnalBackupds::add', ['as' => 'createJurnalBackupd']);
		$routes->get('edit/(:num)', 'T35JurnalBackupds::edit/$1', ['as' => 'editJurnalBackupd']);
		$routes->post('edit/(:num)', 'T35JurnalBackupds::edit/$1', ['as' => 'updateJurnalBackupd']);
		$routes->get('delete/(:num)', 'T35JurnalBackupds::delete/$1', ['as' => 'deleteJurnalBackupd']);
		$routes->post('allmenuitems', 'T35JurnalBackupds::allItemsSelect', ['as' => 'select2ItemsOfJurnalBackupd']);
		$routes->post('menuitems', 'T35JurnalBackupds::menuItems', ['as' => 'menuItemsOfJurnalBackupd']);
	});

});

$routes->match(['get', 'post'], 'user-profile', 'UserProfileController::index', ['as' => 'user-profile']);

/**
* --------------------------------------------------------------------
* Additional Routing
* --------------------------------------------------------------------
*
* There will often be times that you need additional routing and you
* need it to be able to override any defaults in this file. Environment
* based routes is one such time. require() additional route files here
* to make that happen.
*
* You will have access to the $routes object within that file without
* needing to reload it.
*/
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}