<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <style>
        .modal-dialog{
            width: 650px;
        }
    </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="fa fa-user">&times;</i>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('Add_Approver'); ?></h4>
            </div>
            <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
            echo form_open("system_settings/add_approver", $attrib); ?>
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>

                <div class="form-group">
                    <?= lang("Interface_Name", "Interface_Name")."<b> *</b>"; ?>
                    <?php $sst = array('add_manpower_requisition' => lang('Manpower_Requisition'), 'add_recruitment_approval' => lang('Recruitment_Approval'), 'Purchase Order Change' => lang('Purchase_Order_Change'), 'Sales Order Change' => lang('Sales_Order_Change'), 'Supplier Adjustment' => lang('Supplier_Adjustment'), 'Customer Adjustment' => lang('Customer_Adjustment'));
                    echo form_dropdown('interface_name', $sst, (isset($_POST['interface_name']) ? $_POST['interface_name'] : ''), 'class="form-control input-tip" required="required" id="interface_name" style="width:100%"'); ?>
                </div>

                <div class="form-group">
                    <?= lang("Company", "Company")."<b> *</b>"; ?>
                    <?php
                    $cat1[''] = lang('select') . ' ' . lang('Company');
                    foreach ($companies as $company) {
                        $cat1[$company->id] = $company->name;
                    }
                    echo form_dropdown('company_id', $cat1, (isset($_POST['company_id']) ? $_POST['company_id'] : ''), 'class="form-control select" required="required" id="company_id" style="width:100%"')
                    ?>
                </div>

                <div class="form-group">
                    <?= lang("category", "category")."<b> *</b>"; ?>
                    <?php
                    $cat2[''] = lang('select') . ' ' . lang('category');
                    foreach ($categories as $pcat) {
                        $cat2[$pcat->id] = $pcat->name;
                    }
                    echo form_dropdown('category_id', $cat2, (isset($_POST['category_id']) ? $_POST['category_id'] : ''), 'class="form-control select"  required="required" id="category_id" style="width:100%"')
                    ?>
                </div>

                <div class="form-group">
                    <?= lang("Approver_Name", "Approver_Name")."<b> *</b>"; ?>
                    <?php
                    $cat[''] = lang('select') . ' ' . lang('Approver_Name');
                    foreach ($users as $user) {
                        $cat[$user->id] = $user->username;
                    }
                    echo form_dropdown('approver_id', $cat, (isset($_POST['approver_id']) ? $_POST['approver_id'] : ''), 'class="form-control select" required="required" id="approver_id" style="width:100%"')
                    ?>
                </div>

                <div class="form-group">
                    <?= lang('Approver_SL', 'Approver_SL'); ?>
                    <?= form_input('approver_seq', set_value('approver_seq'), 'class="form-control" id="approver_seq" required="required"'); ?>
                </div>

                <div class="form-group">
                    <?= lang('Approver_SL_Name', 'Approver_SL_Name'); ?>
                    <?= form_input('approver_seq_name', set_value('approver_seq_name'), 'class="form-control" id="approver_seq_name" required="required"'); ?>
                </div>

                <div class="form-group">
                    <?= lang('Next_Approver_SL', 'Next_Approver_SL'); ?>
                    <?= form_input('approver_next_seq', set_value('approver_next_seq'), 'class="form-control" id="approver_next_seq" required="required"'); ?>
                </div>

            </div>
            <div class="modal-footer">
                <?php echo form_submit('add_approver', lang('Add_Approver'), 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>