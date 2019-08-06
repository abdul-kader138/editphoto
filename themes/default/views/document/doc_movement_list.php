<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('document/getDocumentMovement') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, null, null, null, null, null,null,null,{
                "bSortable": false,
                "mRender": download
            },null]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('Activities');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('Document_Name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Company');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Application_Type');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Fees');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Expire_Date');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('Notification_Date');?>]", filter_type: "text", data: []},
            {column_number: 8, filter_default_label: "[<?=lang('Attachment');?>]", filter_type: "text", data: []},
        ], "footer");
    });
</script>
<style>.table td:nth-child(5) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(8) {
        text-align: center;
    }</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('doc_movement_list'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('document/add_movement'); ?>"><i
                                        class="fa fa-plus-circle"></i> <?= lang("add_movement"); ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?= lang('list_results'); ?></p>

                <div class="table-responsive">
                    <table id="UsrTable" cellpadding="0" cellspacing="0" border="0"
                           class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th class="col-xs-2"><?php echo lang('Activities'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Document_Name'); ?></th>
                            <th class="col-xs-2"><?php echo lang('company'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Application_Type'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Fees'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Expire_Date'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Notification_Date'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Attachment'); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="8" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th></th>
                            <th></th>
                            <th><?= lang("actions"); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
