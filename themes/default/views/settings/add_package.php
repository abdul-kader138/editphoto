<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('add_package'); ?></h4>
            </div>
            <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
            echo form_open_multipart("system_settings/add_package", $attrib); ?>
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>

                <div class="form-group">
                    <?= lang('code', 'code'); ?>
                    <?= form_input('code', '', 'class="form-control" id="code" required="required"'); ?>
                </div>

                <div class="form-group">
                    <?= lang('name', 'name'); ?>
                    <?= form_input('name', '', 'class="form-control" id="name" required="required"'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('add_package', lang('add_package'), 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>