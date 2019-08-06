<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('Edit_Approver(Others)'); ?></h4>
            </div>
            <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
            echo form_open("system_settings/edit_approver_others/".$id, $attrib); ?>
            <div class="modal-body">
                <p><?= lang('update_info'); ?></p>

                <div class="form-group">
                    <?= lang("Interface_Name", "Interface_Name")."<b> *</b>"; ?>
                    <?php
                    $sst = array('Correction Request' => lang('Correction_Request'));
                    echo form_dropdown('interface_name', $sst, $aprrover->interface_name, 'class="form-control input-tip" required="required" id="interface_name" style="width:100%"'); ?>
                </div>

                <div class="form-group">
                    <?= lang("Type", "Type")."<b> *</b>"; ?>
                    <?php $ssty = array('Sales(Farm/Factory)' => lang('Sales_(Farm/Factory)'),'Sales(HeadOffice)' => lang('Sales_(HeadOffice)'),'Purchase(Farm/Factory)-Local' => lang('Purchase(Farm/Factory)_Local'),'Purchase(HeadOffice)-Local' => lang('Purchase(HeadOffice)_Local'),'Purchase(HeadOffice)-Export/Import' => lang('Purchase(HeadOffice)_-Export/Import'),'Purchase(Farm/Factory)-Export/Import' => lang('Purchase(Farm/Factory)_-Export/Import'));
                    echo form_dropdown('type', $ssty, $aprrover->type,'class="form-control input-tip" required="required" id="type" style="width:100%"'); ?>
                </div>


                <div class="form-group">
                    <?= lang("Company", "Company")."<b> *</b>"; ?>
                    <?php
                    $cat1[''] = lang('select') . ' ' . lang('Company');
                    foreach ($companies as $company) {
                        $cat1[$company->id] = $company->name;
                    }
                    echo form_dropdown('company_id', $cat1, $aprrover->company_id, 'class="form-control select" required="required" id="company_id" style="width:100%"')
                    ?>
                </div>


                <div class="form-group">
                    <?= lang("category", "category")."<b> *</b>"; ?>
                    <?php
                    $cat2[''] = lang('select') . ' ' . lang('category');
                    foreach ($doctype as $pcat) {
                        $cat2[$pcat->id] = $pcat->name;
                    }
                    echo form_dropdown('category_id', $cat2, $aprrover->category_id, 'class="form-control select"  required="required" id="category_id" style="width:100%"')
                    ?>
                </div>

                <div class="form-group">
                    <?= lang("Approver_Name", "Approver_Name")."<b> *</b>"; ?>
                    <?php
                    $cat[''] = lang('select') . ' ' . lang('Approver_Name');
                    foreach ($users as $user) {
                        $cat[$user->id] = $user->username;
                    }
                    echo form_dropdown('approver_id', $cat, $aprrover->approver_id, 'class="form-control select" required="required" id="approver_id" style="width:100%"')
                    ?>
                </div>

                <div class="form-group">
                    <?= lang('Approver_SL', 'Approver_SL'); ?>
                    <?= form_input('approver_seq', set_value('approver_seq',$aprrover->approver_seq), 'class="form-control" id="approver_seq" required="required"'); ?>
                </div>

                <div class="form-group">
                    <?= lang('Approver_SL_Name', 'Approver_SL_Name'); ?>
                    <?= form_input('approver_seq_name', set_value('approver_seq_name',$aprrover->approver_seq_name), 'class="form-control" id="approver_seq_name" required="required"'); ?>
                </div>
                <div class="form-group">
                    <?= lang('Next_Approver_SL', 'Next_Approver_SL'); ?>
                    <?= form_input('approver_next_seq', set_value('approver_next_seq',$aprrover->approver_next_seq), 'class="form-control" id="approver_next_seq" required="required"'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo form_submit('edit_approver', lang('Edit_Approver'), 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>