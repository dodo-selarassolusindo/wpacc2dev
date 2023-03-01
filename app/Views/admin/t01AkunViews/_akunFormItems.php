		<div class="row">
			<div class="col-md-12 px-4">

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.grupAkun').'*', 'grupAkun', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_dropdown('grup_akun', $grupAkunList, old('grup_akun', $t01Akun->grup_akun), ['id' => 'grupAkun', 'class' => 'form-control select2bs2', 'style'=>'width: 100%;', 'required' => true]) ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.kode').'*', 'kode', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kode', 'type' => 'text', 'id' => 'kode', 'value' => old('kode', $t01Akun->kode) , 'class' => 'form-control', 'maxlength' => 4, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.nama').'*', 'nama', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'nama', 'type' => 'text', 'id' => 'nama', 'value' => old('nama', $t01Akun->nama) , 'class' => 'form-control', 'maxlength' => 50, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.debetLalu').'*', 'debetLalu', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'debet_lalu', 'type' => 'number', 'id' => 'debetLalu', 'value' => old('debet_lalu', $t01Akun->debet_lalu) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.kreditLalu').'*', 'kreditLalu', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kredit_lalu', 'type' => 'number', 'id' => 'kreditLalu', 'value' => old('kredit_lalu', $t01Akun->kredit_lalu) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.debetIni').'*', 'debetIni', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'debet_ini', 'type' => 'number', 'id' => 'debetIni', 'value' => old('debet_ini', $t01Akun->debet_ini) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.kreditIni').'*', 'kreditIni', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'kredit_ini', 'type' => 'number', 'id' => 'kreditIni', 'value' => old('kredit_ini', $t01Akun->kredit_ini) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->

				<div class="form-group row">
					<?=form_label(lang('T01Akuns.bulanTahun').'*', 'bulanTahun', ['class'=>'col-md-4 col-form-label']); ?>
					<div class="col-md-8">
						<?=form_input(['name' => 'bulan_tahun', 'type' => 'text', 'id' => 'bulanTahun', 'value' => old('bulan_tahun', $t01Akun->bulan_tahun) , 'class' => 'form-control', 'maxlength' => 4, 'required' => true ]);  ?>
					</div><!--//.col -->
				</div><!--//.form-group -->
			</div><!--//.col -->

		</div><!-- //.row -->