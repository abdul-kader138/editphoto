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
            <h2 class="modal-title" id="myModalLabel" style="color: #00A0C6; text-align:center">Recruitment Approval Details</h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped ">
                                <tbody>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Emp_Id"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->emp_id ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Name"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->name; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Designation"); ?>:</b></td>
                                    <td style="width: 70%"><?= $designations->name;?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Date_Of_Interview"); ?>:</b></td>
                                    <td style="width: 70%"><?= $this->sma->hrsd($document->date_of_interview);?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Gender"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->gender; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Company"); ?>:</b></td>
                                    <td style="width: 70%"><?= $companies->name; ?></td>
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
                                    <td style="width: 30%"><b><?= lang("Division"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->division ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Workstation"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->workstation; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Salary"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->salary;?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Date_Of_Joining"); ?>:</b></td>
                                    <td style="width: 70%"><?= $this->sma->hrsd($document->date_of_join);?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Status"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->status; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b><?= lang("Department"); ?>:</b></td>
                                    <td style="width: 70%"><?= $document->department; ?></td>
                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <?php if($document->other_info){ ?>
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <th style="text-align: center;font-weight: bold;">Other Information</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="2"><?= $document->other_info;?></td>
                                </tr>
                                </tbody>
                            </table></div>
                    </div>
                    <div class="clearfix"></div>
                <?php }?>
            </div>
            <div class="buttons">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="<?= site_url('hrms/pdf_recruitment_approval/' . $document->id) ?>" class="tip btn btn-info" title="<?= lang('pdf') ?>">
                            <i class="fa fa-download"></i>
                            <span class="hidden-sm hidden-xs"><?= lang('pdf') ?></span>
                        </a>
                    </div>
                    <?php if($this->Owner || $this->Admin || $GP['hrms-edit_manpower_requisition']) { ?>
                        <div class="btn-group">
                        <a href="<?= site_url('hrms/edit_recruitment_approval/' . $document->id) ?>" class="tip btn btn-warning tip" title="<?= lang('Edit_Manpower_Requisition') ?>">
                            <i class="fa fa-edit"></i>
                            <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                        </a>
                        </div><?php }?>
                    <?php if($this->Owner || $this->Admin || $GP['hrms-delete_recruitment_approval']) { ?>
                        <div class="btn-group">
                        <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete_Manpower_Requisition") ?></b>"
                           data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('hrms/delete_manpower_requisition/' . $document->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
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
