		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('T00GrupAkuns.kode').'*', 'kode', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kode', 'type' => 'text', 'id' => 'kode', 'value' => old('kode', $t00GrupAkun->kode) , 'class' => 'form-control'.(($ferr = session('formErrors.kode')) ? ' is-invalid' : ''), 'maxlength' => 2, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T00GrupAkuns.nama').'*', 'nama', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'nama', 'type' => 'text', 'id' => 'nama', 'value' => old('nama', $t00GrupAkun->nama) , 'class' => 'form-control'.(($ferr = session('formErrors.nama')) ? ' is-invalid' : ''), 'maxlength' => 50, 'required' => true ]);  ?>
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