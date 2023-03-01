<?php if (config('Basics')->theme['name'] == 'Bootstrap5') { ?>
    <div class="modal fade" id="confirm2delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirm2deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm2deleteLabel">Confirm to delete record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger btn-confirm"> Yes, Delete It! </a>
                </div><!--//.modal-footer -->
            </div><!--//.modal-content -->
        </div><!--//.modal-dialog -->
    </div><!--//.modal -->
<?php } else { ?>
    <div id="confirm2delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm2deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm2deleteLabel">Confirm to delete record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-confirm"> Yes, Delete It! </a>
                </div><!--//.modal-footer -->
            </div><!--//.modal-content -->
        </div><!--//.modal-dialog -->
    </div><!--//.modal -->
<?php } ?>