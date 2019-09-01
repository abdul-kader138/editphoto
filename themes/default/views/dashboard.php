<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box" style="margin-bottom: 15px;">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-bar-chart-o"></i><?= lang('Application_Overview'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="small-box padding1010 bpurple">
                                <h3 class="bold" style="color: #ffffff;"><?= lang('Total_Invoices') ?></h3>
                                <i class="icon fa fa-heart-o"></i>
                                <div style="cursor: pointer;color: white;font-size: 25px; text-align: center;"><?= $total_inv->total ? $total_inv->total : 0 ?></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="small-box padding1010 bblue">
                                <h3 class="bold" style="color: #ffffff;"><?= lang('Total_Invoice_Paid') ?></h3>
                                <i class="icon fa fa-heart-o"></i>
                                <div style="cursor: pointer;color: white;font-size: 25px; text-align: center;"><?= $total_inv_paid->total ? $total_inv_paid->total : 0 ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="small-box padding1010 bred">
                                <h3 class="bold" style="color: #ffffff;"><?= lang('Total_Invoice_Due') ?></h3>
                                <i class="icon fa fa-heart-o"></i>
                                <div style="cursor: pointer;color: white;font-size: 25px; text-align: center;"><?= $total_inv_due->total ? $total_inv_due->total : 0 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($Owner || $Admin) { ?>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="blue"><i class="fa fa-th"></i><span class="break"></span><?= lang('quick_links') ?></h2>
                </div>
                <div class="box-content">
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bdarkGreen white quick-button small" href="<?= site_url('invoices') ?>">
                            <i class="fa fa-dollar"></i>

                            <p><?= lang('Invoices') ?></p>
                        </a>
                    </div>

                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="bgrey white quick-button small" href="<?= site_url('document/file_manager') ?>">
                            <i class="fa fa-file"></i>

                            <p><?= lang('File_Manager') ?></p>
                        </a>
                    </div>
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="blightOrange white quick-button small" href="<?= site_url('calendar') ?>">
                            <i class="fa fa-calendar"></i>

                            <p><?= lang('Calendar') ?></p>
                        </a>
                    </div>
                    <?php if ($Owner) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="blightBlue white quick-button small" href="<?= site_url('auth/users') ?>">
                                <i class="fa fa-group"></i>
                                <p><?= lang('users') ?></p>
                            </a>
                        </div>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bpink white quick-button small" href="<?= site_url('system_settings') ?>">
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
                    <?php if ($GP['invoices-index']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bdarkGreen white quick-button small" href="<?= site_url('invoices') ?>">
                                <i class="fa fa-heart"></i>
                                <p><?= lang('Invoices') ?></p>
                            </a>
                        </div>
                    <?php }
                    if ($GP['document-file_manager']) { ?>
                        <div class="col-lg-1 col-md-2 col-xs-6">
                            <a class="bgrey white quick-button small" href="<?= site_url('document/file_manager') ?>">
                                <i class="fa fa-file"></i>
                                <p><?= lang('File_Manager') ?></p>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="col-lg-1 col-md-2 col-xs-6">
                        <a class="blightOrange white quick-button small" href="<?= site_url('calendar') ?>">
                            <i class="fa fa-calendar"></i>

                            <p><?= lang('Calendar') ?></p>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
