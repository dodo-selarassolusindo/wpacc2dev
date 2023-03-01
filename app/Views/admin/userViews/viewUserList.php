<?=$this->include('Themes/_commonPartialsBs/datatables') ?>
<?=$this->include('Themes/_commonPartialsBs/sweetalert') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=lang('Users.userList') ?></h3>
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

					<table id="tableOfUser" class="table table-striped table-hover" style="width: 100%;">
						<thead>
							<tr>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
								<th><?=lang('Users.id')?></th>
								<th><?= lang('Users.uuid') ?></th>
								<th><?= lang('Users.email') ?></th>
								<th><?= lang('Users.username') ?></th>
								<th><?= lang('Users.firstName') ?></th>
								<th><?= lang('Users.lastName') ?></th>
								<th><?= lang('Users.primaryPhone') ?></th>
								<th><?= lang('Users.picture') ?></th>
								<th><?= lang('Users.resetAt') ?></th>
								<th><?= lang('Users.resetExpires') ?></th>
								<th><?= lang('Users.status') ?></th>
								<th><?= lang('Users.statusMessage') ?></th>
								<th><?= lang('Users.active') ?></th>
								<th><?= lang('Users.forcePassReset') ?></th>
								<th><?= lang('Users.createdAt') ?></th>
								<th><?= lang('Users.updatedAt') ?></th>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
			</div><!--//.card-body -->
			<div class="card-footer">
				<?=anchor(route_to('newUser'), lang('Basic.global.addNew').' '.lang('Users.user'), ['class'=>'btn btn-primary float-right']); ?>
			</div><!--//.card-footer -->
		</div><!--//.card -->
	</div><!--//.col -->
</div><!--//.row -->

<?=$this->endSection() ?>


<?=$this->section('additionalInlineJs') ?>
    
            const lastColNr = $('#tableOfUser').find("tr:first th").length - 1;
            const actionBtns = function(data) {
                return `<td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-sm btn-warning btn-edit mr-1" data-id="${data.id}"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-sm btn-danger btn-delete ml-1" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                        </div>
                        </td>`;
            };
            theTable = $('#tableOfUser').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                responsive: true,
                scrollX: true,
                lengthMenu: [ 5, 10, 25, 50, 75, 100, 250, 500, 1000, 2500 ],
                pageLength: 10,
                lengthChange: true,
                "dom": 'lfrtipB', // 'lfBrtip', // you can try different layout combinations by uncommenting one or the other
		// "dom": '<"top"lf><"clear">rt<"bottom"ipB><"clear">',  // remember to comment this line if you uncomment the above
		"buttons": [
			'copy', 'csv', 'excel', 'print', {
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'A4'
			}
		],
                stateSave: true,
                order: [[1, 'asc']],
                language: {
                    url: "/assets/dt/<?= config('Basics')->languages[$currentLocale] ?? config('Basics')->i18n ?>.json"
                },
                ajax : $.fn.dataTable.pipeline( {
                    url: '<?= route_to('dataTableOfUser') ?>',
                    method: 'POST',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    async: true,
                }),
                columnDefs: [
                    {
                        orderable: false,
                        searchable: false,
                        targets: [0,lastColNr]
                    }
                ],
                columns : [
                    { 'data': actionBtns },
					{ 'data': 'id' },
					{ 'data': 'uuid' },
					{ 'data': 'email' },
					{ 'data': 'username' },
					{ 'data': 'first_name' },
					{ 'data': 'last_name' },
					{ 'data': 'primary_phone' },
					{ 'data': 'picture' },
					{ 'data': 'reset_at' },
					{ 'data': 'reset_expires' },
					{ 'data': 'status' },
					{ 'data': 'status_message' },
					{ 'data': 'active' },
					{ 'data': 'force_pass_reset' },
					{ 'data': 'created_at' },
					{ 'data': 'updated_at' },
                    { 'data': actionBtns }
                ]
            });

    
        theTable.on( 'draw.dt', function () {
                const boolCols = [13, 14];
            for (let coln of boolCols) {
                theTable.column(coln, { page: 'current' }).nodes().each( function (cell, i) {
                    cell.innerHTML = cell.innerHTML == '1' ? '<i class="text-success fas fa-check"></i>' : '';
                });
            }
                const dateCols = [9, 10, 15, 16];
            const shortDateFormat = '<?= convertPhpDateToMomentFormat('d-m-Y')?>';
            const dateTimeFormat = '<?= convertPhpDateToMomentFormat('d-m-Y H:i')?>';
            
            for (let coln of dateCols) {
                theTable.column(coln, { page: 'current' }).nodes().each( function (cell, i) {
                    const datestr = cell.innerHTML;
                    const dateStrLen = datestr.toString().trim().length;
                    if (dateStrLen > 0) {
                        let dateTimeParts= datestr.split(/[- :]/); // regular expression split that creates array with: year, month, day, hour, minutes, seconds values
                        dateTimeParts[1]--; // monthIndex begins with 0 for January and ends with 11 for December so we need to decrement by one
                        const d = new Date(...dateTimeParts); // new Date(datestr);
                        const md = moment(d);
                        const usingThisFormat = dateStrLen > 11 ? dateTimeFormat : shortDateFormat;
                        const formattedDateStr = md.format(usingThisFormat);
                        cell.innerHTML = formattedDateStr;
                    }
                });
            }
    });

