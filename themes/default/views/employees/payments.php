<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('employees/getPayments') ?>',
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
            },  null, null,null,null,null,null,null,null, {"mRender": employee_status},{"bSortable": false}]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('employee');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('company');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('bank_name');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('bank_account');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('gross_salary');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('payment_payroll');?>]", filter_type: "text", data: []},
            {column_number: 8, filter_default_label: "[<?=lang('payment_other');?>]", filter_type: "text", data: []},
            {column_number: 9, filter_default_label: "[<?=lang('status');?>]", filter_type: "text", data: []},
            {
                column_number: 9, select_type: 'select2',
                select_type_options: {
                    placeholder: '<?=lang('status');?>',
                    width: '100%',
                    style: 'width:100%;',
                    minimumResultsForSearch: -1,
                    allowClear: true
                },
                data: [{value: '1', label: '<?=lang('active');?>'}, {value: '0', label: '<?=lang('inactive');?>'}]
            }
        ], "footer");
    });
</script>
<style>.table td:nth-child(6) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(8) {
        text-align: center;
    }</style>
<?php //if ($Owner) {
echo form_open('employees/employees_payment_actions', 'id="action-form"');
//} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('index_payment'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('employees/add_employee_payment'); ?>"><i
                                    class="fa fa-plus-circle"></i> <?= lang("add_employee_payment"); ?></a></li>
                        <li><a href="#" id="excel" data-action="export_excel"><i
                                    class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?></a></li>
                        <li><a href="#" id="pdf" data-action="export_pdf"><i
                                    class="fa fa-file-pdf-o"></i> <?= lang('export_to_pdf') ?></a></li>
                        <li class="divider"></li>
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
                            <th class="col-xs-1"><?php echo lang('employee_id'); ?></th>
                            <th class="col-xs-2"><?php echo lang('name'); ?></th>
                            <th class="col-xs-2"><?php echo lang('company'); ?></th>
                            <th class="col-xs-1"><?php echo lang('bank_name'); ?></th>
                            <th class="col-xs-1"><?php echo lang('bank_account'); ?></th>
                            <th class="col-xs-1"><?php echo lang('gross_salary'); ?></th>
                            <th class="col-xs-1"><?php echo lang('payment_payroll'); ?></th>
                            <th class="col-xs-1"><?php echo lang('payment_other'); ?></th>
                            <th style="width:100px;"><?php echo lang('status'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
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
                            <th></th>
                            <th style="width:100px;"></th>
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

<script type="application/javascript">

    function employee_status(x) {
        var y = x.split("__");
        return y[0] == 1 ?
        '<span class="label label-success"><i class="fa fa-check"></i> '+lang['active']+'</span>' :
        '<span class="label label-danger"><i class="fa fa-times"></i> '+lang['inactive']+'</span>';
    }
</script>
