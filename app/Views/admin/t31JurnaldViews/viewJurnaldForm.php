<?=$this->include('Themes/_commonPartialsBs/select2bs') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=$boxTitle ?? $pageTitle ?></h3>
			</div><!--//.card-header -->
			<?= form_open($formAction, ['id'=>'jurnaldForm'])  ?>
			<div class="card-body">
				<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>
				<?=!empty($validation->getErrors()) ? $validation->listErrors('bootstrap_style') : '';  ?>
				<?=view('admin/t31JurnaldViews/_jurnaldFormItems') ?>
			</div><!-- /.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('jurnaldList'), lang('Basic.global.Cancel'), ['class'=>'btn btn-default float-left']); ?>
				<?=form_submit('save', lang('Basic.global.Save'), ['class'=>'btn btn-primary float-right']) ?>
			</div><!-- /.card-footer -->
			<?=form_close() ?>
    </div><!-- //.card -->
	</div><!--//.col -->
</div><!--//.row -->
<?=$this->endSection() ?>