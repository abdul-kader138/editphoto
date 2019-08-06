<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->lang->line("company_bill_report"); ?><br/>
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
                <h2 class="blue" style="text-align: center"><i class="fa-fw fa fa-file"></i><?= lang("Mobile Bill For : ").(($supplier->name) ? $supplier->name : "All Company"); ?></h2>
                <h3 class="blue" style="text-align: center"><i class="fa-fw fa fa-file"></i><?= lang("For The Month Of ").(($month) ? $month : "").",".(($year) ? $year : ""); ?></h3>

            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped print-table order-table">
                                <thead>
                                <tr>
                                    <th><?= lang("SL"); ?></th>
                                    <th><?= lang("company"); ?></th>
                                    <th><?= lang("ceiling_amount"); ?></th>
                                    <th><?= lang("usage_amount"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $r = 1;
                                $col = 3;
                                $total = 0;
                                $total_dues = 0;
                                $usage = 0;
                                foreach ($rows as $row):

                                    ?>
                                    <tr>
                                        <td style="text-align:center; width:40px; vertical-align:middle;"><?= $r; ?></td>
                                        <td style="text-align:Left;"><?= $row->c_name; ?></td>
                                        <td style="text-align:right;">   <?= $row->camt; ?></td>
                                        <td style="text-align:right">   <?= $row->uamt; ?></td>
                                    </tr>
                                    <?php
                                    $total = $total + $row->camt;
                                    $usage = $usage + $row->uamt;
                                    $r++;
                                endforeach;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="<?= $col; ?>"
                                        style="text-align:right; font-weight:bold;"><?= lang("total_ceiling_amount"); ?>
                                        (<?= $default_currency->code; ?>)
                                    </td>
                                    <td style="text-align:right; font-weight:bold;">
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