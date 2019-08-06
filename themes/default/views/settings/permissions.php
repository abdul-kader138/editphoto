<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .table td:first-child {
        font-weight: bold;
    }

    label {
        margin-right: 10px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('group_permissions'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang("set_permissions"); ?></p>

                <?php if (!empty($p)) {
                    if ($p->group_id != 1) {

                        echo form_open("system_settings/permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">

                                <thead>
                                <tr>
                                    <th colspan="6"
                                        class="text-center"><?php echo $group->description . ' ( ' . $group->name . ' ) ' . $this->lang->line("group_permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="text-center"><?= lang("module_name"); ?>
                                    </th>
                                    <th colspan="5" class="text-center"><?= lang("permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th class="text-center"><?= lang("view"); ?></th>
                                    <th class="text-center"><?= lang("add"); ?></th>
                                    <th class="text-center"><?= lang("edit"); ?></th>
                                    <th class="text-center"><?= lang("delete"); ?></th>
                                    <th class="text-center"><?= lang("misc"); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><?= lang("brands"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="brand-index" <?php echo $p->{'brand-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="brand-add" <?php echo $p->{'brand-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="brand-edit" <?php echo $p->{'brand-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="brand-delete" <?php echo $p->{'brand-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("company"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="company-index" <?php echo $p->{'company-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="company-add" <?php echo $p->{'company-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="company-edit" <?php echo $p->{'company-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="company-delete" <?php echo $p->{'company-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("designation"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="designation-index" <?php echo $p->{'designation-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="designation-add" <?php echo $p->{'designation-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="designation-edit" <?php echo $p->{'designation-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="designation-delete" <?php echo $p->{'designation-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("operator"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="operator-index" <?php echo $p->{'operator-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="operator-add" <?php echo $p->{'operator-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="operator-edit" <?php echo $p->{'operator-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="operator-delete" <?php echo $p->{'operator-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("document"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-index" <?php echo $p->{'document-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-add" <?php echo $p->{'document-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-edit" <?php echo $p->{'document-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-delete" <?php echo $p->{'document-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" id="document-file_manager" class="checkbox" name="document-file_manager" <?php echo $p->{'document-file_manager'} ? "checked" : ''; ?>>
                                        <label for="document-file_manager" class="padding05"><?= lang('File_Manager') ?></label>
                                        <input type="checkbox" value="1" id="document-folder_create" class="checkbox" name="document-folder_create" <?php echo $p->{'document-folder_create'} ? "checked" : ''; ?>>
                                        <label for="document-folder_create" class="padding05"><?= lang('Folder_Create') ?></label>
                                        <input type="checkbox" value="1" id="document-folder_download" class="checkbox" name="document-folder_download" <?php echo $p->{'document-folder_download'} ? "checked" : ''; ?>>
                                        <label for="document-folder_download" class="padding05"><?= lang('Folder_Download') ?></label>
                                        <input type="checkbox" value="1" id="document-upload" class="checkbox" name="document-upload" <?php echo $p->{'document-upload'} ? "checked" : ''; ?>>
                                        <label for="document-upload" class="padding05"><?= lang('Upload') ?></label>
                                        <input type="checkbox" value="1" id="document-file_delete" class="checkbox" name="document-file_delete" <?php echo $p->{'document-file_delete'} ? "checked" : ''; ?>>
                                        <label for="document-file_delete" class="padding05"><?= lang('File_Delete') ?></label>
                                        <input type="checkbox" value="1" id="document-update_status" class="checkbox" name="document-update_status" <?php echo $p->{'document-update_status'} ? "checked" : ''; ?>>
                                        <label for="document-update_status" class="padding05"><?= lang('Status_Update') ?></label>

                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("doc_movement"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-doc_movement_list" <?php echo $p->{'document-doc_movement_list'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-add_movement" <?php echo $p->{'document-add_movement'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-edit_movement" <?php echo $p->{'document-edit_movement'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="document-delete_movement" <?php echo $p->{'document-delete_movement'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("Manpower_Requisition"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-manpower_requisition" <?php echo $p->{'hrms-manpower_requisition'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-add_manpower_requisition" <?php echo $p->{'hrms-add_manpower_requisition'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-edit_manpower_requisition" <?php echo $p->{'hrms-edit_manpower_requisition'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-delete_manpower_requisition" <?php echo $p->{'hrms-delete_manpower_requisition'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("Recruitment_Approval"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-recruitment_approval" <?php echo $p->{'hrms-recruitment_approval'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-add_recruitment_approval" <?php echo $p->{'hrms-add_recruitment_approval'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-edit_recruitment_approval" <?php echo $p->{'hrms-edit_recruitment_approval'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="hrms-delete_recruitment_approval" <?php echo $p->{'hrms-delete_recruitment_approval'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("Correction_Request"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="correction_request-index" <?php echo $p->{'correction_request-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="correction_request-add" <?php echo $p->{'correction_request-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="correction_request-edit" <?php echo $p->{'correction_request-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="correction_request-delete" <?php echo $p->{'correction_request-delete'} ? "checked" : ''; ?>>
                                    </td>

                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("package"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="package-index" <?php echo $p->{'package-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="package-add" <?php echo $p->{'package-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="package-edit" <?php echo $p->{'package-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="package-delete" <?php echo $p->{'package-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("doc_type"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="doctype-index" <?php echo $p->{'doctype-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="doctype-add" <?php echo $p->{'doctype-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="doctype-edit" <?php echo $p->{'doctype-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="doctype-delete" <?php echo $p->{'doctype-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("employees"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-index" <?php echo $p->{'employees-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-add" <?php echo $p->{'employees-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-edit" <?php echo $p->{'employees-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-delete" <?php echo $p->{'employees-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" class="checkbox" name="employees-employee_by_csv" <?php echo $p->{'employees-employee_by_csv'} ? "checked" : ''; ?>>
                                        <label for="customers-deposits" class="padding05"><?= lang('add_employee_by_csv') ?></label>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("employees_payment"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-index_payment" <?php echo $p->{'employees-index_payment'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-add_employee_payment" <?php echo $p->{'employees-add_employee_payment'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-edit_employee_payment" <?php echo $p->{'employees-edit_employee_payment'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-delete_employee_payment" <?php echo $p->{'employees-delete_employee_payment'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" class="checkbox" name="employees-employee_payment_by_csv" <?php echo $p->{'employees-employee_payment_by_csv'} ? "checked" : ''; ?>>
                                        <label for="employee-employee_payment_by_csv" class="padding05"><?= lang('add_employee_payment_by_csv') ?></label>
                                        <input type="checkbox" value="1" class="checkbox" name="employees-salary_process" <?php echo $p->{'employees-salary_process'} ? "checked" : ''; ?>>
                                        <label for="employee-salary_process" class="padding05"><?= lang('salary_process') ?></label>
                                        <input type="checkbox" value="1" class="checkbox" name="employees-list_month_salary" <?php echo $p->{'employees-list_month_salary'} ? "checked" : ''; ?>>
                                        <label for="employee-list_month_salary" class="padding05"><?= lang('list_month_salary') ?></label>

                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("bills"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-bill_index" <?php echo $p->{'employees-bill_index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-bill_add" <?php echo $p->{'employees-bill_add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="employees-bill_delete" <?php echo $p->{'employees-bill_delete'} ? "checked" : ''; ?>>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("Calender"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="calendar-index" <?php echo $p->{'calendar-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="calendar-add" <?php echo $p->{'calendar-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="calendar-edit" <?php echo $p->{'calendar-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="calendar-delete" <?php echo $p->{'calendar-delete'} ? "checked" : ''; ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("categories"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="category-index" <?php echo $p->{'category-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="category-add" <?php echo $p->{'category-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="category-edit" <?php echo $p->{'category-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="category-delete" <?php echo $p->{'category-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= lang("guards"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="guard-index" <?php echo $p->{'guard-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="guard-add" <?php echo $p->{'guard-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="guard-edit" <?php echo $p->{'guard-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="guard-delete" <?php echo $p->{'guard-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" class="checkbox" name="guard-weight_upload" <?php echo $p->{'guard-weight_upload'} ? "checked" : ''; ?>>
                                        <label for="customers-deposits" class="padding05"><?= lang('weight_upload') ?></label>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("reports"); ?></td>
                                    <td colspan="5">
                                         <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="reports-company_bill_details" name="reports-company_bill_details" <?php echo $p->{'reports-company_bill_details'} ? "checked" : ''; ?>>
                                            <label for="sales" class="padding05"><?= lang('reports-company_bill_details') ?></label>
                                        </span>
                                         <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="reports-company_wise_bill" name="reports-company_wise_bill" <?php echo $p->{'reports-company_wise_bill'} ? "checked" : ''; ?>>
                                            <label for="sales" class="padding05"><?= lang('reports-company_wise_bill') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("misc"); ?></td>
                                    <td colspan="5">
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="bulk_actions"
                                            name="bulk_actions" <?php echo $p->bulk_actions ? "checked" : ''; ?>>
                                            <label for="bulk_actions" class="padding05"><?= lang('bulk_actions') ?></label>
                                        </span>
                                         <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="backups_index"
                                                   name="backups_index" <?php echo $p->backups_index ? "checked" : ''; ?>>
                                            <label for="backups_index" class="padding05"><?= lang('Backup_Database') ?></label>
                                        </span>
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="correction_request-status"
                                                   name="correction_request-status" <?php echo $p->{'correction_request-status'} ? "checked" : ''; ?>>
                                            <label for="bulk_actions" class="padding05"><?= lang('Correction_Request_Status') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("Approval"); ?></td>
                                    <td colspan="5">
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="approval_manpower_requisition"
                                                   name="approval_manpower_requisition" <?php echo $p->approval_manpower_requisition ? "checked" : ''; ?>>
                                            <label for="approval_manpower_requisition" class="padding05"><?= lang('Manpower_Requisition') ?></label>
                                        </span>
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="approval_recruitment_approval"
                                                   name="approval_recruitment_approval" <?php echo $p->approval_recruitment_approval ? "checked" : ''; ?>>
                                            <label for="approval_recruitment_approval" class="padding05"><?= lang('Recruitment_Approval') ?></label>
                                        </span>
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="correction_request_approval"
                                                   name="correction_request_approval" <?php echo $p->correction_request_approval ? "checked" : ''; ?>>
                                            <label for="correction_request_approval" class="padding05"><?= lang('Correction_Request_Approval') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?=lang('update')?></button>
                        </div>
                        <?php echo form_close();
                    } else {
                        echo $this->lang->line("group_x_allowed");
                    }
                } else {
                    echo $this->lang->line("group_x_allowed");
                } ?>


            </div>
        </div>
    </div>
</div>