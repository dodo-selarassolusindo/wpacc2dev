		<div class="row">
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T31Jurnalds.jurnal').'*', 'jurnal'); ?>
				<?=form_input(['name' => 'jurnal', 'type' => 'text', 'id' => 'jurnal', 'value' => old('jurnal', $t31Jurnald->jurnal) , 'class' => 'form-control', 'maxlength' => 11, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T31Jurnalds.akun').'*', 'akun'); ?>
							<?=form_dropdown('akun', $akunList, old('akun', $t31Jurnald->akun), ['id' => 'akun', 'class' => 'form-control select2bs', 'style'=>'width: 100%;', 'required' => true]) ?>
				</div><!--//.form-group -->

			</div><!--//.col -->
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T31Jurnalds.debet').'*', 'debet'); ?>
				<?=form_input(['name' => 'debet', 'type' => 'number', 'id' => 'debet', 'value' => old('debet', $t31Jurnald->debet) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T31Jurnalds.kredit').'*', 'kredit'); ?>
				<?=form_input(['name' => 'kredit', 'type' => 'number', 'id' => 'kredit', 'value' => old('kredit', $t31Jurnald->kredit) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->

		</div><!-- //.row -->