		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('T31Jurnalds.akun').'*', 'akun', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_dropdown('akun', $akunList, old('akun', $t31Jurnald->akun), ['id' => 'akun', 'class' => 'form-control select2bs', 'style'=>'width: 100%;', 'required' => true]) ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T31Jurnalds.debet').'*', 'debet', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'debet', 'type' => 'number', 'id' => 'debet', 'value' => old('debet', $t31Jurnald->debet) , 'step'=>'0.01' , 'class' => 'form-control'.(($ferr = session('formErrors.debet')) ? ' is-invalid' : ''), 'maxlength' => 31, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T31Jurnalds.kredit').'*', 'kredit', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kredit', 'type' => 'number', 'id' => 'kredit', 'value' => old('kredit', $t31Jurnald->kredit) , 'step'=>'0.01' , 'class' => 'form-control'.(($ferr = session('formErrors.kredit')) ? ' is-invalid' : ''), 'maxlength' => 31, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

<input type="hidden" name="id" id="id">

		</div><!-- //.row -->