<?=$this->include('Themes/_commonPartialsBs/datatables') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=lang('T34JurnalBackups.jurnalBackupList') ?></h3>
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

					<table id="tableOfJurnalbackup" class="table table-striped table-hover using-data-table" style="width: 100%;">
						<thead>
							<tr>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
								<th><?= lang('T34JurnalBackups.id') ?></th>
								<th><?= lang('T34JurnalBackups.nomor') ?></th>
								<th><?= lang('T34JurnalBackups.tanggal') ?></th>
								<th><?= lang('T34JurnalBackups.keterangan') ?></th>
								<th><?= lang('T34JurnalBackups.bulanTahun') ?></th>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($jurnalBackupList as $item ) : ?>
							<tr>
								<td class="align-middle text-center text-nowrap">
									<?=anchor(route_to('editJurnalBackup', $item->id), '<i class="fas fa-pencil-alt"></i>', ['class'=>'btn btn-sm btn-warning btn-edit mr-1',  'data-id'=>$item->id,]); ?> 
									<?=anchor('#confirm2delete', '<i class="fas fa-trash"></i>', ['class'=>'btn btn-sm btn-danger btn-delete ml-1', 'data-href'=>route_to('deleteJurnalBackup', $item->id), 'data-toggle'=>'modal', 'data-target'=>'#confirm2delete']); ?>
								</td>
								<td class="align-middle text-center">
									<?=$item->id ?>
								</td>
								<td class="align-middle">
									<?= esc($item->nomor) ?>
								</td>
								<td class="align-middle text-nowrap">
									<?= empty($item->tanggal) ? '' : date('d-m-Y', strtotime($item->tanggal))  ?>
								</td>
								<td class="align-middle">
									<?= empty($item->keterangan) || strlen($item->keterangan) < 51 ? esc($item->keterangan) : character_limiter(esc($item->keterangan), 50)   ?>
								</td>
								<td class="align-middle">
									<?= esc($item->bulan_tahun) ?>
								</td>
								<td class="align-middle text-center text-nowrap">
									<?=anchor(route_to('editJurnalBackup', $item->id), '<i class="fas fa-pencil-alt"></i>', ['class'=>'btn btn-sm btn-warning btn-edit mr-1',  'data-id'=>$item->id,]); ?> 
									<?=anchor('#confirm2delete', '<i class="fas fa-trash"></i>', ['class'=>'btn btn-sm btn-danger btn-delete ml-1', 'data-href'=>route_to('deleteJurnalBackup', $item->id), 'data-toggle'=>'modal', 'data-target'=>'#confirm2delete']); ?>
								</td>
							</tr>

						<?php endforeach; ?>
						</tbody>
					</table>
			</div><!--//.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('newJurnalBackup'), lang('Basic.global.addNew').' '.lang('T34JurnalBackups.jurnalBackup'), ['class'=>'btn btn-primary float-right']); ?>
			</div><!--//.card-footer -->
		</div><!--//.card -->
	</div><!--//.col -->
</div><!--//.row -->

<?=$this->endSection() ?>