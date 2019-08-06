<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($Owner || $Admin || $GP['approval_manpower_requisition'] || $GP['approval_recruitment_approval'] || $GP['correction_request_approval']) { ?>
    <div class="box" style="margin-bottom: 15px;">
        <div class="box-header">
            <h2 class="blue"><i class="fa-fw fa fa-bar-chart-o"></i><?= lang('Waiting_For_Approval'); ?></h2>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if ($Owner || $Admin || $GP['approval_manpower_requisition']) { ?>
                                <div class="col-sm-2">
                                    <div class="small-box padding1010 bpurple">
                                        <h4 class="bold" style="color: #ffffff"><?= lang('Manpower_Requisition') ?></h4>
<!--                                        <i class="fa fa-star"></i>-->
                                        <div style="cursor: pointer;">
                                        <a href="<?= site_url('approval/approval_list/manpower_requisition'); ?>" style="text-align: center;font-size: 20px;"><?php echo (($total_mr->total < 10 && $total_mr->total > 0 ) ? '0'.$total_mr->total : $total_mr->total);?></a></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($Owner || $Admin || $GP['approval_recruitment_approval']) { ?>
                                <div class="col-sm-2">
                                    <div class="small-box padding1010 bblue">
                                        <h4 class="bold" style="color: #ffffff"><?= lang('Recruitment_Approval') ?></h4>
<!--                                        <i class="fa fa-star"></i>-->
                                        <div style="cursor: pointer;">
                                            <a href="<?= site_url('approval/approval_list/recruitment_approval'); ?>" style="text-align: center;font-size: 20px;"><?php echo (($total_ar->total < 10 && $total_ar->total > 0 ) ? '0'.$total_ar->total : $total_ar->total);?></a></div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($Owner || $Admin || $GP['correction_request_approval']) { ?>
                                <div class="col-sm-2">
                                    <div class="small-box padding1010 bred">
                                        <h4 class="bold" style="color: #ffffff"><?= lang('Correction_Request') ?></h4>
<!--                                        <i class="fa fa-star"></i>-->
                                        <div style="cursor: pointer;">
                                            <a href="<?= site_url('correction_request/approval_list/cr'); ?>" style="text-align: center;font-size: 20px;"><?php echo (($total_cr->total < 10 && $total_cr->total > 0 ) ? '0'.$total_cr->total : $total_cr->total);?></a></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Owner || $Admin) { ?>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="blue"><i class="fa fa-th"></i><span class="break"></span><?= lang('quick_links') ?></h2>
                </div>
                <div class="box-content">
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bdarkGreen white quick-button small" href="<?= site_url('employees') ?>">
                            <i class="fa fa-heart"></i>

                            <p><?= lang('Employees') ?></p>
                        </a>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bblue white quick-button small" href="<?= site_url('employees/bills') ?>">
                            <i class="fa fa-dollar"></i>

                            <p><?= lang('Bills') ?></p>
                        </a>
                    </div>


                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="blightOrange white quick-button small" href="<?= site_url('document') ?>">
                            <i class="fa fa-file-excel-o"></i>

                            <p><?= lang('Documents') ?></p>
                        </a>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bred white quick-button small" href="<?= site_url('document/doc_movement_list') ?>">
                            <i class="fa fa-star"></i>

                            <p><?= lang('Doc_Mov.') ?></p>
                        </a>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bpink white quick-button small" href="<?= site_url('document/file_manager') ?>">
                            <i class="fa fa-search"></i>

                            <p><?= lang('File_Exp.') ?></p>
                        </a>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bgrey white quick-button small" href="<?= site_url('hrms/manpower_requisition') ?>">
                            <i class="fa fa-user"></i>

                            <p><?= lang('Man._Req.') ?></p>
                        </a>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bred white quick-button small" href="<?= site_url('correction_Request') ?>">
                            <i class="fa fa-unlock-alt"></i>

                            <p><?= lang('Corr._Req.') ?></p>
                        </a>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="blightBlue white quick-button small" href="<?= site_url('notifications') ?>">
                            <i class="fa fa-comments"></i>

                            <p><?= lang('notifications') ?></p>
                            <!--<span class="notification green">4</span>-->
                        </a>
                    </div>

                    <?php if ($Owner) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bblue white quick-button small" href="<?= site_url('auth/users') ?>">
                                <i class="fa fa-group"></i>
                                <p><?= lang('users') ?></p>
                            </a>
                        </div>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bblue white quick-button small" href="<?= site_url('system_settings') ?>">
                                <i class="fa fa-cogs"></i>

                                <p><?= lang('settings') ?></p>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="blue"><i class="fa fa-th"></i><span class="break"></span><?= lang('quick_links') ?></h2>
                </div>
                <div class="box-content">
                    <?php if ($GP['employees-index']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bblue white quick-button small" href="<?= site_url('employees') ?>">
                                <i class="fa fa-heart"></i>
                                <p><?= lang('Employees') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['employees-bill_index']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bdarkGreen white quick-button small" href="<?= site_url('employees/bills') ?>">
                                <i class="fa fa-dollar"></i>
                                <p><?= lang('Bills') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['document-index']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="blightOrange white quick-button small" href="<?= site_url('document') ?>">
                                <i class="fa fa-file-excel-o"></i>
                                <p><?= lang('Document') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['document-doc_movement_list']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bred white quick-button small" href="<?= site_url('document/doc_movement_list') ?>">
                                <i class="fa fa-star"></i>
                                <p><?= lang('Doc_Mov.') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['document-file_manager']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bpink white quick-button small" href="<?= site_url('document/file_manager') ?>">
                                <i class="fa fa-star-o"></i>
                                <p><?= lang('File_Exp.') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['hrms-manpower_requisition']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bgrey white quick-button small" href="<?= site_url('hrms/manpower_requisition') ?>">
                                <i class="fa fa-user"></i>
                                <p><?= lang('Man_Req.') ?></p>
                            </a>
                        </div>
                    <?php }

                    if ($GP['correction_request-index']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bred white quick-button small" href="<?= site_url('correction_request/index') ?>">
                                <i class="fa fa-unlock-alt"></i>
                                <p><?= lang('Corr._Req.') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['company-index'] || $GP['designation-index'] || $GP['operator-index'] || $GP['package-index'] || $GP['doctype-index'] || $GP['backups_index' ]) { ?>
                    <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="blightBlue white quick-button small" href="<?= site_url('system_settings/company') ?>">
                                <i class="fa fa-cogs"></i>

                                <p><?= lang('Settings') ?></p>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
