<div class="form-group row">
	<?=form_label('Jurnal Detail', 'keterangan', ['class'=>'col-md-4 col-form-label']); ?>
</div><!--//.form-group -->

<div class="form-group row">
	<div class="col-md-12">
		<table id="tableOfJurnald" class="table table-striped table-hover using-data-table" style="width: 100%;">
			<thead>
				<tr>

					<th><?= lang('T01Akuns.akun') ?></th>
					<th><?= lang('T31Jurnalds.debet') ?></th>
					<th><?= lang('T31Jurnalds.kredit') ?></th>
					<th>&nbsp;</th>

				</tr>
			</thead>
			<tbody id="tableBody">

			</tbody>
			<tfoot>
                <tr>
                    <th style="text-align:right">Total</th>
                    <td>
                        <input type="text" id="total_debet" name="total_debet" class="form-control" placeholder="Total Debet" minlength="0"  maxlength="25" required readonly>
                    </td>
                    <td>
                        <input type="text" id="total_kredit" name="total_kredit" class="form-control" placeholder="Total Kredit" minlength="0"  maxlength="25" required readonly>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <a href="#tableRow0" onclick="addRow()" class="btn btn-sm btn-primary mb-2">Tambah Detail</a>
                    </td>
                </tr>
            </tfoot>
		</table>
	</div><!--//.col -->
</div><!--//.form-group -->
