		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('AuthGroups.name').'*', 'name', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'name', 'type' => 'text', 'id' => 'name', 'value' => old('name', $authGroup->name) , 'class' => 'form-control'.(($ferr = session('formErrors.name')) ? ' is-invalid' : ''), 'maxlength' => 255, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('AuthGroups.description').'*', 'description', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'description', 'type' => 'text', 'id' => 'description', 'value' => old('description', $authGroup->description) , 'class' => 'form-control'.(($ferr = session('formErrors.description')) ? ' is-invalid' : ''), 'maxlength' => 255, 'required' => true ]);  ?>
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