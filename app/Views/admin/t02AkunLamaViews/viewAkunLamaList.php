<?=$this->include('Themes/_commonPartialsBs/datatables') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=lang('T02AkunLamas.akunLamaList') ?></h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>

					<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fas fa-times"></i>
					</button>

				</div><!--//.card-tools -->

			</div><!--//.card-header -->
			<div class="card-body">
				<?= view('Themes/_commonPartialsBs/_alertBoxes'); ?>

					<table id="tableOfAkunlama" class="table table-striped table-hover using-data-table" style="width: 100%;">
						<thead>
							<tr>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
								<th><?= lang('T02AkunLamas.grupAkun') ?></th>
								<th><?= lang('T02AkunLamas.kode') ?></th>
								<th><?= lang('T02AkunLamas.nama') ?></th>
								<th><?= lang('T02AkunLamas.debetLalu') ?></th>
								<th><?= lang('T02AkunLamas.kreditLalu') ?></th>
								<th><?= lang('T02AkunLamas.debetIni') ?></th>
								<th><?= lang('T02AkunLamas.kreditIni') ?></th>
								<th><?= lang('T02AkunLamas.bulanTahun') ?></th>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($akunLamaList as $item ) : ?>
							<tr>
								<td class="align-middle text-center text-nowrap">
									<?=anchor(route_to('editAkunLama', $item->id), '<i class="fas fa-pencil-alt"></i>', ['class'=>'btn btn-sm btn-warning btn-edit mr-1',  'data-id'=>$item->id,]); ?> 
									<?=anchor('#confirm2delete', '<i class="fas fa-trash"></i>', ['class'=>'btn btn-sm btn-danger btn-delete ml-1', 'data-href'=>route_to('deleteAkunLama', $item->id), 'data-toggle'=>'modal', 'data-target'=>'#confirm2delete']); ?>
								</td>
								<td class="align-middle">
									<?= esc($item->grup_akun) ?>
								</td>
								<td class="align-middle">
									<?= esc($item->kode) ?>
								</td>
								<td class="align-middle">
									<?= empty($item->nama) || strlen($item->nama) < 51 ? esc($item->nama) : character_limiter(esc($item->nama), 50)   ?>
								</td>
								<td class="align-middle">
									<?= esc($item->debet_lalu) ?>
								</td>
								<td class="align-middle">
									<?= esc($item->kredit_lalu) ?>
								</td>
								<td class="align-middle">
									<?= esc($item->debet_ini) ?>
								</td>
								<td class="align-middle">
									<?= esc($item->kredit_ini) ?>
								</td>
								<td class="align-middle">
									<?= esc($item->bulan_tahun) ?>
								</td>
								<td class="align-middle text-center text-nowrap">
									<?=anchor(route_to('editAkunLama', $item->id), '<i class="fas fa-pencil-alt"></i>', ['class'=>'btn btn-sm btn-warning btn-edit mr-1',  'data-id'=>$item->id,]); ?> 
									<?=anchor('#confirm2delete', '<i class="fas fa-trash"></i>', ['class'=>'btn btn-sm btn-danger btn-delete ml-1', 'data-href'=>route_to('deleteAkunLama', $item->id), 'data-toggle'=>'modal', 'data-target'=>'#confirm2delete']); ?>
								</td>
							</tr>

						<?php endforeach; ?>
						</tbody>
					</table>
			</div><!--//.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('newAkunLama'), lang('Basic.global.addNew').' '.lang('T02AkunLamas.akunLama'), ['class'=>'btn btn-primary float-right']); ?>
			</div><!--//.card-footer -->
		</div><!--//.card -->
	</div><!--//.col -->
</div><!--//.row -->

<?=$this->endSection() ?>