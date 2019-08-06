<style>
    .cr_link{
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "desc"]],
            "aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('correction_request/getCR') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                // nRow.id = 27199;
                nRow.className = "cr_link";
                return nRow;
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                var gtotal = 0, paid = 0, balance = 0;
                for (var i = 0; i < aaData.length; i++) {
                    // balance += parseFloat(aaData[aiDisplay[i]][7]);
                }
                var nCells = nRow.getElementsByTagName('th');
                // nCells[7].innerHTML = currencyFormat(parseFloat(balance));
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            },null, null, null,null, null,null,null,null,null]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('Reference_No');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('Company');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Category');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Type');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Title');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Description');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('Approve_Status');?>]", filter_type: "text", data: []},
            {column_number: 8, filter_default_label: "[<?=lang('Status');?>]", filter_type: "text", data: []},
        ], "footer");
    });
</script>
<style>.table td:nth-child(5) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(6) {
        text-align: center;
    }</style>
<?php //if ($Owner) {
echo form_open('hrms/hrms_actions', 'id="action-form"');
//} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-th"></i><?= lang('Correction_Request'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('correction_request/add'); ?>"><i
                                    class="fa fa-plus-circle"></i> <?= lang("Add"); ?></a></li>
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
                            <th class="col-xs-1"><?php echo lang('Reference_No'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Company'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Category'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Type'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Title'); ?></th>
                            <th class="col-xs-4"><?php echo lang('Description'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Approve_Status'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Status'); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="10" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
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
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th ></th>
                            <th style="width:85px;"><?= lang("actions"); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<?php //if ($Owner) { ?>
<div style="display: none;">
    <input type="hidden" name="form_action" value="" id="form_action"/>
    <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
</div>
<?= form_close() ?>

<?php// } ?>
