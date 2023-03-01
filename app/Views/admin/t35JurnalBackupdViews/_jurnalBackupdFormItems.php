		<div class="row">
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T35JurnalBackupds.jurnal').'*', 'jurnal'); ?>
				<?=form_input(['name' => 'jurnal', 'type' => 'number', 'id' => 'jurnal', 'value' => old('jurnal', $t35JurnalBackupd->jurnal) , 'class' => 'form-control', 'maxlength' => 11, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T35JurnalBackupds.akun').'*', 'akun'); ?>
				<?=form_input(['name' => 'akun', 'type' => 'number', 'id' => 'akun', 'value' => old('akun', $t35JurnalBackupd->akun) , 'class' => 'form-control', 'maxlength' => 11, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T35JurnalBackupds.debet').'*', 'debet'); ?>
				<?=form_input(['name' => 'debet', 'type' => 'number', 'id' => 'debet', 'value' => old('debet', $t35JurnalBackupd->debet) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T35JurnalBackupds.kredit').'*', 'kredit'); ?>
				<?=form_input(['name' => 'kredit', 'type' => 'number', 'id' => 'kredit', 'value' => old('kredit', $t35JurnalBackupd->kredit) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->

		</div><!-- //.row -->