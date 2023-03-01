		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('T03AkunBackups.akun').'*', 'akun', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'akun', 'type' => 'number', 'id' => 'akun', 'value' => old('akun', $t03AkunBackup->akun) , 'class' => 'form-control', 'maxlength' => 11, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T03AkunBackups.debet').'*', 'debet', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'debet', 'type' => 'number', 'id' => 'debet', 'value' => old('debet', $t03AkunBackup->debet) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T03AkunBackups.kredit').'*', 'kredit', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kredit', 'type' => 'number', 'id' => 'kredit', 'value' => old('kredit', $t03AkunBackup->kredit) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T03AkunBackups.kodeTahun').'*', 'kodeTahun', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kode_tahun', 'type' => 'text', 'id' => 'kodeTahun', 'value' => old('kode_tahun', $t03AkunBackup->kode_tahun) , 'class' => 'form-control', 'maxlength' => 2, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->