<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg" xmlns="http://www.w3.org/1999/html">
    <div class="modal-content">
        <div class="modal-header"  style="border-bottom: 1px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-2x">&times;</i>
            </button>
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;"
                    onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('Print'); ?>
            </button>
            <div class="clearfix">&nbsp;</div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="box">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="clearfix"></div>
                                <div class="well well-sm" style="border: 1px;color: #000810;">
                                    <div class="col-xs-5 border-right">
                                        <img width="120px" height="100px"
                                             src="<?= base_url() . 'assets/uploads/logos/' . $Settings->logo; ?>"
                                             alt="<?= $Settings->site_name; ?>">
                                        <div class="col-xs-10">
                                            <h3 class=""><b><?php echo $Settings->site_name; ?></h3></b>
                                            <p><?= $Settings->address; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-5">

                                        <div class="col-xs-1"><i class="fa fa-3x fa-user-plus text-muted"></i></div>
                                        <div class="col-xs-11">
                                            <h2>Customer : <?php echo $inv[0]->customer_name; ?></h2>
                                            <?php echo lang("Email") . ": " . $users->email . "<br />" . lang("Phone"). ": " . $users->phone . "<br />"; ?>
                                            <span>Payment Status : <b><?php echo $inv[0]->payment_status; ?></b></span>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-xs-3">
                                    <b><?= lang("Submitted_Date"); ?>
                                        : <?= $this->sma->hrsd($inv[0]->order_date); ?></b></div>
                                <div class="col-xs-3"><b><?= lang("Payable_To"); ?>
                                        : <?= $Settings->default_email; ?></b></div>
                                <div class="col-xs-3"><b><?= lang("Invoice_No"); ?>
                                        : <?= $inv[0]->reference_no; ?></b></div>
                                <div class="col-xs-3"><b><?= lang("Due_Date"); ?>
                                        : <?= $this->sma->hrsd($inv[0]->due_date); ?></b></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped print-table order-table">
                                        <thead>
                                        <tr>
                                            <th><?= lang("SL"); ?></th>
                                            <th><?= lang("Folder_Info"); ?></th>
                                            <th><?= lang("Service_Type"); ?></th>
                                            <th><?= lang("Complexity_Type"); ?></th>
                                            <th><?= lang("Add_Ons"); ?></th>
                                            <th><?= lang("Delivery_Format"); ?></th>
                                            <th><?= lang("Delivery_Time_Cost"); ?></th>
                                            <th><?= lang("Rate"); ?></th>
                                            <th><?= lang("Quantity"); ?></th>
<!--                                            <th>--><?//= lang("Total_Tax"); ?><!--</th>-->
                                            <th><?= lang("Total_val"); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $r = 1;
                                        $col = 9;
                                        $total = 0;
                                        $gt_amount = 0;
                                        $gt_qty = 0;
                                        $tax_amount = 0;
                                        foreach ($inv as $row):?>
                                            <tr>
                                                <td
                                                    style="text-align:center; vertical-align:middle;"><?= $r; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;"><?= $row->folder_info; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;"><?= $row->service_name; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">  <?= $row->complexity_name . ' - ' . $row->complexity_price . ' @ ' . $row->complexity_val; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->addOns_name . ' - ' . $row->addOns_price . ' @ ' . $row->addOns_val; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">  <?= $row->deliveryFormat_name; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->deliveryCost_name . ' - ' . $row->deliveryCost_price . ' @ ' . $row->deliveryCost_val; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->rate; ?></td>
                                                <td
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->qty; ?></td>
<!--                                                <td-->
<!--                                                    style="text-align:center; vertical-align:middle;">   --><?//= $row->total_tax . "(" . $row->tax . " %)"; ?><!--</td>-->
                                                <td
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->total_val; ?></td>
                                            </tr>
                                            <?php
                                            $total = $total + $row->total_val;
                                            $usage = $usage + $row->qty;
                                            $tax_amount = $tax_amount + $row->total_tax;
                                            $gt_amount = ($row->total_val+$row->total_tax);
                                            $gt_qty = $gt_qty+$row->qty;
                                            $r++;
                                        endforeach;

                                        $btn_code = '<div id="payment_buttons" class="text-center margin010">';
                                        $btn_code .= '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=' . $users->email . '&item_name=' . $inv[0]->reference_no . '&item_number=' . $gt_qty . '&image_url=' . base_url() . 'assets/uploads/logos/' . $this->Settings->logo . '&amount=' .$gt_amount . '&no_shipping=1&no_note=1&currency_code=USD&bn=FC-BuyNow&rm=2&return=' . site_url('invoices') . '&cancel_return=' . site_url('invoices') . '&notify_url=' . site_url('payments/paypalipn') . '&custom=' . $ref_no . '__' . $gt_amount. '"><img src="' . base_url('assets/images/btn-paypal.png') . '" alt="Pay by PayPal"></a> ';
                                        $btn_code .= '<div class="clearfix"></div></div>';
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="<?= $col; ?>"
                                                style="text-align:right; font-weight:bold;"><?= lang("Total_Quantity"); ?>
                                            </td>
                                            <td style="text-align:right; padding-right:10px; font-weight:bold;">
                                                <?= $this->sma->formatMoney($usage); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="<?= $col; ?>"
                                                style="text-align:right; font-weight:bold;"><?= lang("Total_Amount"); ?>
                                                (<?= $Settings->symbol ?>)
                                            </td>
                                            <td style="text-align:right; font-weight:bold;">
                                                <?= $this->sma->formatMoney($total); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="<?= $col; ?>"
                                                style="text-align:right; font-weight:bold;"><?= lang("Tax"); ?>
                                                (<?= $Settings->symbol ?>)
                                            </td>
                                            <td style="text-align:right; font-weight:bold;">
                                                <?= $this->sma->formatMoney($tax_amount); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="<?= $col; ?>"
                                                style="text-align:right; font-weight:bold;"><?= lang("Grand_Total"); ?>
                                                (<?= $Settings->symbol ?>)
                                            </td>
                                            <td style="text-align:right; font-weight:bold;">
                                                <?= $this->sma->formatMoney($total + $tax_amount); ?>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="buttons">
                <div class="btn-group btn-group-justified">
                    <div class="col-sm-3 btn-group">
                        <a href="<?= site_url('invoices/pdf/' . $inv[0]->reference_no) ?>" class="tip btn btn-success"
                           title="<?= lang('Download_PDF') ?>">
                            <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs"><?= lang('PDF') ?></span>
                        </a>
                    </div>
                </div>
                <?php
                if($inv[0]->payment_status =='Pending') echo $btn_code;?>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.tip').tooltip();
                });
            </script>
        </div>
    </div>
</div>
