<?=$this->include('Themes/_commonPartialsBs/datatables') ?>
<?=$this->include('Themes/_commonPartialsBs/sweetalert') ?>
<?=$this->extend('Themes/'.config('Basics')->theme['name'].'/AdminLayout/defaultLayout') ?>
<?=$this->section('content');  ?>
<div class="row">
	<div class="col-md-12">

		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><?=lang('AuthGroups.groupList') ?></h3>
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

					<table id="tableOfGroup" class="table table-striped table-hover" style="width: 100%;">
						<thead>
							<tr>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
								<th><?=lang('AuthGroups.id')?></th>
								<th><?= lang('AuthGroups.name') ?></th>
								<th><?= lang('AuthGroups.description') ?></th>
								<th class="text-nowrap"><?= lang('Basic.global.Action') ?></th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
			</div><!--//.card-body -->
			<div class="card-footer">
				<div class="float-right">
                    <button type="button" class="btn btn-block btn-primary" id="btnAddRecord" data-toggle="modal" data-target="#modalGroupForm">
                        <?=lang('Basic.global.addNew').' '.lang('AuthGroups.group') ?>
                    </button>
				<div> <!--./ float-right-->
			</div><!--//.card-footer -->
		</div><!--//.card -->
	</div><!--//.col -->
</div><!--//.row -->

<?=$this->endSection() ?>


<?=$this->section('footerAdditions') ?>
	<?=$this->include('admin/authGroupViews/_groupFormAdditions') ?>
<?=$this->endSection() ?>


<?=$this->section('additionalInlineJs') ?>
    
            const lastColNr = $('#tableOfGroup').find("tr:first th").length - 1;
            const actionBtns = function(data) {
                return `<td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-sm btn-warning btn-edit mr-1" data-bs-toggle="modal" data-bs-target="#modalGroupForm" data-id="${data.id}"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-sm btn-danger btn-delete ml-1" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                        </div>
                        </td>`;
            };
            theTable = $('#tableOfGroup').DataTable({
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
                    url: '<?= route_to('dataTableOfGroup') ?>',
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
					{ 'data': 'name' },
					{ 'data': 'description' },
                    { 'data': actionBtns }
                ]
            });

    
    

$(document).on('click', '#btnAddRecord', () => {
    $('#modalGroupLabel').html("Add a New Group");
    $('#groupForm').find('input[name="form_action"]').val('add');
    $('#groupForm').find('input[name="id"]').val('');
    // call select2 functions here if applicable
});

$('#modalGroupForm').on('hidden.bs.modal', function() {
    $(this).find('#groupForm')[0].reset();
    $('.text-danger').remove();
    $('.is-invalid').removeClass('is-invalid');
});

$(document).on('click', '#btnSaveGroup', () => {
    $('.text-danger').remove();
    $('.is-invalid').removeClass('is-invalid');
    const theForm = $('#groupForm');
    if (theForm === undefined || theForm == null) {
        return;
    }
    const fa = $('#formAction').val();
    let u, fm;
    if (fa == 'add') {
        u = '<?= route_to('ajaxCreateGroup') ?>';
        fm = 'POST';
    } else {
        u = `<?= route_to('groupList') ?>/${ $('#id').val() }/update`;
        fm = 'PUT';
    }

    $.ajax({
        url: u,
        method: fm,
        data: theForm.serialize()
    }).done((data, textStatus, jqXHR) => {
        Toast.fire({
            icon: 'success',
            title: jqXHR.statusText
        });
        // if (fa == 'add') {
            theTable.clearPipeline();
        // }

        $("#modalGroupForm").modal('hide');
        theForm.trigger("reset");

        theTable.ajax.reload();

    }).fail((xhr, status, error) => {
        let errMsg;
        if (errMsg = xhr.responseJSON.message ?? xhr.responseJSON.messages.error) {
            Toast.fire({
                icon: 'error',
                title: errMsg,
            });
        }

        $.each(xhr.responseJSON.messages, (elem, message) => {
            theForm.find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + message + '</p>');
            theForm.find('textarea[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + message + '</p>');
        });
    });
});


function getDataToEdit(sender) {
    $.ajax({
        url: `<?= route_to('groupList') ?>/${sender}/edit`,
        method: 'GET',
    }).done((response) => {
        const editForm = $('#groupForm');
		editForm.find('#name').val(response.data.name);
		editForm.find('#description').val(response.data.description);

        let ident = editForm.find('#id') ?? $('#id');
		if (response.data.id !== undefined && ident !== undefined ) {
			ident.val(response.data.id);
		}
        
        
        editForm.find('input[name="form_action"]').val('edit');
        $('#modalGroupLabel').html("Edit Group");
        $("#modalGroupForm").modal('show');

    }).fail((error) => {
        Toast.fire({
            icon: 'error',
            title: error.responseJSON.messages.error,
        });
        
    });
}

$(document).on('click', '.btn-edit', function(e) {
    e.preventDefault();
    const dest = $(this).attr('data-id');
    
    getDataToEdit(dest);
});
    
$(document).on('click', '.btn-delete', function(e) {
        Swal.fire({
            title: '<?= lang('Basic.global.sweet.sureToDeleteTitle', [mb_strtolower(lang('AuthGroups.group'))]) ?>',
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
                    url: `<?= route_to('groupList') ?>/${dataId}`,
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

