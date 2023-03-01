		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('T30Jurnals.nomor').'*', 'nomor', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'nomor', 'type' => 'text', 'id' => 'nomor', 'value' => old('nomor', $t30Jurnal->nomor) , 'class' => 'form-control'.(($ferr = session('formErrors.nomor')) ? ' is-invalid' : ''), 'maxlength' => 8, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T30Jurnals.tanggal').'*', 'tanggal', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'tanggal', 'type' => 'date', 'id' => 'tanggal', 'value' => old('tanggal', $t30Jurnal->tanggal) , 'class' => 'form-control'.(($ferr = session('formErrors.tanggal')) ? ' is-invalid' : ''), 'maxlength' => 10, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T30Jurnals.keterangan').'*', 'keterangan', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
					<?=form_textarea(['name'=>'keterangan', 'id' => 'keterangan', 'value' => old('keterangan', $t30Jurnal->keterangan), 'rows' => 3, 'style' => 'height: 10em;', 'class' => 'form-control'.(($ferr = session('formErrors.keterangan')) ? ' is-invalid' : ''), 'maxlength' => 16313, 'required' => true]) ?>
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