$(document).on('click', '.btn-edit', function(e) {
        window.location.href = `<?= route_to('userList') ?>/${$(this).attr('data-id')}/edit`;
    });
    
$(document).on('click', '.btn-delete', function(e) {
        Swal.fire({
            title: '<?= lang('Basic.global.sweet.sureToDeleteTitle', [mb_strtolower(lang('Users.user'))]) ?>',
            text: '<?= lang('Basic.global.sweet.sureToDeleteText') ?>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: '<?= lang('Basic.global.sweet.deleteConfirmationButton') ?>',
            cancelButtonText: '<?= lang('Basic.global.Cancel') ?>',
            cancelButtonColor: '#d33'
        })
        .then((result) => {
            const dataId = $(this).data('id');
            const row = $(this).closest('tr');
            if (result.value) {
                $.ajax({
                    url: `<?= route_to('userList') ?>/${dataId}`,
                    method: 'DELETE',
                }).done((data, textStatus, jqXHR) => {
                    Toast.fire({
                        icon: 'success',
                        title: data.msg ?? jqXHR.statusText,
                    });
                    
                    theTable.clearPipeline();
                    theTable.row($(row)).invalidate().draw();
                }).fail((jqXHR, textStatus, errorThrown) => {
                    Toast.fire({
                        icon: 'error',
                        title: jqXHR.responseJSON.messages.error,
                    });
                })
            }
        });
    });
                                
    

    
<?=$this->endSection() ?>


<?=$this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.<?=config('Basics')->theme['name'] == 'Bootstrap5' ? 'bootstrap5' : 'bootstrap4' ?>.min.css">
<?=$this->endSection() ?>


<?= $this->section('additionalExternalJs') ?>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.<?=config('Basics')->theme['name'] == 'Bootstrap5' ? 'bootstrap5' : 'bootstrap4' ?>.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js" integrity="sha512-xcHCGC5tQ0SHlRX8Anbz6oy/OullASJkEhb4gjkneVpGE3/QGYejf14CUO5n5q5paiHfRFTa9HKgByxzidw2Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js" integrity="sha512-rDbVu5s98lzXZsmJoMa0DjHNE+RwPJACogUCLyq3Xxm2kJO6qsQwjbE5NDk2DqmlKcxDirCnU1wAzVLe12IM3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js" integrity="sha512-cktKDgjEiIkPVHYbn8bh/FEyYxmt4JDJJjOCu5/FQAkW4bc911XtKYValiyzBiJigjVEvrIAyQFEbRJZyDA1wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?=$this->endSection() ?>

