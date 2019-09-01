<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('Invoice'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">Please click on <i
                            class="fa fa-plus-circle"
                            style="opacity:0.5; filter:alpha(opacity=50);"></i> symbol add invoice items </p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'id' => 'addMeal', 'name' => 'addMeal', 'role' => 'form');
                echo form_open("invoices/add", $attrib)
                ?>
                <div class="row">
                    <div class="col-lg-12" id="sticker">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?= lang("Customer_Name", "Customer_Name") . "<b> *</b>"; ?>
                                    <?php
                                    $cat[''] = lang('select') . ' ' . lang('Customer_Name');
                                    foreach ($users as $user) {
                                        $cat[$user->id] = $user->first_name . " " . $user->last_name;
                                    }
                                    echo form_dropdown('customer_id', $cat, (isset($_POST['customer_id']) ? $_POST['customer_id'] : ''), 'class="form-control select" required="required" id="customer_id" style="width:100%"')
                                    ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?= lang("Due_Date", "Due_Date"); ?>
                                    <?php echo form_input('due_date', (isset($_POST['due_date']) ? $_POST['due_date'] : ""), 'class="form-control date" required="required" readonly id="due_date"'); ?>
                                </div>
                            </div>

                            <div class="clearfix">&nbsp;</div>
                            <div class="control-group table-group">
                                <label class="table-label"><?= lang("Invoices_Items"); ?> *</label>

                                <div class="controls table-controls">
                                    <table id="quTable"
                                           class="table items table-striped table-bordered table-condensed table-hover sortable_table">
                                        <thead>
                                        <tr>
                                            <th><?= lang("Date"); ?></th>
                                            <th><?= lang("Folder_Info"); ?></th>
                                            <th><?= lang("Service_Type"); ?></th>
                                            <th><?= lang("Complexity_Type"); ?></th>
                                            <th><?= lang("Add_Ons"); ?></th>
                                            <th><?= lang("Delivery_Format"); ?></th>
                                            <th><?= lang("Delivery_Time_cost"); ?></th>
                                            <th><?= lang("Price"); ?></th>
                                            <th><?= lang("quantity"); ?></th>
                                            <th
                                                    style="width: 15px !important; text-align: center; cursor: pointer;" id="addCF"><i
                                                        class="fa fa-plus-circle"
                                                        style="opacity:0.5; filter:alpha(opacity=50);"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="total_items" value="" id="total_items" required="required"/>

                        <div class="row" id="bt">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <?= lang("note", "qunote"); ?>
                                        <?php echo form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ""), 'class="form-control" id="qunote" style="margin-top: 10px; height: 100px;"'); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div
                                    class="fprom-group"><?php echo form_button('add_quote', $this->lang->line("submit"), 'id="add_quote" class="btn btn-primary" style="padding: 6px 15px; margin:15px 0;"'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var isinValidRow = false;
        $("#addCF").click(function () {
            rowCount = $('#quTable tr').length;

            // only can add if provide all info of current data
            if (rowCount != 0) {
                $(".datelist").each(function () {
                    var ids = this.id;
                    var idVal = $('#' + ids).val();
                    var service_ids = ids.split("_");
                    var service_id = $('#sel_service_id_' + service_ids[2]).val();
                    var qty_id = $('#qty_id_' + service_ids[2]).val();
                    var ord_price = $('#ord_price_' + service_ids[2]).val();

                    var complexity_ids = ids.split("_");
                    var complexity_id = $('#sel_complexity_id_' + complexity_ids[2]).val();

                    var folder_ids = ids.split("_");
                    var folder_id = $('#folder_info_' + folder_ids[2]).val();

                    var addOns_ids = ids.split("_");
                    var addOns_id = $('#sel_addOns_id_' + addOns_ids[2]).val();

                    var deliveryFormat_ids = ids.split("_");
                    var deliveryFormat_id = $('#sel_deliveryFormat_id_' + deliveryFormat_ids[2]).val();

                    var deliveryCost_ids = ids.split("_");
                    var deliveryCost_id = $('#sel_deliveryCost_id_' + deliveryCost_ids[2]).val();

                    isinValidRow = false;
                    if (idVal == undefined || idVal == null || idVal == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank date information first'
                        });
                        isinValidRow = true;
                    }

                    if (folder_id == undefined || folder_id == null || folder_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank folder information first'
                        });
                        isinValidRow = true;
                    }

                    if (addOns_id == undefined || addOns_id == null || addOns_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank add ons information first'
                        });
                        isinValidRow = true;
                    }
                    if (deliveryFormat_id == undefined || deliveryFormat_id == null || deliveryFormat_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank delivery format information first'
                        });
                        isinValidRow = true;
                    }

                    if (deliveryCost_id == undefined || deliveryCost_id == null || deliveryCost_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank delivery time cost information first'
                        });
                        isinValidRow = true;
                    }
                    if (complexity_id == undefined || complexity_id == null || complexity_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank complexity type information first'
                        });
                        isinValidRow = true;
                    }

                    if (service_id == undefined || service_id == null || service_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank service type information first'
                        });
                        isinValidRow = true;
                    }

                    if (qty_id == undefined || qty_id == null || qty_id == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank qty information first'
                        });
                        isinValidRow = true;
                    }

                    if (ord_price == undefined || ord_price == null || ord_price == '') {
                        iziToast.show({
                            title: 'Warning:',
                            color: 'yellow',
                            progressBar: true,
                            message: 'Please fill the blank price information first'
                        });
                        isinValidRow = true;
                    }
                });

                if (isinValidRow == false) {
                    if (rowCount <= 30) {
                        var row_id = 0;
                        if (!localStorage.getItem('row_id')) localStorage.setItem('row_id', 1);
                        else {
                            row_id = localStorage.getItem('row_id');
                            row_id = (parseInt(row_id) + 1);
                            localStorage.setItem('row_id', row_id)
                        }
                        $("#quTable").append('<tr><td><input class="form-control datelist input-tip date" readonly type="text" name="orderDate[]" value="" placeholder="Select date" onchange="setAllParamsList(this)" id="row_id_' + row_id + '"/></td><td><input class="form-control input-tip" name="folder_info[]"   type="text" id="folder_info_' + row_id + '"/></td><td id="service_id_' + row_id + '"></td><td id="complexity_id_' + row_id + '"></td><td  id="addOns_id_' + row_id + '"></td><td  id="deliveryFormat_id_' + row_id + '"></td><td id="deliveryCost_id_' + row_id + '"></td><td><input class="form-control input-tip" name="ord_price[]" value="1"  type="number" step="any" id="ord_price_' + row_id + '"/></td><td><input class="form-control input-tip" name="menu_quantity[]" value="1"  type="number" id="qty_id_' + row_id + '"/></td><td width="10%" style="text-align: center;"><a href="javascript:void(0);" class="remCF"><i class="fa fa-trash-o"></i></a></td></tr>');
                    }
                }
            }
        });

        $("#quTable").on('click', '.remCF', function () {
            $(this).parent().parent().remove();
        });

        $("#add_quote").click(function () {
            var isinValidRows = false;
            $(".datelist").each(function () {
                var ids = this.id;
                var idVal = $('#' + ids).val();
                var menu_ids = ids.split("_");
                var service_ids = ids.split("_");
                var service_id = $('#sel_service_id_' + service_ids[2]).val();
                var qty_id = $('#qty_id_' + service_ids[2]).val();
                var ord_price = $('#ord_price_' + service_ids[2]).val();

                var folder_ids = ids.split("_");
                var folder_id = $('#folder_info_' + folder_ids[2]).val();

                var complexity_ids = ids.split("_");
                var complexity_id = $('#sel_complexity_id_' + complexity_ids[2]).val();

                var addOns_ids = ids.split("_");
                var addOns_id = $('#sel_addOns_id_' + addOns_ids[2]).val();

                var deliveryFormat_ids = ids.split("_");
                var deliveryFormat_id = $('#sel_deliveryFormat_id_' + deliveryFormat_ids[2]).val();

                var deliveryCost_ids = ids.split("_");
                var deliveryCost_id = $('#sel_deliveryCost_id_' + deliveryCost_ids[2]).val();

                isinValidRows = false;
                if (idVal == undefined || idVal == null || idVal == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank date information first'
                    });
                    isinValidRows = true;
                }

                if (folder_id == undefined || folder_id == null || folder_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank folder information first'
                    });
                    isinValidRow = true;
                }

                if (addOns_id == undefined || addOns_id == null || addOns_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank add ons information first'
                    });
                    isinValidRow = true;
                }
                if (deliveryFormat_id == undefined || deliveryFormat_id == null || deliveryFormat_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank delivery format information first'
                    });
                    isinValidRow = true;
                }

                if (deliveryCost_id == undefined || deliveryCost_id == null || deliveryCost_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank delivery time cost information first'
                    });
                    isinValidRow = true;
                }
                if (complexity_id == undefined || complexity_id == null || complexity_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank complexity type information first'
                    });
                    isinValidRow = true;
                }

                if (service_id == undefined || service_id == null || service_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank service type information first'
                    });
                    isinValidRow = true;
                }


                if (qty_id == undefined || qty_id == null || qty_id == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank qty information first'
                    });
                    isinValidRows = true;
                }
                if (ord_price == undefined || ord_price == null || ord_price == '') {
                    iziToast.show({
                        title: 'Warning:',
                        color: 'yellow',
                        progressBar: true,
                        message: 'Please fill the blank price information first'
                    });
                    isinValidRow = true;
                }
            });

            var rowCounts = $('#quTable tr').length;
            if (rowCounts == 1 || rowCounts == null || rowCounts == undefined) {
                iziToast.show({
                    title: 'Warning:',
                    color: 'yellow',
                    progressBar: true,
                    message: 'Please click on <i class="fa fa-plus-circle" style="opacity:0.5; filter:alpha(opacity=50);"></i> symbol to add invoice items'
                });
                isinValidRows = true;
            }
            if (isinValidRows == false) $('#addMeal')[0].submit();
        });
    });
</script>