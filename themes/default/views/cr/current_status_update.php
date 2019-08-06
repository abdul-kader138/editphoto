<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('Update_status'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open_multipart("correction_request/current_status_update/" . $inv->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= lang('Correction_Details'); ?>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped table-borderless" style="margin-bottom:0;">
                        <tbody>
                        <tr>
                            <td><?= lang('reference_no'); ?></td>
                            <td><?= $inv->reference_no; ?></td>
                        </tr>
                        <tr>
                            <td><?= lang('Type'); ?></td>
                            <td><?= $inv->type; ?></td>
                        </tr>
                        <tr>
                            <td><?= lang('Title'); ?></td>
                            <td><?= $inv->name; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= lang('Status', 'Status'); ?>
                <?php
                $opts = array('Open' => lang('Open'),
                    'Closed' => lang('Closed'));
                ?>
                <?= form_dropdown('status', $opts, $inv->update_status, 'class="form-control" id="status" required="required" style="width:100%;"'); ?>
            </div>
                <div class="form-group">
                    <?= lang("Update_Note", "Update_Note"); ?>
                    <?php echo form_textarea('update_note', (isset($_POST['update_note']) ? $_POST['update_note'] : ""), 'class="form-control" id="repair_note"'); ?>
                </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('update', lang('update'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
