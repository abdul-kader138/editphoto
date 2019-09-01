<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('Edit_Delivery_Time_Cost'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open("system_settings/editDeliveryTimeCost/".$sd_detail->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="form-group">
                <?= lang('code', 'code'); ?>
                <?= form_input('code', set_value('code', $sd_detail->code), 'class="form-control tip" id="code" required="required"'); ?>
            </div>
            <div class="form-group">
                <?= lang('name', 'name'); ?>
                <?= form_input('name', set_value('name', $sd_detail->name), 'class="form-control tip" id="name" required="required"'); ?>
            </div>
            <div class="form-group">
                <?php $att = array('name' => 'price', 'type' => 'number','step'=>'any');?>
                <?= lang('price', 'Price')."<b> *</b>"; ?>
                <?= form_input($att, set_value('price',$sd_detail->price), 'class="form-control tip" id="price" required="required"'); ?>
            </div>
            <div class="form-group">
                <?= lang('description', 'Description')."<b> *</b>"; ?>
                <?php echo form_textarea('description', set_value('description', $sd_detail->description), 'class="form-control skip" id="description" style="height:100px;"'); ?>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_delivery_time_cost', lang('Edit'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>