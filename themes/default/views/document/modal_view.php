<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-2x">&times;</i>
            </button>
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
            <h2 class="modal-title" id="myModalLabel" style="color: #00A0C6; text-align:center">Document Details Of <?= $document->name; ?></h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped ">
                            <tbody>
                            <tr>
                                <td style="width: 30%"><b><?= lang("name"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->name; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("reference_no"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->reference_no ?></td>
                            </tr>

                            <tr>
                                <td style="width: 30%"><b><?= lang("Address"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->address;?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("Agreement_Start_Date"); ?>:</b></td>
                                <td style="width: 70%"><?= $this->sma->hrld_date($document->agreement_start_date);?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("Agreement_Expire_Date"); ?>:</b></td>
                                <td style="width: 70%"><?= $this->sma->hrld_date($document->agreement_expire_date);?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("Year"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->year; ?></td>
                            </tr>

                            <tr>
                                <td style="width: 30%"><b><?= lang("Instrument"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->instrument; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("Instrument_No"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->instrument_no; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 35%"><b><?= lang("Bank_Name"); ?>:</b></td>
                                <td style="width: 65%"><?= $bank->name; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 35%"><b><?= lang("Credit_Limit"); ?>:</b></td>
                                <td style="width: 65%"><?= $document->credit_limit; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">
                            <tbody>
                            <tr>
                                <td style="width: 30%"><b><?= lang("Commission_Type"); ?>:</b></td>
                                <td style="width: 70%"><?=$commission->name; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%" ><b><?= lang("Target_Qty_(TON)"); ?>:</b></td>
                                <td style="width: 70%" ><?= $document->target_qty; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("1st_Target"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->c1_target; ?></td>
                            </tr>
                            <tr>
                                <td ><b><?= lang("1st_Target_Commission"); ?>:</b></td>
                                <td ><?= $document->c1_target_commission;?></td>
                            </tr>
                            <tr>
                                <td style="width: 30%"><b><?= lang("2st_Target"); ?>:</b></td>
                                <td style="width: 70%"><?= $document->c2_target; ?></td>
                            </tr>
                            <tr>
                                <td ><b><?= lang("2st_Target_Commission"); ?>:</b></td>
                                <td ><?= $document->c2_target_commission;?></td>
                            </tr>
                            <tr>
                                <td style="width: 35%"><b><?= lang("Branch_Name"); ?>:</b></td>
                                <td style="width: 65%"><?= $document->instrument_branch; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 35%"><b><?= lang("Total_Cheque"); ?>:</b></td>
                                <td style="width: 65%"><?= $document->total_cheque; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 35%"><b><?= lang("Status"); ?>:</b></td>
                                <td style="width: 65%"><?= $document->status; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="clearfix"></div>
                <?php if($document->bank_name){ ?>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <th colspan="2">Mortgage Information</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>Bank Name</b></td>
                                <td><?= $document->bank_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Branch Name</b></td>
                                <td><?= $document->branch_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Additional Info</b></td>
                                <td><?= $document->bank_info;?></td>
                            </tr>
                            </tbody>
                        </table></div>
                </div>
                <div class="clearfix"></div>
                <?php }?>
                <?php if($document->other_info){ ?>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <th>Other Information</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $document->other_info;?></td>
                            </tr>
                            </tbody>
                        </table></div>
                </div>
                <div class="clearfix"></div>
                <?php }?>

                <div class="col-xs-12">

                    <?= $product->details ? '<div class="panel panel-success"><div class="panel-heading">' . lang('product_details_for_invoice') . '</div><div class="panel-body">' . $product->details . '</div></div>' : ''; ?>
                    <?= $product->product_details ? '<div class="panel panel-primary"><div class="panel-heading">' . lang('product_details') . '</div><div class="panel-body">' . $product->product_details . '</div></div>' : ''; ?>

                </div>
            </div>
                <div class="buttons">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="<?= site_url('document/edit/' . $document->id) ?>" class="tip btn btn-warning tip" title="<?= lang('Edit_Document') ?>">
                                <i class="fa fa-edit"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete_Document") ?></b>"
                               data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('document/delete/' . $document->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                               data-html="true" data-placement="top">
                                <i class="fa fa-trash-o"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.tip').tooltip();
                    });
                </script>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.change_img').click(function(event) {
            event.preventDefault();
            var img_src = $(this).attr('href');
            $('#pr-image').attr('src', img_src);
            return false;
        });
    });
</script>
