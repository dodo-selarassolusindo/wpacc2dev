		<div class="row">
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T34JurnalBackups.nomor').'*', 'nomor'); ?>
				<?=form_input(['name' => 'nomor', 'type' => 'text', 'id' => 'nomor', 'value' => old('nomor', $t34JurnalBackup->nomor) , 'class' => 'form-control', 'maxlength' => 8, 'required' => true ]);  ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T34JurnalBackups.tanggal').'*', 'tanggal'); ?>
				<?=form_input(['name' => 'tanggal', 'type' => 'date', 'id' => 'tanggal', 'value' => old('tanggal', $t34JurnalBackup->tanggal) , 'class' => 'form-control', 'maxlength' => 10, 'required' => true ]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->
			<div class="col-sm-6 px-4">
				<div class="form-group">
					<?=form_label(lang('T34JurnalBackups.keterangan').'*', 'keterangan'); ?>
						<?=form_textarea(['name'=>'keterangan', 'id' => 'keterangan', 'value' => old('keterangan', $t34JurnalBackup->keterangan), 'rows' => 3, 'style' => 'height: 10em;', 'class' => 'form-control', 'maxlength' => 16313, 'required' => true]) ?>
				</div><!--//.form-group -->

				<div class="form-group">
					<?=form_label(lang('T34JurnalBackups.bulanTahun'), 'bulanTahun'); ?>
				<?=form_input(['name' => 'bulan_tahun', 'type' => 'text', 'id' => 'bulanTahun', 'value' => old('bulan_tahun', $t34JurnalBackup->bulan_tahun) , 'class' => 'form-control', 'maxlength' => 4]);  ?>
				</div><!--//.form-group -->

			</div><!--//.col -->

		</div><!-- //.row -->