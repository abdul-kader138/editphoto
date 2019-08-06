<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[5, "desc"]],
            "aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('employees/getBills') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                var gtotal = 0, paid = 0, balance = 0;
                for (var i = 0; i < aaData.length; i++) {
                    balance += parseFloat(aaData[aiDisplay[i]][3]);
                    paid += parseFloat(aaData[aiDisplay[i]][4]);
                }
                var nCells = nRow.getElementsByTagName('th');
                nCells[3].innerHTML = currencyFormat(parseFloat(balance));
                nCells[4].innerHTML = currencyFormat(parseFloat(paid));
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, null, null, null, null,null, null, null]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('operator');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('package');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('total_ceiling_amount');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('total_usage_amount');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('month');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('year');?>]", filter_type: "text", data: []},
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
<?php if ($Owner) {
    echo form_open('employees/bills_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('bills'); ?></h2>

        <div class="box-icon">


<!--            add ul later-->
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
                            <th class="col-xs-2"><?php echo lang('operator'); ?></th>
                            <th class="col-xs-2"><?php echo lang('package'); ?></th>
                            <th class="col-xs-2"><?php echo lang('total_ceiling_amount'); ?></th>
                            <th class="col-xs-2"><?php echo lang('total_usage_amount'); ?></th>
                            <th class="col-xs-1"><?php echo lang('month'); ?></th>
                            <th class="col-xs-1"><?php echo lang('year'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
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
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th class="col-xs-2"><?php echo lang('operator'); ?></th>
                            <th class="col-xs-2"><?php echo lang('package'); ?></th>
                            <th class="col-xs-2"><?php echo lang('total_ceiling_amount'); ?></th>
                            <th class="col-xs-2"><?php echo lang('total_usage_amount'); ?></th>
                            <th class="col-xs-1"><?php echo lang('month'); ?></th>
                            <th class="col-xs-1"><?php echo lang('year'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<?php if ($Owner) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>

<?php } ?>

