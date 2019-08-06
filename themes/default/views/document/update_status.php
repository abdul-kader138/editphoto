<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('update_status'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open_multipart("document/update_status/" . $document->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= lang('Document_Details'); ?>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped table-borderless" style="margin-bottom:0;">
                        <tbody>
                        <tr>
                            <td><?= lang('Name'); ?>:</td>
                            <td><?= lang(ucwords($document->name)); ?></td>
                        </tr>
                        <tr>
                            <td><?= lang('Address'); ?>:</td>
                            <td><?= $document->address; ?></td>
                        </tr>
                        <tr>
                            <td><?= lang('Instrument'); ?>:</td>
                            <td><?= $document->instrument; ?></td>
                        </tr>
                        <tr>
                            <td><?= lang('Total_Cheque'); ?>:</td>
                            <td><strong><?= $document->total_cheque ?></strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= lang('status', 'status'); ?>
                <?php
                $opts = array('In Hand' => lang('In_Hand'),'Distributed' => lang('Distributed'));
                ?>
                <?= form_dropdown('status', $opts, (isset($_POST['status']) ? $_POST['status'] : $document->status), 'class="form-control" id="status" required="required" style="width:100%;"'); ?>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('update', lang('update'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
