<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('Add_Delivery_Format'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open("system_settings/addDeliveryFormat", $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="form-group">
                <?= lang('code', 'Code')."<b> *</b>"; ?>
                <?= form_input('code', set_value('code'), 'class="form-control tip" id="code" required="required"'); ?>
            </div>
            <div class="form-group">
                <?= lang('name', 'Name')."<b> *</b>"; ?>
                <?= form_input('name', set_value('name'), 'class="form-control tip" id="name" required="required"'); ?>
            </div>

            <div class="form-group">
                <?= lang('description', 'Description'); ?>
                <?php echo form_textarea('description', '', 'class="form-control skip" id="description" style="height:100px;"'); ?>
            </div>

        </div>
        <div class="modal-footer">
            <?php echo form_submit('add_delivery_format', lang('Add_Delivery_Format'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>