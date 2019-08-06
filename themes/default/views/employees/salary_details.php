<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-file"></i><?= lang("reference_no") . '. ' . $id; ?></h2>

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
                <div class="well well-sm" style="border-style: solid;background-color: #9faab7;">

                    <div class="col-xs-5 ">
                        <!--                        <div class="col-xs-2"><i class="fa fa-3x fa-th"></i></div>-->
                        <div class="col-xs-10">
                            <h2 class=""><?= $Settings->site_name; ?></h2>
                            <?= $warehouse->name ?>

                            <?php
                            echo $warehouse->address . "<br>";
                            echo ($warehouse->phone ? lang("tel") . ": " . $warehouse->phone . "<br>" : '') . ($warehouse->email ? lang("email") . ": " . $warehouse->email : '');
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped print-table order-table">
                        <thead>
                        <tr>
                            <th><?= lang("no"); ?></th>
                            <th><?= lang("employee_id");?></th>
                            <th><?= lang("name");?></th>
                            <th><?= lang("company");?></th>
                            <th><?= lang("Salary_Amount");?></th>
                            <th><?= lang("Absent_Deduction"); ?></th>
                            <th><?= lang("Holiday_allowance"); ?></th>
                            <th><?= lang("Total_Amount"); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $r = 1;
                        $col = 7;
                        $total = 0;
                        $dues = 0;
                        $usage = 0;
                        foreach ($rows as $row):
                            $row_dues=0;
//                            /if( $row->usage_amount > $row->ceiling_amount ) $row_dues= abs( $row->ceiling_amount -$row->usage_amount);
                            ?>
                            <tr>
                                <td style="text-align:center; width:40px; vertical-align:middle;"><?= $r; ?></td>
                                <td style="vertical-align:middle;"><?= $row->employee_id; ?></td>
                                <td style="vertical-align:middle;"><?= $row->nam; ?></td>
                                <td style="vertical-align:middle;"><?= $row->c_name; ?></td>
                                <td style="vertical-align:middle;">   <?= $row->payment_other; ?></td>
                                <td style="vertical-align:middle;">   <?= round($row->payment_other_absent_deduction,2); ?></td>
                                <td style="vertical-align:middle;">   <?= round($row->payment_other_holiday_allowance,2); ?></td>
                                <td style="vertical-align:right;">    <?= round(($row->payment_other+round($row->payment_other_holiday_allowance,2) -round($row->payment_other_absent_deduction,2)),2); ?></td>
                            </tr>
                            <?php
                            $total = $total + $row->payment_other;
                            $usage = $usage + $row->usage_amount;
                            $dues = $dues +round(($row->payment_other+round($row->payment_other_holiday_allowance,2) -round($row->payment_other_absent_deduction,2)),2);
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
                                style="text-align:right; font-weight:bold;"><?= lang("Grand_Total"); ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            <td style="text-align:right; font-weight:bold;">
                                <?= $this->sma->formatMoney($dues); ?>
                            </td>
                        </tr>

                        </tfoot>
                    </table>

                </div>

                <div class="row">
                    <div class="col-xs-7">
                        <?php if ($inv->note || $inv->note != "") { ?>
                            <div class="well well-sm">
                                <p class="bold"><?= lang("note"); ?>:</p>

                                <div><?= $this->sma->decode_html($inv->note); ?></div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </div>


        <?php if (!$Supplier || !$Customer) { ?>
        <div class="buttons">
            <div class="btn-group">
                <a href="<?= site_url('employees/salary_details_pdf/' . $id) ?>" class="tip btn btn-primary" title="<?= lang('download_pdf') ?>">
                    <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs"><?= lang('pdf') ?></span>
                </a>
            </div>
            <div class="btn-group">
                <a href="<?= site_url('employees/xls/' . $id) ?>" class="tip btn btn-success" title="<?= lang('download_xls') ?>">
                    <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs">XLS For Payroll</span>
                </a>
            </div>
            <div class="btn-group">
                <a href="<?= site_url('employees/xls_all/' . $id) ?>" class="tip btn btn-success" title="<?= lang('download_xls') ?>">
                    <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs">XLS For All</span>
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div>
