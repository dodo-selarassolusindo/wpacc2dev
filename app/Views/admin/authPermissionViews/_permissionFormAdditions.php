<div class="modal fade" id="modalPermissionForm"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPermissionLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPermissionLabel">Permission Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
                <form id="permissionForm">
            
                    				<?= view("admin/authPermissionViews/_permissionFormItems") ?>
                    <?= csrf_field() ?>
            
                    <input type="hidden" name="form_action" id="formAction">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSavePermission">Save</button>
            </div>
        </div>
    </div>
</div>