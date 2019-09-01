<style>
    .invoices_link {
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function () {
        var oTable;
        'use strict';
        oTable = $('#UsrTable').dataTable({
            "aaSorting": [[8, "desc"]],
            "aLengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('invoices/getInvoices') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            }, 'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                // nRow.id = 27199;
                nRow.className = "invoices_link";
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
            }, null, null, null, null,null, {"mRender": order_status},{"mRender": invoice_status}, null,null]
        });
    });

    function order_status(x) {
        if (x == null) {
            return '';
        } else if (x == 'Completed') {
            return '<div class="text-center"><span class="payment_status label label-success">Completed</span></div>';
        } else if (x == 'Pending') {
            return '<div class="text-center"><span class="payment_status label label-danger">Pending</span></div>';
        } else {
            return '<div class="text-center"><span class="payment_status label label-default">None</span></div>';
        }
    }

    function invoice_status(x) {
        if (x == null) {
            return '';
        } else {
            var parser = new DOMParser();
            var htmlDoc = parser.parseFromString(x, 'text/html');
            // var htmlDocDetails = htmlDoc.getAttribute('p');
            console.log(htmlDoc);
            console.log(htmlDoc.getElementsByTagName('p').innerHTML);
            return decodeHTML(x);
        }
    }

    var decodeHTML = function (html) {
        var txt = document.createElement('textarea');
        txt.innerHTML = html;
        return txt.value;
    };
</script>
<?php //if ($Owner) {
echo form_open('hrms/hrms_actions', 'id="action-form"');
//} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-th"></i><?= lang('Invoices'); ?></h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip"
                                                                                  data-placement="left"
                                                                                  title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= site_url('invoices/add'); ?>"><i
                                        class="fa fa-plus-circle"></i> <?= lang("Add"); ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="UsrTable" cellpadding="0" cellspacing="0" border="0"
                           class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="min-width:30px; width: 30px; text-align: center;" class="col-xs-1">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th class="col-xs-1"><?php echo lang('Reference_No'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Customer'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Quantity'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Total_tax'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Total_Amount'); ?></th>
                            <th class="col-xs-1"><?php echo lang('Payment_Status'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Note'); ?></th>
                            <th class="col-xs-2"><?php echo lang('Created_Date'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="9" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">&nbsp;
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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

<?php // } ?>
