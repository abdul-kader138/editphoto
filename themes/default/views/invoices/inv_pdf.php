<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->lang->line("Invoices") . " " . $inv[0]->reference_no; ?></title>
    <link href="<?php echo $assets ?>styles/style.css" rel="stylesheet">
    <style type="text/css">
        html, body {
            height: 100%;
            background: #FFF;
        }
        body:before, body:after {
            display: none !important;
        }
        .table th {
            text-align: center;
            padding: 5px;
        }
        .table td {
            padding: 4px;
        }

        table.table-bordered{
            border:1px solid #000000;
            margin-top:20px;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid #000000;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid #000000;
        }
    </style>
</head>

<body><?php if ($Settings->logo) {
    $path = base_url() . 'assets/uploads/logos/' . $Settings->logo;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <div class="text-center" style="margin-bottom:10px;margin-top: 0px;">
        <img width="120px" height="100px" src="<?= $base64; ?>" alt="<?= $Settings->site_name; ?>">
    </div>
<?php }
?>
<div id="wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="padding12">
                <div class="col-xs-5" style="font-size: 11px;">
                    <?php echo $this->lang->line("To"); ?>:
                    <div><i class="fa fa-3x fa-user-plus text-muted"></i></div>
                    <h3><b>Customer : <?php echo $inv[0]->customer_name; ?><b></h3>
                    <?php echo lang("Email") . ": " . $users->email . "<br />" . lang("Phone") . $users->phone . "<br />"; ?>
                    <span>Payment Status : <b><?php echo $inv[0]->payment_status; ?></b></span>
                </div>

                <div class="col-xs-5 pull-right" style="font-size: 11px;" >
                    <?php echo $this->lang->line("From"); ?>:
                    <h3><b><?php echo $Settings->site_name; ?></b></h3>
                    <?= $Settings->address; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="padding10">
                <div class="col-xs-5" style="font-size: 11px;">
                    <div class="bold">
                        <b><?= lang("Submitted_Date"); ?>
                            : <?= $this->sma->hrsd($inv[0]->order_date); ?></b>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-xs-5 pull-right" style="font-size: 11px;">
                    <div class="bold">
                        <b><?= lang("Payable_To"); ?>
                            : <?= $Settings->default_email; ?></b>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-5" style="font-size: 11px;">
                    <div class="bold">
                        <b><?= lang("Invoice_No"); ?>
                            : <?= $inv[0]->reference_no; ?></b>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-5 pull-right" style="font-size: 11px;">
                    <div class="bold">
                        <b><?= lang("Invoice_No"); ?>
                            :  <?= $this->sma->hrsd($inv[0]->due_date); ?></b>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-xs-12" style="margin-top: 15px;">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped print-table order-table">
                        <thead>
                        <tr>
                            <th><?= lang("SL"); ?></th>
                            <th><?= lang("Service_Type"); ?></th>
                            <th><?= lang("Complexity_Type"); ?></th>
                            <th><?= lang("Add_Ons"); ?></th>
                            <th><?= lang("Delivery_Format"); ?></th>
                            <th><?= lang("Delivery_Time_Cost"); ?></th>
                            <th><?= lang("Rate"); ?></th>
                            <th><?= lang("Quantity"); ?></th>
                            <th><?= lang("Total_Tax"); ?></th>
                            <th><?= lang("Total_val"); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $r = 1;
                        $col = 9;
                        $total = 0;
                        $total_dues = 0;
                        $usage = 0;
                        $tax_amount = 0;
                        foreach ($inv as $row):?>
                            <tr>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;"><?= $r; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;"><?= $row->service_name; ?></td>
                                <td class="col-xs-2"
                                    style="text-align:center; vertical-align:middle;">  <?= $row->complexity_name . ' - ' . $row->complexity_price . ' @ ' . $row->complexity_val; ?></td>
                                <td class="col-xs-2"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->addOns_name . ' - ' . $row->addOns_price . ' @ ' . $row->addOns_val; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">  <?= $row->deliveryFormat_name; ?></td>
                                <td class="col-xs-2"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->deliveryCost_name . ' - ' . $row->deliveryCost_price . ' @ ' . $row->deliveryCost_val; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->rate; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->qty; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->total_tax . "(" . $row->tax . " %)"; ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->total_val; ?></td>
                            </tr>
                            <?php
                            $total = $total + $row->total_val;
                            $usage = $usage + $row->qty;
                            $tax_amount = $tax_amount + $row->total_tax;
                            $r++;
                        endforeach;
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
            <div class="clearfix"></div>

        </div>
    </div>
</div>
</body>
</html>
