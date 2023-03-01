<?= $this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?= $this->section('content');  ?>

	<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>


	<!-- Info boxes -->
	<div class="row">
		<div class="col-lg-3 col-6">

			<div class="small-box bg-info">
				<div class="inner">
					<h3><?= $totalNrOfGroup; ?></h3>
					<p><?=lang('AuthGroups.group') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('groupList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-secondary">
				<div class="inner">
					<h3><?= $totalNrOfAkun; ?></h3>
					<p><?=lang('T01Akuns.akun') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('akunList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-success">
				<div class="inner">
					<h3><?= $totalNrOfUser; ?></h3>
					<p><?=lang('Users.user') ?></p>
				</div>
				<div class="icon">
					<i class="fas fa-chart-bar"></i>
				</div>
				<?= anchor(route_to('userList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-success">
				<div class="inner">
					<h3><?= $totalNrOfAkunLama; ?></h3>
					<p><?=lang('T02AkunLamas.akunLama') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('akunLamaList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-warning">
				<div class="inner">
					<h3><?= $totalNrOfPermission; ?></h3>
					<p><?=lang('AuthPermissions.permission') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('permissionList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-danger">
				<div class="inner">
					<h3><?= $totalNrOfAkunBackup; ?></h3>
					<p><?=lang('T03AkunBackups.akunBackup') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-question-circle"></i>
				</div>
				<?= anchor(route_to('akunBackupList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
		<div class="col-lg-3 col-6">

			<div class="small-box bg-danger">
				<div class="inner">
					<h3><?= $totalNrOfGrupAkun; ?></h3>
					<p><?=lang('T00GrupAkuns.grupAkun') ?></p>
				</div>
				<div class="icon">
					<i class="far fa-bookmark"></i>
				</div>
				<?= anchor(route_to('grupAkunList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->


			<div class="small-box bg-secondary">
				<div class="inner">
					<h3><?= $totalNrOfJurnal; ?></h3>
					<p><?=lang('T30Jurnals.jurnal') ?></p>
				</div>
				<div class="icon">
					<i class="fas fa-chart-bar"></i>
				</div>
				<?= anchor(route_to('jurnalList'), lang('Basic.global.MoreInfo').'  <i class="fas fa-arrow-circle-right"></i>', ['class'=>'small-box-footer']); ?>

			</div><!-- /.small-box -->

		</div><!-- /.col -->
	</div><!-- /.row -->

<?= $this->endSection() ?>