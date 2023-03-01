		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('Users.uuid'), 'uuid', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'uuid', 'type' => 'text', 'id' => 'uuid', 'value' => old('uuid', $user->uuid) , 'class' => 'form-control'.(($ferr = session('formErrors.uuid')) ? ' is-invalid' : ''), 'maxlength' => 36]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.email').'*', 'email', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'email', 'type' => 'email', 'id' => 'email', 'value' => old('email', $user->email) , 'class' => 'form-control'.(($ferr = session('formErrors.email')) ? ' is-invalid' : ''), 'maxlength' => 255, 'required' => true ]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.username'), 'username', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'username', 'type' => 'text', 'id' => 'username', 'value' => old('username', $user->username) , 'class' => 'form-control'.(($ferr = session('formErrors.username')) ? ' is-invalid' : ''), 'maxlength' => 30]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.firstName'), 'firstName', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'first_name', 'type' => 'text', 'id' => 'firstName', 'value' => old('first_name', $user->first_name) , 'class' => 'form-control'.(($ferr = session('formErrors.first_name')) ? ' is-invalid' : ''), 'maxlength' => 60]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.lastName'), 'lastName', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'last_name', 'type' => 'text', 'id' => 'lastName', 'value' => old('last_name', $user->last_name) , 'class' => 'form-control'.(($ferr = session('formErrors.last_name')) ? ' is-invalid' : ''), 'maxlength' => 60]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.primaryPhone'), 'primaryPhone', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'primary_phone', 'type' => 'text', 'id' => 'primaryPhone', 'value' => old('primary_phone', $user->primary_phone) , 'class' => 'form-control'.(($ferr = session('formErrors.primary_phone')) ? ' is-invalid' : ''), 'maxlength' => 17]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.picture'), 'picture', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'picture', 'type' => 'text', 'id' => 'picture', 'value' => old('picture', $user->picture) , 'class' => 'form-control'.(($ferr = session('formErrors.picture')) ? ' is-invalid' : ''), 'maxlength' => 128]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.userPassword').'*', 'passwordHash', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'password', 'type' => 'password', 'id' => 'password', 'value' => old('password', $user->password) , 'class' => 'form-control'.(($ferr = session('formErrors.password')) ? ' is-invalid' : ''), 'maxlength' => 255]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.resetExpires'), 'resetExpires', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'reset_expires', 'type' => 'text', 'id' => 'resetExpires', 'value' => old('reset_expires', $user->reset_expires) , 'class' => 'form-control'.(($ferr = session('formErrors.reset_expires')) ? ' is-invalid' : ''), 'maxlength' => 20]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.status'), 'status', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'status', 'type' => 'text', 'id' => 'status', 'value' => old('status', $user->status) , 'class' => 'form-control'.(($ferr = session('formErrors.status')) ? ' is-invalid' : ''), 'maxlength' => 255]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Users.statusMessage'), 'statusMessage', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'status_message', 'type' => 'text', 'id' => 'statusMessage', 'value' => old('status_message', $user->status_message) , 'class' => 'form-control'.(($ferr = session('formErrors.status_message')) ? ' is-invalid' : ''), 'maxlength' => 255]);  ?>
						<?php if ( $ferr ) { ?>
							<div class="invalid-feedback">
								<?= $ferr ?>
							</div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<div class="offset-md-4 col-md-8">
						<div class="form-check">
								<?=form_checkbox(['name'=>'active', 'id' => 'active', 'value' => 1, 'class' => 'form-check-input', 'checked' => ($user->active==true ? true : false )]); ?>
								<?=form_label(lang('Users.active'), 'active', ['class'=>'form-check-label']);  ?>
						</div><!--//.form-check -->
					</div>

				</div><!--//.form-group -->

				<div class="form-group row">
					<div class="offset-md-4 col-md-8">
						<div class="form-check">
								<?=form_checkbox(['name'=>'force_pass_reset', 'id' => 'forcePassReset', 'value' => 1, 'class' => 'form-check-input', 'checked' => ($user->force_pass_reset==true ? true : false )]); ?>
								<?=form_label(lang('Users.forcePassReset'), 'forcePassReset', ['class'=>'form-check-label']);  ?>
						</div><!--//.form-check -->
					</div>

				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Basic.global.Permissions'), 'permissions', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_multiselect('permissions[]', $permissions, old('permissions', $permissionsOfUser ), ['id' => 'permissions', 'class' => 'form-control select2bs', 'style'=>'width: 100%;']) ?>
						<?php if ( $ferr ) { ?>
						    <div class="invalid-feedback">
						        <?= $ferr ?>
						    </div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('Basic.global.Groups'), 'groups', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_multiselect('groups[]', $groups, old('groups', $groupsOfUser ), ['id' => 'groups', 'class' => 'form-control select2bs', 'style'=>'width: 100%;']) ?>
						<?php if ( $ferr ) { ?>
						    <div class="invalid-feedback">
						        <?= $ferr ?>
						    </div>
						<?php } ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->