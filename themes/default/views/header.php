<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="<?= site_url() ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - <?= $Settings->site_name ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>styles/theme.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet"/>
    <link href="<?= $assets ?>js/izitoast/css/iziToast.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= $assets ?>js/jquery.js"></script>
    <![endif]-->
    <noscript>
        <style type="text/css">#loading {
                display: none;
            }
        </style>
    </noscript>
    <?php if ($Settings->user_rtl) { ?>
        <link href="<?= $assets ?>styles/helpers/bootstrap-rtl.min.css" rel="stylesheet"/>
        <link href="<?= $assets ?>styles/style-rtl.css" rel="stylesheet"/>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.pull-right, .pull-left').addClass('flip');
            });
        </script>
    <?php } ?>
    <script type="text/javascript">
        $(window).load(function () {
            $("#loading").fadeOut("slow");
        });
    </script>
</head>

<body>
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p><strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.</p>
        </div>
    </div>
</noscript>
<div id="loading"></div>
<div id="app_wrapper">
    <header id="header" class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url() ?>"><span class="logo"><?= $Settings->site_name ?></span></a>

            <div class="btn-group visible-xs pull-right btn-visible-sm">
                <button class="navbar-toggle btn" type="button" data-toggle="collapse" data-target="#sidebar_menu">
                    <span class="fa fa-bars"></span>
                </button>
                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id')); ?>" class="btn">
                    <span class="fa fa-user"></span>
                </a>
                <a href="<?= site_url('logout'); ?>" class="btn">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
            <div class="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                            <img alt=""
                                 src="<?= $this->session->userdata('avatar') ? site_url() . 'assets/uploads/avatars/thumbs/' . $this->session->userdata('avatar') : base_url('assets/images/' . $this->session->userdata('gender') . '.png'); ?>"
                                 class="mini_avatar img-rounded">

                            <div class="user">
                                <span><?= lang('welcome') ?> <?= $this->session->userdata('username'); ?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id')); ?>">
                                    <i class="fa fa-user"></i> <?= lang('profile'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('users/profile/' . $this->session->userdata('user_id') . '/#cpassword'); ?>"><i
                                            class="fa fa-key"></i> <?= lang('change_password'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= site_url('logout'); ?>">
                                    <i class="fa fa-sign-out"></i> <?= lang('logout'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown hidden-xs"><a class="btn tip" title="<?= lang('dashboard') ?>"
                                                      data-placement="bottom"
                                                      href="<?= site_url('welcome') ?>"><i class="fa fa-dashboard"></i></a>
                    </li>
                    <?php if ($Owner) { ?>
                        <li class="dropdown hidden-sm">
                            <a class="btn tip" title="<?= lang('settings') ?>" data-placement="bottom"
                               href="<?= site_url('system_settings') ?>">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('calculator') ?>" data-placement="bottom" href="#"
                           data-toggle="dropdown">
                            <i class="fa fa-calculator"></i>
                        </a>
                        <ul class="dropdown-menu pull-right calc">
                            <li class="dropdown-content">
                                <span id="inlineCalc"></span>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('calendar') ?>" data-placement="bottom"
                           href="<?= site_url('calendar') ?>">
                            <i class="fa fa-calendar"></i>
                        </a>
                    </li>
                    <li class="dropdown hidden-sm">
                        <a class="btn tip" title="<?= lang('styles') ?>" data-placement="bottom" data-toggle="dropdown"
                           href="#">
                            <i class="fa fa-css3"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="bwhite noPadding">
                                <a href="#" id="fixed" class="">
                                    <i class="fa fa-angle-double-left"></i>
                                    <span id="fixedText">Fixed</span>
                                </a>
                                <a href="#" id="cssLight" class="grey">
                                    <i class="fa fa-stop"></i> Grey
                                </a>
                                <a href="#" id="cssBlue" class="blue">
                                    <i class="fa fa-stop"></i> Blue
                                </a>
                                <a href="#" id="cssBlack" class="black">
                                    <i class="fa fa-stop"></i> Black
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container" id="container">
        <div class="row" id="main-con">
            <table class="lt">
                <tr>
                    <td class="sidebar-con">
                        <div id="sidebar-left">
                            <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
                                <ul class="nav main-menu">
                                    <li class="mm_welcome">
                                        <a href="<?= site_url() ?>">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="text"> <?= lang('dashboard'); ?></span>
                                        </a>
                                    </li>

                                    <?php
                                    if ($Owner || $Admin) { ?>

                                        <li class="mm_invoice">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="text"> <?= lang('Invoice'); ?>
                                                </span> <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="invoice_index">
                                                    <a class="submenu" href="<?= site_url('invoices'); ?>">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="text"> <?= lang('List_Invoice'); ?></span>
                                                    </a>

                                                </li>
                                                <li id="invoice_add">
                                                    <a class="submenu" href="<?= site_url('invoices/add'); ?>">
                                                        <i class="fa fa-plus"></i>
                                                        <span class="text"> <?= lang('Add_Invoice'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="mm_document">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-list-alt"></i>
                                                <span class="text"> <?= lang('File_Manager'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                    <li id="document_file_manager">
                                                        <a class="submenu"
                                                           href="<?= site_url('document/file_manager'); ?>">
                                                            <i class="fa fa-search"></i><span
                                                                    class="text"> <?= lang('File_Manager'); ?></span>
                                                        </a>
                                                    </li>
                                            </ul>
                                        </li>
                                        <li class="mm_calendar">
                                            <a class="submenu" href="<?= site_url('calendar'); ?>">
                                                <i class="fa fa-calendar"></i><span
                                                        class="text"> <?= lang('Event_Calender'); ?></span>
                                            </a>
                                        </li>

                                        <li class="mm_auth">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-users"></i>
                                                <span class="text"> <?= lang('people'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <?php if ($Owner) { ?>
                                                    <li id="auth_users">
                                                        <a class="submenu" href="<?= site_url('users'); ?>">
                                                            <i class="fa fa-users"></i><span
                                                                    class="text"> <?= lang('list_users'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="auth_create_user">
                                                        <a class="submenu" href="<?= site_url('users/create_user'); ?>">
                                                            <i class="fa fa-user-plus"></i><span
                                                                    class="text"> <?= lang('new_user'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php if ($Owner) { ?>
                                            <li class="mm_system_settings <?= strtolower($this->router->fetch_method()) == 'sales' ? '' : 'mm_pos' ?>">
                                                <a class="dropmenu" href="#">
                                                    <i class="fa fa-cog"></i><span
                                                            class="text"> <?= lang('settings'); ?> </span>
                                                    <span class="chevron closed"></span>
                                                </a>
                                                <ul>
                                                    <li id="system_settings_index">
                                                        <a href="<?= site_url('system_settings') ?>">
                                                            <i class="fa fa-cog"></i><span
                                                                    class="text"> <?= lang('system_settings'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_change_logo">
                                                        <a href="<?= site_url('system_settings/change_logo') ?>"
                                                           data-toggle="modal" data-target="#myModal">
                                                            <i class="fa fa-upload"></i><span
                                                                    class="text"> <?= lang('change_logo'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_currencies">
                                                        <a href="<?= site_url('system_settings/currencies') ?>">
                                                            <i class="fa fa-money"></i><span
                                                                    class="text"> <?= lang('currencies'); ?></span>
                                                        </a>
                                                    </li>
<!--                                                    <li id="system_settings_categories">-->
<!--                                                        <a href="--><?//= site_url('system_settings/categories') ?><!--">-->
<!--                                                            <i class="fa fa-folder-open"></i><span-->
<!--                                                                    class="text"> --><?//= lang('categories'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
                                                    <li id="system_settings_service_type">
                                                        <a href="<?= site_url('system_settings/service_type') ?>">
                                                            <i class="fa fa-check-circle-o"></i><span
                                                                    class="text"> <?= lang('Service_Type'); ?></span>
                                                        </a>
                                                    </li>

                                                    <li id="system_settings_complexity_type">
                                                        <a href="<?= site_url('system_settings/complexity_type') ?>">
                                                            <i class="fa fa-check-circle-o"></i><span
                                                                    class="text"> <?= lang('Complexity_Type'); ?></span>
                                                        </a>
                                                    </li>

                                                    <li id="system_settings_add_ons">
                                                        <a href="<?= site_url('system_settings/add_ons') ?>">
                                                            <i class="fa fa-check-circle-o"></i><span
                                                                    class="text"> <?= lang('Add_-Ons'); ?></span>
                                                        </a>
                                                    </li>

                                                    <li id="system_settings_delivery_format">
                                                        <a href="<?= site_url('system_settings/delivery_format') ?>">
                                                            <i class="fa fa-check-circle-o"></i><span
                                                                    class="text"> <?= lang('Delivery_Format'); ?></span>
                                                        </a>
                                                    </li>

                                                    <li id="system_settings_delivery_time_cost">
                                                        <a href="<?= site_url('system_settings/delivery_time_cost') ?>">
                                                            <i class="fa fa-check-circle-o"></i><span
                                                                    class="text"> <?= lang('Delivery_Time_Cost'); ?></span>
                                                        </a>
                                                    </li>
<!--                                                    <li id="system_settings_brands">-->
<!--                                                        <a href="--><?//= site_url('system_settings/brands') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('brands'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_company">-->
<!--                                                        <a href="--><?//= site_url('system_settings/company') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('company'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_designation">-->
<!--                                                        <a href="--><?//= site_url('system_settings/designation') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('designation'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_designation">-->
<!--                                                        <a href="--><?//= site_url('system_settings/doctype') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('doc_type'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_operator">-->
<!--                                                        <a href="--><?//= site_url('system_settings/operator') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('operator'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_package">-->
<!--                                                        <a href="--><?//= site_url('system_settings/package') ?><!--">-->
<!--                                                            <i class="fa fa-th-list"></i><span-->
<!--                                                                    class="text"> --><?//= lang('package'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li id="system_settings_email_templates">-->
<!--                                                        <a href="--><?//= site_url('system_settings/email_templates') ?><!--">-->
<!--                                                            <i class="fa fa-envelope"></i><span-->
<!--                                                                    class="text"> --><?//= lang('email_templates'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
                                                    <li id="system_settings_user_groups">
                                                        <a href="<?= site_url('system_settings/user_groups') ?>">
                                                            <i class="fa fa-key"></i><span
                                                                    class="text"> <?= lang('group_permissions'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_backups">
                                                        <a href="<?= site_url('system_settings/backups') ?>">
                                                            <i class="fa fa-database"></i><span
                                                                    class="text"> <?= lang('backups'); ?></span>
                                                        </a>
                                                    </li>
<!--                                                    <li id="system_settings_updates">-->
<!--                                                        <a href="--><?//= site_url('system_settings/updates') ?><!--">-->
<!--                                                            <i class="fa fa-upload"></i><span-->
<!--                                                                    class="text"> --><?//= lang('updates'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <!--                a.kader-->-->
<!--                                                    <li id="system_settings_approveres">-->
<!--                                                        <a href="--><?//= site_url('system_settings/approveres') ?><!--">-->
<!--                                                            <i class="fa fa-user"></i><span-->
<!--                                                                    class="text"> --><?//= lang('Approver_Setup_HR'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!---->
<!---->
<!--                                                    <li id="system_settings_approveres_others">-->
<!--                                                        <a href="--><?//= site_url('system_settings/approveres_others') ?><!--">-->
<!--                                                            <i class="fa fa-user"></i><span-->
<!--                                                                    class="text"> --><?//= lang('Approver_Setup_Others'); ?><!--</span>-->
<!--                                                        </a>-->
<!--                                                    </li>-->
                                                </ul>
                                            </li>
                                        <?php } ?>
                                        <?php
                                    } else { // not owner and not admin
                                        ?>
                                        <?php if ($GP['calendar-index']) { ?>
                                            <li class="mm_calendar">
                                                <a class="submenu" href="<?= site_url('calendar'); ?>">
                                                    <i class="fa fa-calendar"></i><span
                                                            class="text"> <?= lang('Event_Calender'); ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($GP['invoices-index'] || $GP['invoices-add']) { ?>
                                            <li class="mm_invoices">
                                                <a class="dropmenu" href="#">
                                                    <i class="fa fa-heart-o"></i>
                                                    <span class="text"> <?= lang('Invoices'); ?> </span>
                                                    <span class="chevron closed"></span>
                                                </a>
                                                <ul>
                                                    <?php if ($GP['invoices-index']) { ?>
                                                        <li id="invoices_index">
                                                            <a class="submenu"
                                                               href="<?= site_url('invoices'); ?>">
                                                                <i class="fa fa-users"></i><span
                                                                        class="text"> <?= lang('List_Invoices'); ?></span>
                                                            </a>
                                                        </li>

                                                    <?php } ?>

                                                    <?php if ($GP['invoices-add']) { ?>
                                                        <li id="invoices_add">
                                                            <a class="submenu"
                                                               href="<?= site_url('invoices/add'); ?>">
                                                                <i class="fa fa-plus"></i><span
                                                                        class="text"> <?= lang('Add_Invoices'); ?></span>
                                                            </a>
                                                        </li>

                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>


                                        <?php if ($GP['document-file_manager']) {
                                            ?>
                                            <li class="mm_document">
                                                <a class="dropmenu" href="#">
                                                    <i class="fa fa-list-alt"></i>
                                                    <span class="text"> <?= lang('File_Manager'); ?> </span>
                                                    <span class="chevron closed"></span>
                                                </a>
                                                <ul>
                                                    <?php if ($GP['document-file_manager']) { ?>
                                                        <li id="document_file_manager">
                                                            <a class="submenu"
                                                               href="<?= site_url('document/file_manager'); ?>">
                                                                <i class="fa fa-search"></i><span
                                                                        class="text"> <?= lang('File_Manager'); ?></span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>


                                    <?php } ?>
                                </ul>
                            </div>
                            <a href="#" id="main-menu-act" class="full visible-md visible-lg">
                                <i class="fa fa-angle-double-left"></i>
                            </a>
                        </div>
                    </td>
                    <td class="content-con">
                        <div id="content">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <ul class="breadcrumb">
                                        <?php
                                        foreach ($bc as $b) {
                                            if ($b['link'] === '#') {
                                                echo '<li class="active">' . $b['page'] . '</li>';
                                            } else {
                                                echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if ($message) { ?>
                                        <div class="alert alert-success">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $message; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $error; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($warning) { ?>
                                        <div class="alert alert-warning">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $warning; ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($info) {
                                        foreach ($info as $n) {
                                            if (!$this->session->userdata('hidden' . $n->id)) {
                                                ?>
                                                <div class="alert alert-info">
                                                    <a href="#" id="<?= $n->id ?>" class="close hideComment external"
                                                       data-dismiss="alert">&times;</a>
                                                    <?= $n->comment; ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="alerts-con"></div>
