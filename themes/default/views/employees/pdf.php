<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->lang->line("purchase") . " " . $inv->reference_no; ?></title>
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

<body>
<div id="wrap">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-file"></i><?= lang("bill_no") . '. ' . $id; ?></h2>

            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (!empty($inv->return_purchase_ref) && $inv->return_id) {
                            echo '<div class="alert alert-info no-print"><p>'.lang("purchase_is_returned").': '.$inv->return_purchase_ref;
                            echo ' <a data-target="#myModal2" data-toggle="modal" href="'.site_url('purchases/modal_view/'.$inv->return_id).'"><i class="fa fa-external-link no-print"></i></a><br>';
                            echo '</p></div>';
                        } ?>
                        <div class="clearfix"></div>
                        <div class="print-only col-xs-12">
                            <img src="<?= base_url() . 'assets/uploads/logos/' . $Settings->logo; ?>"
                                 alt="<?= $Settings->site_name; ?>">
                        </div>
                        <div class="well well-sm" style="border: 1px;color: #000810;">

                            <div class="col-xs-5 border-right" >
                                <!--                        <div class="col-xs-2"><i class="fa fa-3x fa-th"></i></div>-->
                                <div class="col-xs-10">
                                    <h2 class=""><?= $Settings->site_name; ?></h2>
                                    <?php echo '5,Mohakhali C/A' . "<br>";
                                    echo 'Dhaka,Bangladesh' . "<br>";
                                    echo lang("Phone") . ": ".'8802 9882107-08' . "<br>" . ($warehouse->email ? lang("email") . ": " . $warehouse->email : '');
                                    ?>
                                </div>
                            </div>

                            <div class="col-xs-5">

                                <div class="col-xs-1"><i class="fa fa-3x fa-mobile text-muted"></i></div>
                                <div class="col-xs-11">
                                    <h2 class=""><?= $supplier->name; ?></h2>

                                    <?php
                                    echo lang("contact_person") . ": " . $supplier->contact_person . "<br />" . $supplier->address .  "<br />" ;

                                    echo lang("tel") . ": " . $supplier->contact_number . "<br />" ;
                                    ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped print-table order-table">
                                <thead>
                                <tr>
                                    <th><?= lang("no"); ?></th>
                                    <th><?= lang("name");?></th>
                                    <th><?= lang("designation");?></th>
                                    <th><?= lang("package_name");?></th>
                                    <th><?= lang("mobile_no"); ?></th>
                                    <th><?= lang("ceiling_amount"); ?></th>
                                    <th><?= lang("usage_amount"); ?></th>
                                    <th><?= lang("Dues"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $r = 1;
                                $col = 7;
                                $total = 0;
                                $total_dues = 0;
                                $usage = 0;
                                foreach ($rows as $row):
                                    $dues=0;
                                    $dues_amount=($row->ceiling_amount -$row->usage_amount);
                                    if($dues_amount < 0) $dues=abs($dues_amount);

                                    ?>
                                    <tr>
                                        <td style="text-align:center; width:40px; vertical-align:middle;"><?= $r; ?></td>
                                        <td style="vertical-align:middle;"><?= $row->nam; ?></td>
                                        <td style="vertical-align:middle;">  <?= $row->d_name; ?></td>
                                        <td style="vertical-align:middle;">  <?= $row->p_name; ?></td>
                                        <td style="vertical-align:middle;">   <?= $row->mobile_number; ?></td>
                                        <td style="vertical-align:middle;">   <?= $row->ceiling_amount; ?></td>
                                        <td style="vertical-align:middle;">   <?= $row->usage_amount; ?></td>
                                        <td style="vertical-align:right;">    <?= round($row->dues,2); ?></td>
                                    </tr>
                                    <?php
                                    $total = $total + $row->ceiling_amount;
                                    $usage = $usage + $row->usage_amount;
                                    $total_dues = $total_dues + $row->dues;
                                    $r++;
                                endforeach;
                                if ($return_rows) {
                                    echo '<tr class="warning"><td colspan="100%" class="no-border"><strong>'.lang('returned_items').'</strong></td></tr>';
                                    foreach ($return_rows as $row):
                                        ?>
                                        <tr class="warning">
                                            <td style="text-align:center; width:40px; vertical-align:middle;"><?= $r; ?></td>
                                            <td style="vertical-align:middle;">
                                                <?= $row->product_code.' - '.$row->product_name . ($row->variant ? ' (' . $row->variant . ')' : ''); ?>
                                                <?= $row->supplier_part_no ? '<br>'.lang('supplier_part_no').': ' . $row->supplier_part_no : ''; ?>
                                                <?= $row->details ? '<br>' . $row->details : ''; ?>
                                                <?= ($row->expiry && $row->expiry != '0000-00-00') ? '<br>' .lang('expiry').': ' . $this->sma->hrsd($row->expiry) : ''; ?></td>
                                            <td style="width: 120px; text-align:center; vertical-align:middle;"><?= $this->sma->formatQuantity($row->unit_quantity).' '.$row->product_unit_code; ?></td>
                                            <?php
                                            if ($inv->status == 'partial') {
                                                echo '<td style="text-align:center;vertical-align:middle;width:120px;">'.$this->sma->formatQuantity($row->quantity_received).' '.$row->product_unit_code.'</td>';
                                            }
                                            ?>
                                            <td style="text-align:right; width:120px; padding-right:10px;"><?= $this->sma->formatMoney($row->net_unit_cost); ?></td>
                                            <?php
                                            if ($Settings->tax1 && $inv->product_tax > 0) {
                                                echo '<td style="width: 120px; text-align:right; vertical-align:middle;">' . ($row->item_tax != 0 && $row->tax_code? '<small>(' . $row->tax_code . ')</small> ' : '') . $this->sma->formatMoney($row->item_tax) . '</td>';
                                            }
                                            if ($Settings->product_discount != 0 && $inv->product_discount != 0) {
                                                echo '<td style="width: 120px; text-align:right; vertical-align:middle;">' . ($row->discount != 0 ? '<small>('.$row->discount.')</small>' : '') . ' ' . $this->sma->formatMoney($row->item_discount) . '</td>';
                                            }
                                            ?>
                                            <td style="text-align:right; width:120px; padding-right:10px;"><?= $this->sma->formatMoney($row->subtotal); ?></td>
                                        </tr>
                                        <?php
                                        $r++;
                                    endforeach;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="<?= $col; ?>"
                                        style="text-align:right; font-weight:bold;"><?= lang("total_ceiling_amount"); ?>
                                        (<?= $default_currency->code; ?>)
                                    </td>
                                    <td style="text-align:right; padding-right:10px; font-weight:bold;">
                                        <?= $this->sma->formatMoney($total); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?= $col; ?>"
                                        style="text-align:right; font-weight:bold;"><?= lang("total_usage_amount"); ?>
                                        (<?= $default_currency->code; ?>)
                                    </td>
                                    <td style="text-align:right; font-weight:bold;">
                                        <?= $this->sma->formatMoney($usage); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="<?= $col; ?>"
                                        style="text-align:right; font-weight:bold;"><?= lang("total_dues_amount"); ?>
                                        (<?= $default_currency->code; ?>)
                                    </td>
                                    <td style="text-align:right; font-weight:bold;">
                                        <?= $this->sma->formatMoney($total_dues); ?>
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
</body>
</html>