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
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><?= lang("misc"); ?></td>
                                    <td colspan="5">
                                        <span style="inline-block">
                                            <input type="checkbox" value="1" class="checkbox" id="bulk_actions"
                                            name="bulk_actions" <?php echo $p->bulk_actions ? "checked" : ''; ?>>
                                            <label for="bulk_actions" class="padding05"><?= lang('bulk_actions') ?></label>
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