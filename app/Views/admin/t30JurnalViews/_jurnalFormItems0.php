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

				<?=view('admin/t30JurnalViews/_jurnaldFormItems') ?>

			</div><!--//.col -->

<input type="hidden" name="id" id="id">

		</div><!-- //.row -->

<script type="text/javascript">
var i = 0;

function addRow()
{
    // alert('1');
    ++i;
    tableContent = `
        <tr id="tableRow`+i+`">
            <td>
				<?=form_dropdown('akun', $akunList, old('akun', $t31Jurnald->akun), ['id' => 'akun', 'class' => 'form-control select2bs', 'style'=>'width: 100%;', 'required' => true]) ?>
            </td>
            <td>
				<?=form_input(['name' => 'debet', 'type' => 'number', 'id' => 'debet', 'value' => old('debet', $t31Jurnald->debet) , 'step'=>'0.01' , 'class' => 'form-control debet', 'maxlength' => 31, 'required' => true, 'onkeyup' => 'hitungTotalDebet()' ]);  ?>
                <!-- <input value="0" onkeyup="hitungTotalDebet()" type="text" name="debet[]" class="form-control debet" placeholder="Debet" minlength="0"  maxlength="25" required> -->
            </td>
            <td>
				<?=form_input(['name' => 'kredit', 'type' => 'number', 'id' => 'kredit', 'value' => old('kredit', $t31Jurnald->kredit) , 'step'=>'0.01' , 'class' => 'form-control kredit', 'maxlength' => 31, 'required' => true, 'onkeyup' => 'hitungTotalKredit()' ]);  ?>
                <!-- <input value="0" onkeyup="hitungTotalKredit()" type="text" name="kredit[]" class="form-control kredit" placeholder="Kredit" minlength="0"  maxlength="25" required> -->
            </td>`;
	if (i == 1) {
	tableContent +=`
            <td>&nbsp;</td>`;
	} else {
	tableContent +=`
            <td><a href="#" onclick="deleteRow(`+i+`)" class="text-danger">Hapus</a></td>`;
	}
	tableContent +=`
        </tr>`;
    $('#tableBody').append(tableContent);
    // $('.select2').select2({dropdownParent: '#data-modal',});
}

function deleteRow(index)
{
	$('#tableRow'+index).remove();
    //--i;
    hitungTotalDebet();
    hitungTotalKredit();
}

function hitungTotalKredit() // tested, ok
{
	var total_kredit = 0;
	$(".kredit").each(function(){
		// totalDebet += parseInt($(this).val().replace(/\D/g,''));
        total_kredit += parseFloat($(this).val());
	});

	$('#total_kredit').val(total_kredit);
	// $('#totalbayar_real').val(total_bayar);

	// hitungSisaBayar();
}

function hitungTotalDebet() // tested, ok
{
	var total_debet = 0;
	$(".debet").each(function(){
		// totalDebet += parseInt($(this).val().replace(/\D/g,''));
        total_debet += parseFloat($(this).val());
	});

	$('#total_debet').val(total_debet);
	// $('#totalbayar_real').val(total_bayar);

	// hitungSisaBayar();
}
</script>
