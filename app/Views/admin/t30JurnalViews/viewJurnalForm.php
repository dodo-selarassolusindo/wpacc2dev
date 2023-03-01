<?=$this->include('Themes/_commonPartialsBs/select2bs') ?>
<?=$this->include('Themes/_commonPartialsBs/sweetalert') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=$boxTitle ?? $pageTitle ?></h3>
			</div><!-- /.card-header -->
			<?= form_open($formAction, ['id'=>'jurnalForm', 'class'=>'form-horizontal'])  ?>
			<div class="card-body">
				<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>
				<?=!empty($validation->getErrors()) ? $validation->listErrors('bootstrap_style') : '';  ?>
				<?=view('admin/t30JurnalViews/_jurnalFormItems') ?>
			</div><!-- /.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('jurnalList'), lang('Basic.global.Cancel'), ['class'=>'btn btn-secondary float-left']); ?>
				<?=form_submit('save', lang('Basic.global.Save'), ['class'=>'btn btn-primary float-right']) ?>
			</div><!-- /.card-footer -->
			<?=form_close() ?>
		</div><!-- //.card -->
	</div><!--/.col -->
</div><!-- /.row -->
<?=$this->endSection() ?>