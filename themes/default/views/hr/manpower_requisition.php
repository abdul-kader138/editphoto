<style>
    .manpower_requisition_link{
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
            'sAjaxSource': '<?= site_url('hrms/getMR') ?>',
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
                nRow.className = "manpower_requisition_link";
                return nRow;
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                var gtotal = 0, paid = 0, balance = 0;
                for (var i = 0; i < aaData.length; i++) {
                    balance += parseFloat(aaData[aiDisplay[i]][7]);
                }
                var nCells = nRow.getElementsByTagName('th');
                nCells[7].innerHTML = currencyFormat(parseFloat(balance));
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, {
                "mRender": fsd
            }, null, null, null,null, null,null,null,null]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('Requisition_date');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('Designation');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Workstation');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Department');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Company');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Organization_Type');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('Number_Required');?>]", filter_type: "text", data: []},
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
        <h2 class="blue"><i class="fa-fw fa fa-user"></i><?= lang('Manpower_Requisition'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('hrms/add_manpower_requisition'); ?>"><i
                                    class="fa fa-plus-circle"></i> <?= lang("Add_Manpower_Requisition"); ?></a></li>
                        <li><a href="#" id="excel" data-action="export_excel"><i
                                        class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?></a></li>
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
                            <th><?php echo lang('Requisition_date'); ?></th>
                            <th><?php echo lang('Designation'); ?></th>
                            <th><?php echo lang('Workstation'); ?></th>
                            <th><?php echo lang('Department'); ?></th>
                            <th><?php echo lang('Company'); ?></th>
                            <th><?php echo lang('Organization_Type'); ?></th>
                            <th><?php echo lang('Number_Required'); ?></th>
                            <th><?php echo lang('Status'); ?></th>
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
                            <th ></th>
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
