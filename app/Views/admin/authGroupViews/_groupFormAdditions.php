<div class="modal fade" id="modalGroupForm"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGroupLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGroupLabel">Group Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
                <form id="groupForm">
            
                    				<?= view("admin/authGroupViews/_groupFormItems") ?>
                    <?= csrf_field() ?>
            
                    <input type="hidden" name="form_action" id="formAction">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveGroup">Save</button>
            </div>
        </div>
    </div>
</div>