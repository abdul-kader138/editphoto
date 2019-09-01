<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

$v = "";
if ($this->input->post('sel_customer_id')) {
    $v .= "&customer_id=" . $this->input->post('sel_customer_id');
}
if ($this->input->post('due_date')) {
    $v .= "&due_date=" . $this->input->post('due_date');
}
?>
    <script>
        $(document).ready(function () {

            function createQtyField(x) {
                return '<input type="number" class="form-control" required="required" name="qty[]"  id="qty_"/>'
            }

            function createRateField(x) {
                return '<input type="number" class="form-control"  required="required" name="rate[]" id="rate_"/>'
            }

            function createTaxField(x) {
                return '<input type="number" class="form-control"  required="required" name="tax[]" id="tax_"/>'
            }


            $("#sel_customer_id").change(function () {
                $('#customer_id').val($('#sel_customer_id').val());
            });
            $("#due_date").change(function () {
                $('#sel_due_date').val($('#due_date').val());
            });

            $('#customer_id').val($('#sel_customer_id').val());
            $('#sel_due_date').val($('#due_date').val());

            oTable = $('#SlRData').dataTable({
                "aaSorting": [[0, "desc"]],
                "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                "iDisplayLength": <?= $Settings->rows_per_page ?>,
                'bProcessing': true, 'bServerSide': true,
                'sAjaxSource': '<?= admin_url('invoices/getinvoicesgroups/?v=1' . $v) ?>',
                'fnServerData': function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "<?= $this->security->get_csrf_token_name() ?>",
                        "value": "<?= $this->security->get_csrf_hash() ?>"
                    });
                    $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
                },
                'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                },
                "aoColumns": [{
                    "bSortable": false,
                    "mRender": checkbox
                }, null, null,  {"mRender": createRateField}, {"mRender": createTaxField},{"mRender": createQtyField}],
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                }
            }).fnSetFilteringDelay().dtFilter([], "footer");



        });
    </script>
    <div class="box">
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <?php echo admin_form_open("invoices/invoices_group"); ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= lang("Biller", "Biller"); ?>
                                    <?php
                                    $gp[''] = 'Please Select Biller';
                                    foreach ($users as $usr) {
                                        $gp[$usr->id] = $usr->first_name . " " . $usr->last_name;
                                    }
                                    echo form_dropdown('sel_customer_id', $gp, (isset($_POST['sel_customer_id']) ? $_POST['sel_customer_id'] : ''), 'id="sel_customer_id" required="required" class="form-control select" style="width:100%;"');
                                    ?>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?= lang("Due_Date", "Due_Date"); ?>
                                    <?php echo form_input('due_date', (isset($_POST['due_date']) ? $_POST['due_date'] : ""), 'class="form-control date" required="required" readonly id="due_date"'); ?>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div style="margin-bottom: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <?php echo form_submit('submit', $this->lang->line("Load_Invoice_Item"), 'class="form-control btn btn-primary"'); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo admin_form_open('invoices/add', 'id="action-form"'); ?>
                    <div class="table-responsive">
                        <table id="SlRData"
                               class="table table-bordered table-hover table-striped table-condensed reports-table">
                            <thead>
                            <tr>
                                <th style="min-width:3px; width: 5px; text-align: center;">
                                    <input class="checkbox checkft" type="checkbox" name="check"/>
                                </th>
                                <th style="min-width:20px; width: 200px;"><?= lang("Document_Title"); ?></th>
                                <th style="min-width:20px; width: 500px;"><?= lang("Description"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Rate"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Tax_(%)"); ?></th>
                                <th style="min-width:20px; width: 100px;"><?= lang("Qty"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="6" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                            </tr>
                            </tbody>
                            <tfoot class="dtFilter">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <input type="hidden" name="form_action" value="add" id="form_action"/>
                <input type="hidden" value="<?php echo $due_date; ?>" name="sel_due_date" id="sel_due_date"/>
                <input type="hidden" value="<?php echo $id; ?>" name="customer_id" id="customer_id"/>
                <?= form_submit('submit', 'Generate Invoice', ' class="btn btn-primary" id="action-form-submit"') ?>
            </div>
        </div>
    </div>
<?= form_close() ?>