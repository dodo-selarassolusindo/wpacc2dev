<?=$this->include('Themes/_commonPartialsBs/select2bs') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=$boxTitle ?? $pageTitle ?></h3>
			</div><!-- /.card-header -->
			<?= form_open($formAction, ['id'=>'akunForm', 'class'=>'form-horizontal'])  ?>
			<div class="card-body">
				<?=view('Themes/_commonPartialsBs/_alertBoxes') ?>
				<?=!empty($validation->getErrors()) ? $validation->listErrors('bootstrap_style') : '';  ?>
				<?=view('admin/t01AkunViews/_akunFormItems') ?>
			</div><!-- /.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('akunList'), lang('Basic.global.Cancel'), ['class'=>'btn btn-secondary float-left']); ?>
				<?=form_submit('save', lang('Basic.global.Save'), ['class'=>'btn btn-primary float-right']) ?>
			</div><!-- /.card-footer -->
			<?=form_close() ?>
		</div><!-- //.card -->
	</div><!--/.col -->
</div><!-- /.row -->
<?=$this->endSection() ?>


<?=$this->section('additionalInlineJs');  ?>


    $('#grupAkun').select2({
        
        allowClear: false,
        ajax: {
            url: '<?= route_to('menuItemsOfGrupAkun')?>',
            type: 'post',
            dataType: 'json',

            data: function (params) {
                return {
                    id: 'id',
                    text: 'nama',
                    searchTerm: params.term,
                    <?=csrf_token() ?? 'token'?> : <?=csrf_token()?>v
                };
            },
            delay: 60,
            processResults: function (response) {

                yeniden(response.<?=csrf_token() ?>);

                return {
                    results: response.menu
                };
            },

            cache: true
        }
    });


<?=$this->endSection() ?>
