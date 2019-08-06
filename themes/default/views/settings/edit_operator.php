<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_operator'); ?></h4>
            </div>
            <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
            echo form_open_multipart("system_settings/edit_operator/" . $operator->id, $attrib); ?>
            <div class="modal-body">
                <p><?= lang('update_info'); ?></p>

                <div class="form-group">
                    <?= lang('code', 'code'); ?>
                    <?= form_input('code', $operator->code, 'class="form-control" id="code"'); ?>
                </div>

                <div class="form-group">
                    <?= lang('name', 'name'); ?>
                    <?= form_input('name', $operator->name, 'class="form-control" id="name" required="required"'); ?>
                </div>
                <div class="form-group">
                    <?= lang('contact_person', 'contact_person'); ?>
                    <?= form_input('contact_person', $operator->contact_person, 'class="form-control" id="contact_person" '); ?>
                </div>
                <div class="form-group">
                    <?= lang('contact_number', 'contact_number'); ?>
                    <?= form_input('contact_number', $operator->contact_number, 'class="form-control" id="contact_number" '); ?>
                </div>
                <div class="form-group">
                    <?= lang('address', 'address'); ?>
                    <?= form_input('address', $operator->address, 'class="form-control" id="address" '); ?>
                </div>
                <div class="form-group">
                    <?= lang("image", "image") ?>
                    <input id="image" type="file" data-browse-label="<?= lang('browse'); ?>" name="userfile" data-show-upload="false" data-show-preview="false"
                           class="form-control file">
                </div>
                <?php echo form_hidden('id', $operator->id); ?>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('edit_operator', lang('edit_operator'), 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>