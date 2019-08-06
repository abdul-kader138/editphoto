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
            <h2 class="modal-title" id="myModalLabel" style="color: #00A0C6; text-align:center">Correction Request Details- <?= $document->reference_no; ?></h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped ">
                                <tbody>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Company"); ?>:</b></td>
                                    <td style="width: 70%"><?= $companies->name; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Category"); ?>:</b></td>
                                    <td style="width: 70%"><?= $dcotype->name; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Title"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->name; ?></td>
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
                                    <td style="width: 30%"><b><?= lang("Type"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->type;?></td>
                                </tr>
                                <?php if($document->doc_url){?>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Attachment"); ?>:</b></td>

                                    <td style="width: 70%"><a href="<?= $document->doc_url?>" download>
                                            <?= $document->attachment_name?></a></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Status"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->status;?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php if($document->description){ ?>
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <th style="text-align: center;font-weight: bold;">Description</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="2"><?= $document->description;?></td>
                                </tr>
                                </tbody>
                            </table></div>
                    </div>
                    <div class="clearfix"></div>
                <?php }?>

                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                            <tr>
                                <?php for($i = 0, $l = count($footer); $i < $l; ++$i){
                                    $divi=((12/$l)*20);
                                    ?>
                                    <td><div>
                                            <p>&nbsp;</p>
                                            <p><?php echo ((!empty($footer[$i]['username'])) ? ucwords($footer[$i]['username']).'</br>'. $this->sma->hrsd($footer[$i]['created_date']): "-------------".'</br>');?></p>
                                            <p style="border-top: 1px solid #000;"><?php echo $footer[$i]['approver_type']?></p>
                                        </div></td>
                                    <td colspan="<?php echo $divi; ?>">&nbsp;&nbsp;&nbsp;</td>
                                <?php }?>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="<?= site_url('correction_request/pdf/' . $document->id) ?>" class="tip btn btn-info" title="<?= lang('pdf') ?>">
                            <i class="fa fa-download"></i>
                            <span class="hidden-sm hidden-xs"><?= lang('pdf') ?></span>
                        </a>
                    </div>
                    <?php if($this->Owner || $this->Admin || $GP['correction_request-edit']) { ?>
                        <div class="btn-group">
                        <a href="<?= site_url('correction_request/edit/' . $document->id) ?>" class="tip btn btn-warning tip" title="<?= lang('Edit') ?>">
                            <i class="fa fa-edit"></i>
                            <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                        </a>
                        </div><?php }?>
                    <?php if($this->Owner || $this->Admin || $GP['correction_request-delete']) { ?>
                        <div class="btn-group">
                        <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete") ?></b>"
                           data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('correction_request/delete/' . $document->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                           data-html="true" data-placement="top">
                            <i class="fa fa-trash-o"></i>
                            <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                        </a>
                        </div><?php }?>
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
