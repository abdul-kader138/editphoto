<style>
    .document_link{
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('document/getDocuments') ?>',
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
                nRow.className = "document_link";
                return nRow;
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                var gtotal = 0;
                for (var i = 0; i < (aaData.length); i++) {
                  if(aaData[aiDisplay[i]][11])  gtotal += parseFloat(aaData[aiDisplay[i]][11]);
                    //console.log(aaData[aiDisplay[i]][11]);
                }
                var nCells = nRow.getElementsByTagName('th');
                nCells[11].innerHTML = parseFloat(gtotal);
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, null, null, null, null, null,null,null,null,null,null,null,null]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('name');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('Address');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('Instrument');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('Instrument_No');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('Bank');?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?=lang('Commission_Type');?>]", filter_type: "text", data: []},
            {column_number: 8, filter_default_label: "[<?=lang('Year');?>]", filter_type: "text", data: []},
            {column_number: 9, filter_default_label: "[<?=lang('Status');?>]", filter_type: "text", data: []},
            {column_number: 10, filter_default_label: "[<?=lang('Credit_Limit');?>]", filter_type: "text", data: []},
        ], "footer");
    });
</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('document'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('document/add'); ?>"><i
                                        class="fa fa-plus-circle"></i> <?= lang("add_document"); ?></a></li>
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
                            <th class="col-xs-2"><?php echo lang('name'); ?></th>
                            <th class="col-xs-1"><?php echo lang('reference_no'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Address'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Instrument'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Instrument_No'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Bank'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Commission_Type'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Year'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Status'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Credit_Limit'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Total_Cheque'); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="12" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
                            </th>
                            <th></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
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
