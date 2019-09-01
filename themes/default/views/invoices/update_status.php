<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('update_status'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open("invoices/update_status/" . $inv[0]->reference_no, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= lang('Invoice_Details'); ?>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped table-borderless" style="margin-bottom:0;">
                        <tbody>
                            <tr>
                                <td><?= lang('reference_no'); ?></td>
                                <td><?= $inv[0]->reference_no; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang('Customer'); ?></td>
                                <td><?= $inv[0]->customer_name; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang('Invoice_Date'); ?></td>
                                <td><strong><?= $inv[0]->order_date; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?= lang('Due_Date'); ?></td>
                                <td><strong><?= $inv[0]->due_date; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?= lang('payment_status'); ?></td>
                                <td><?= $inv[0]->payment_status; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <?= lang('status', 'Payment_Status'); ?>
                <?php
                $opts = array('Completed' => lang('Completed'), 'Pending' => lang('Pending'));
                ?>
                <?= form_dropdown('status', $opts, $inv[0]->payment_status, 'class="form-control" id="status" required="required" style="width:100%;"'); ?>
            </div>

            <div class="form-group">
                <?= lang("note", "note"); ?>
                <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : $this->sma->decode_html($inv->note)), 'class="form-control" id="note"'); ?>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('update', lang('update'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
