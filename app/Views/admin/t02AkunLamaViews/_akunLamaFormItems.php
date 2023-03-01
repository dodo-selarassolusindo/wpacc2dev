		<div class="row">
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.grupAkun').'*', 'grupAkun'); ?>
				<?=form_input(['name' => 'grup_akun', 'type' => 'number', 'id' => 'grupAkun', 'value' => old('grup_akun', $t02AkunLama->grup_akun) , 'class' => 'form-control', 'maxlength' => 11, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.kode').'*', 'kode'); ?>
				<?=form_input(['name' => 'kode', 'type' => 'text', 'id' => 'kode', 'value' => old('kode', $t02AkunLama->kode) , 'class' => 'form-control', 'maxlength' => 4, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.nama').'*', 'nama'); ?>
				<?=form_input(['name' => 'nama', 'type' => 'text', 'id' => 'nama', 'value' => old('nama', $t02AkunLama->nama) , 'class' => 'form-control', 'maxlength' => 50, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.debetLalu').'*', 'debetLalu'); ?>
				<?=form_input(['name' => 'debet_lalu', 'type' => 'number', 'id' => 'debetLalu', 'value' => old('debet_lalu', $t02AkunLama->debet_lalu) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.kreditLalu').'*', 'kreditLalu'); ?>
				<?=form_input(['name' => 'kredit_lalu', 'type' => 'number', 'id' => 'kreditLalu', 'value' => old('kredit_lalu', $t02AkunLama->kredit_lalu) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.debetIni').'*', 'debetIni'); ?>
				<?=form_input(['name' => 'debet_ini', 'type' => 'number', 'id' => 'debetIni', 'value' => old('debet_ini', $t02AkunLama->debet_ini) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.kreditIni').'*', 'kreditIni'); ?>
				<?=form_input(['name' => 'kredit_ini', 'type' => 'number', 'id' => 'kreditIni', 'value' => old('kredit_ini', $t02AkunLama->kredit_ini) , 'step'=>'0.01' , 'class' => 'form-control', 'maxlength' => 31, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T02AkunLamas.bulanTahun').'*', 'bulanTahun'); ?>
				<?=form_input(['name' => 'bulan_tahun', 'type' => 'text', 'id' => 'bulanTahun', 'value' => old('bulan_tahun', $t02AkunLama->bulan_tahun) , 'class' => 'form-control', 'maxlength' => 4, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->

		</div><!-- //.row -->