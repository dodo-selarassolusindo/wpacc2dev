<li class="nav-item has-treeview
<?php
switch ($currentModule) {
	case strtolower('t00-grup-akuns'):
	case strtolower('t01-akuns'):
		echo 'menu-open';
}
?>
">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-circle"></i>
		<p>
			Master
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">

		<li class="nav-item">
			<?= anchor(route_to('grupAkunList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T00GrupAkuns.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t00-grup-akuns') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('akunList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T01Akuns.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t01-akuns') ? ' active' : '')]); ?>
		</li>

	</ul><!--//.nav nav-treeview -->
</li><!--//.nav-item has-treeview -->

<li class="nav-item has-treeview
<?php
switch ($currentModule) {
	case strtolower('t30-jurnals'):
		echo 'menu-open';
}
?>
">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-circle"></i>
		<p>
			Transaksi
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">

		<li class="nav-item">
			<?= anchor(route_to('jurnalList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T30Jurnals.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t30-jurnals') ? ' active' : '')]); ?>
		</li>

	</ul><!--//.nav nav-treeview -->
</li><!--//.nav-item has-treeview -->

<li class="nav-item has-treeview
<?php
switch ($currentModule) {
	case strtolower('auth-groups'):
	case strtolower('users'):
	case strtolower('auth-permissions'):
		echo 'menu-open';
}
?>
">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-circle"></i>
		<p>
			Setting
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">

		<li class="nav-item">
			<?= anchor(route_to('groupList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('AuthGroups.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('auth-groups') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('userList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('Users.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('users') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('permissionList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('AuthPermissions.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('auth-permissions') ? ' active' : '')]); ?>
		</li>

	</ul><!--//.nav nav-treeview -->
</li><!--//.nav-item has-treeview -->



		<!-- <li class="nav-item">
			<?= anchor(route_to('akunLamaList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T02AkunLamas.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t02-akun-lamas') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('akunBackupList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T03AkunBackups.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t03-akun-backups') ? ' active' : '')]); ?>
		</li>

		<li class="nav-item">
			<?= anchor(route_to('jurnaldList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T31Jurnalds.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t31-jurnalds') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('jurnalLamaList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T32JurnalLamas.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t32-jurnal-lamas') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('jurnalLamadList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T33JurnalLamads.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t33-jurnal-lamads') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('jurnalBackupList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T34JurnalBackups.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t34-jurnal-backups') ? ' active' : '')]); ?>
		</li>
		<li class="nav-item">
			<?= anchor(route_to('jurnalBackupdList'), '<i class="far fa-circle nav-icon"></i><p>'.lang('T35JurnalBackupds.moduleTitle').'</p>', ['class' => 'nav-link'.($currentModule == strtolower('t35-jurnal-backupds') ? ' active' : '')]); ?>
		</li> -->
