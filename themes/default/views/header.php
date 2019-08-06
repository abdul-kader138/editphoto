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
    <?php if ($info) { ?>
        <li class="dropdown hidden-sm">
            <a class="btn tip" title="<?= lang('notifications') ?>" data-placement="bottom" href="#"
               data-toggle="dropdown">
                <i class="fa fa-info-circle"></i>
                <span class="number blightOrange black"><?= sizeof($info) ?></span>
            </a>
            <ul class="dropdown-menu pull-right content-scroll">
                <li class="dropdown-header"><i
                        class="fa fa-info-circle"></i> <?= lang('notifications'); ?></li>
                <li class="dropdown-content">
                    <div class="scroll-div">
                        <div class="top-menu-scroll">
                            <ol class="oe">
                                <?php
                                foreach ($info as $n) {
                                    echo '<li>' . $n->comment . '</li>';
                                }
                                ?>
                            </ol>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    <?php } ?>
    <?php if ($events) { ?>
        <li class="dropdown hidden-xs">
            <a class="btn tip" title="<?= lang('calendar') ?>" data-placement="bottom" href="#"
               data-toggle="dropdown">
                <i class="fa fa-calendar"></i>
                <span class="number blightOrange black"><?= sizeof($events) ?></span>
            </a>
            <ul class="dropdown-menu pull-right content-scroll">
                <li class="dropdown-header">
                    <i class="fa fa-calendar"></i> <?= lang('upcoming_events'); ?>
                </li>
                <li class="dropdown-content">
                    <div class="top-menu-scroll">
                        <ol class="oe">
                            <?php
                            foreach ($events as $event) {
                                echo '<li>' . date($dateFormats['php_ldate'], strtotime($event->start)) . ' <strong>' . $event->title . '</strong><br>' . $event->description . '</li>';
                            }
                            ?>
                        </ol>
                    </div>
                </li>
                <li class="dropdown-footer">
                    <a href="<?= site_url('calendar') ?>" class="btn-block link">
                        <i class="fa fa-calendar"></i> <?= lang('calendar') ?>
                    </a>
                </li>
            </ul>
        </li>
    <?php } else { ?>
        <li class="dropdown hidden-xs">
            <a class="btn tip" title="<?= lang('calendar') ?>" data-placement="bottom"
               href="<?= site_url('calendar') ?>">
                <i class="fa fa-calendar"></i>
            </a>
        </li>
    <?php } ?>
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
if ($Owner || $Admin) {
    ?>
    <li class="mm_employees">
        <a class="dropmenu" href="#">
            <i class="fa fa-user"></i>
            <span class="text"> <?= lang('Employee'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="employees_index">
                <a class="submenu" href="<?= site_url('employees'); ?>">
                    <i class="fa fa-users"></i><span
                        class="text"> <?= lang('list_employees'); ?></span>
                </a>
            </li>
            <li id="employees_add_employee">
                <a class="submenu" href="<?= site_url('employees/add_employee'); ?>">
                    <i class="fa fa-user-plus"></i><span
                        class="text"> <?= lang('add_employee'); ?></span>
                </a>
            </li>
            <li id="employees_employee_by_csv">
                <a class="submenu" href="<?= site_url('employees/employee_by_csv'); ?>">
                    <i class="fa fa-plus-circle"></i>
                    <span class="text"> <?= lang('add_employee_by_csv'); ?></span>
                </a>
            </li>
            <li id="employees_index_payment">
                <a class="submenu" href="<?= site_url('employees/index_payment'); ?>">
                    <i class="fa fa-usd"></i><span
                        class="text"> <?= lang('index_payment'); ?></span>
                </a>
            </li>
            <li id="employees_add_employee_payment">
                <a class="submenu" href="<?= site_url('employees/add_employee_payment'); ?>">
                    <i class="fa fa-plus-circle"></i><span
                        class="text"> <?= lang('add_employee_payment'); ?></span>
                </a>
            </li>
            <li id="employees_salary_process">
                <a class="submenu" href="<?= site_url('employees/salary_process'); ?>">
                    <i class="fa fa-upload"></i>
                    <span class="text"> <?= lang('salary_process'); ?></span>
                </a>
            </li>
            <li id="employees_list_month_salary">
                <a class="submenu" href="<?= site_url('employees/list_month_salary'); ?>">
                    <i class="fa fa-money"></i>
                    <span class="text"> <?= lang('list_month_salary'); ?></span>
                </a>
            </li>


            <li id="employees_bill_add">
                <a class="submenu" href="<?= site_url('employees/bill_add'); ?>">
                    <i class="fa fa-upload"></i>
                    <span class="text"> <?= lang('bill_upload'); ?></span>
                </a>
            </li>
            <li id="employees_bills">
                <a class="submenu" href="<?= site_url('employees/bills'); ?>">
                    <i class="fa fa-certificate"></i>
                    <span class="text"> <?= lang('bills'); ?></span>
                </a>
            </li>
        </ul>
    </li>
    <li class="mm_guard">
        <a class="dropmenu" href="#">
            <i class="fa fa-lock"></i>
            <span class="text"> <?= lang('Guard'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="guard_index">
                <a class="submenu" href="<?= site_url('guard'); ?>">
                    <i class="fa fa-users"></i><span
                        class="text"> <?= lang('list_guards'); ?></span>
                </a>
            </li>
            <li id="guard_add_guard">
                <a class="submenu" href="<?= site_url('guard/add_guard'); ?>">
                    <i class="fa fa-user-plus"></i><span
                        class="text"> <?= lang('add_guard'); ?></span>
                </a>
            </li>
            <li id="guard_bill_add">
                <a class="submenu" href="<?= site_url('guard/weight_upload'); ?>">
                    <i class="fa fa-upload"></i><span
                        class="text"> <?= lang('weight_upload'); ?></span>
                </a>
            </li>
            </ul>
    </li>

    <li class="mm_document">
        <a class="dropmenu" href="#">
            <i class="fa fa-list-alt"></i>
            <span class="text"> <?= lang('document'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="document_index">
                <a class="submenu" href="<?= site_url('document'); ?>">
                    <i class="fa fa-list-alt"></i><span
                        class="text"> <?= lang('list_document'); ?></span>
                </a>
            </li>
            <li id="document_add_document">
                <a class="submenu" href="<?= site_url('document/add'); ?>">
                    <i class="fa fa-plus"></i><span
                        class="text"> <?= lang('add_document'); ?></span>
                </a>
            </li>
            <li id="document_doc_movement_list">
                <a class="submenu" href="<?= site_url('document/doc_movement_list'); ?>">
                    <i class="fa fa-plus"></i><span
                        class="text"> <?= lang('doc_movement_list'); ?></span>
                </a>
            </li>
            <li id="document_add_movement">
                <a class="submenu" href="<?= site_url('document/add_movement'); ?>">
                    <i class="fa fa-plus"></i><span
                        class="text"> <?= lang('add_movement'); ?></span>
                </a>
            </li>
            <li id="document_file_explorer">
                <a class="submenu" href="<?= site_url('document/file_explorer'); ?>">
                    <i class="fa fa-search"></i><span
                        class="text"> <?= lang('File_Manager'); ?></span>
                </a>
            </li>
            <li id="document_file_manager">
                <a class="submenu" href="<?= site_url('document/file_manager'); ?>">
                    <i class="fa fa-search"></i><span
                            class="text"> <?= lang('File_Manager_New'); ?></span>
                </a>
            </li>
        </ul>
    </li>

    <li class="mm_hrms">
        <a class="dropmenu" href="#">
            <i class="fa fa-dashboard"></i>
            <span class="text"> <?= lang('HR'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="hrms_manpower_requisition">
                <a class="submenu" href="<?= site_url('hrms/manpower_requisition'); ?>">
                    <i class="fa fa-user"></i><span
                            class="text"> <?= lang('List_Manpower_Requisition'); ?></span>
                </a>
            </li>
            <li id="hrms_add_manpower_requisition">
                <a class="submenu" href="<?= site_url('hrms/add_manpower_requisition'); ?>">
                    <i class="fa fa-user-plus"></i><span
                            class="text"> <?= lang('Add_Manpower_Requisition'); ?></span>
                </a>
            </li>
            <li id="hrms_recruitment_approval">
                <a class="submenu" href="<?= site_url('hrms/recruitment_approval'); ?>">
                    <i class="fa fa-random"></i><span
                            class="text"> <?= lang('List_Recruitment_Approval'); ?></span>
                </a>
            </li>
            <li id="hrms_add_recruitment_approval">
                <a class="submenu" href="<?= site_url('hrms/add_recruitment_approval'); ?>">
                    <i class="fa fa-user-plus"></i><span
                            class="text"> <?= lang('Add_Recruitment_Approval'); ?></span>
                </a>
            </li>
        </ul>
    </li>

    <li class="mm_correction_request">
        <a class="dropmenu" href="#">
            <i class="fa fa-dashboard"></i>
            <span class="text"> <?= lang('Correction_Request'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="correction_request_index">
                <a class="submenu" href="<?= site_url('correction_request/'); ?>">
                    <i class="fa fa-th"></i><span
                            class="text"> <?= lang('List_Correction_Request'); ?></span>
                </a>
            </li>
            <li id="correction_request_add">
                <a class="submenu" href="<?= site_url('correction_request/add'); ?>">
                    <i class="fa fa-plus"></i><span
                            class="text"> <?= lang('Add_Correction_Request'); ?></span>
                </a>
            </li>
        </ul>
    </li>

    <li class="mm_auth mm_customers mm_suppliers mm_billers">
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
    <li class="mm_notifications">
        <a class="submenu" href="<?= site_url('notifications'); ?>">
            <i class="fa fa-info-circle"></i><span
                class="text"> <?= lang('notifications'); ?></span>
        </a>
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
                <li id="system_settings_categories">
                    <a href="<?= site_url('system_settings/categories') ?>">
                        <i class="fa fa-folder-open"></i><span
                            class="text"> <?= lang('categories'); ?></span>
                    </a>
                </li>
                <li id="system_settings_units">
                    <a href="<?= site_url('system_settings/units') ?>">
                        <i class="fa fa-wrench"></i><span
                            class="text"> <?= lang('units'); ?></span>
                    </a>
                </li>
                <li id="system_settings_brands">
                    <a href="<?= site_url('system_settings/brands') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('brands'); ?></span>
                    </a>
                </li>
                <li id="system_settings_company">
                    <a href="<?= site_url('system_settings/company') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('company'); ?></span>
                    </a>
                </li>
                <li id="system_settings_designation">
                    <a href="<?= site_url('system_settings/designation') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('designation'); ?></span>
                    </a>
                </li>
                <li id="system_settings_designation">
                    <a href="<?= site_url('system_settings/doctype') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('doc_type'); ?></span>
                    </a>
                </li>
                <li id="system_settings_operator">
                    <a href="<?= site_url('system_settings/operator') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('operator'); ?></span>
                    </a>
                </li>
                <li id="system_settings_package">
                    <a href="<?= site_url('system_settings/package') ?>">
                        <i class="fa fa-th-list"></i><span
                            class="text"> <?= lang('package'); ?></span>
                    </a>
                </li>
                <li id="system_settings_email_templates">
                    <a href="<?= site_url('system_settings/email_templates') ?>">
                        <i class="fa fa-envelope"></i><span
                            class="text"> <?= lang('email_templates'); ?></span>
                    </a>
                </li>
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
                <li id="system_settings_updates">
                    <a href="<?= site_url('system_settings/updates') ?>">
                        <i class="fa fa-upload"></i><span
                            class="text"> <?= lang('updates'); ?></span>
                    </a>
                </li>
<!--                a.kader-->
                <li id="system_settings_approveres">
                    <a href="<?= site_url('system_settings/approveres') ?>">
                        <i class="fa fa-user"></i><span
                                class="text"> <?= lang('Approver_Setup_HR'); ?></span>
                    </a>
                </li>


                <li id="system_settings_approveres_others">
                    <a href="<?= site_url('system_settings/approveres_others') ?>">
                        <i class="fa fa-user"></i><span
                                class="text"> <?= lang('Approver_Setup_Others'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>


    <li class="mm_reports">
        <a class="dropmenu" href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span class="text"> <?= lang('reports'); ?> </span>
            <span class="chevron closed"></span>
        </a>
        <ul>
            <li id="reports_company_bill_details">
                <a href="<?= site_url('reports/company_bill_details') ?>">
                    <i class="fa fa-tasks"></i><span
                        class="text"> <?= lang('company_bill_details'); ?></span>
                </a>
            </li>
            <li id="reports_company_wise_bill">
                <a href="<?= site_url('reports/company_wise_bill') ?>">
                    <i class="fa fa-tasks"></i><span
                        class="text"> <?= lang('company_wise_bill'); ?></span>
                </a>
            </li>
        </ul>
    </li>

<?php
} else { // not owner and not admin
    ?>
    <?php if ($GP['employees-index'] || $GP['employees-add'] || $GP['employees-edit'] ||
        $GP['employees-delete'] || $GP['employees-employee_by_csv'] || $GP['employees-bill_add'] || $GP['employees-bill_index']
         || $GP['employees-index_payment'] || $GP['employees-add_employee_payment'] || $GP['employees-edit_employee_payment'] ||
        $GP['employees-delete_employee_payment'] ||  $GP['employees-employee_payment_by_csv'] || $GP['employees-salary_process']
        ||  $GP['employees-list_month_salary']
    ) {
        ?>
        <li class="mm_employees">
            <a class="dropmenu" href="#">
                <i class="fa fa-user"></i>
                <span class="text"> <?= lang('employees'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['employees-index']) { ?>
                    <li id="employees_index">
                        <a class="submenu" href="<?= site_url('employees'); ?>">
                            <i class="fa fa-users"></i><span
                                class="text"> <?= lang('list_employees'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['employees-add']) { ?>
                    <li id="employee_add">
                        <a class="submenu" href="<?= site_url('employees/add_employee'); ?>">
                            <i class="fa fa-plus-circle"></i><span
                                class="text"> <?= lang('add_employee'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['employees-employee_by_csv']) { ?>
                    <li id="employees_employee_by_csv">
                        <a class="submenu" href="<?= site_url('employees/employee_by_csv'); ?>">
                            <i class="fa fa-plus-circle"></i><span
                                class="text"> <?= lang('add_employee_by_csv'); ?></span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GP['employees-index_payment']) { ?>
                    <li id="employees_index_payment">
                        <a class="submenu" href="<?= site_url('employees/index_payment'); ?>">
                            <i class="fa fa-usd"></i><span
                                class="text"> <?= lang('index_payment'); ?></span>
                        </a>
                    </li>
                <?php } ?>


                <?php if ($GP['employees-add_employee_payment']) { ?>
                    <li id="employees_add_employee_payment">
                        <a class="submenu" href="<?= site_url('employees/add_employee_payment'); ?>">
                            <i class="fa fa-plus-circle"></i><span
                                class="text"> <?= lang('add_employee_payment'); ?></span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GP['employees-employee_payment_by_csv']) { ?>
<!--                    <li id="employees_add_employee_payment">-->
<!--                        <a class="submenu" href="--><?//= site_url('employees/employee_payment_by_csv'); ?><!--">-->
<!--                            <i class="fa fa-upload"></i><span-->
<!--                                class="text"> --><?//= lang('add_employee_payment_by_csv'); ?><!--</span>-->
<!--                        </a>-->
<!--                    </li>-->
                <?php } ?>
                <?php if ($GP['employees-salary_process']) { ?>
                    <li id="employees_salary_process">
                        <a class="submenu" href="<?= site_url('employees/salary_process'); ?>">
                            <i class="fa fa-upload"></i><span
                                class="text"> <?= lang('salary_process'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['employees-list_month_salary']) { ?>
                    <li id="employees_list_month_salary">
                        <a class="submenu" href="<?= site_url('employees/list_month_salary'); ?>">
                            <i class="fa fa-money"></i><span
                                class="text"> <?= lang('list_month_salary'); ?></span>
                        </a>
                    </li>
                <?php } ?>


                <?php if ($GP['employees-bill_index']) { ?>
                    <li id="employee-bills">
                        <a class="submenu" href="<?= site_url('employees/bills'); ?>">
                            <i class="fa fa-certificate"></i><span
                                class="text"> <?= lang('bills'); ?></span>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GP['employees-bill_add']) { ?>
                    <li id="employees_bill_add">
                        <a class="submenu" href="<?= site_url('employees/bill_add'); ?>">
                            <i class="fa fa-upload"></i><span
                                class="text"> <?= lang('bill_upload'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php if ($GP['guard-index'] || $GP['guard-add'] || $GP['guard-edit'] ||
        $GP['guard-delete']) {
        ?>
        <li class="mm_guard">
            <a class="dropmenu" href="#">
                <i class="fa fa-dashboard"></i>
                <span class="text"> <?= lang('guard'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['guard-index']) { ?>
                    <li id="guard_index">
                        <a class="submenu" href="<?= site_url('guard'); ?>">
                            <i class="fa fa-users"></i><span
                                class="text"> <?= lang('list_guards'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['guard-add']) { ?>
                    <li id="guard-add">
                        <a class="submenu" href="<?= site_url('guard/add_guard'); ?>">
                            <i class="fa fa-plus-circle"></i><span
                                class="text"> <?= lang('add_guard'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['guard-weight_upload']) { ?>
                    <li id="guard_bill_add">
                        <a class="submenu" href="<?= site_url('guard/weight_upload'); ?>">
                            <i class="fa fa-upload"></i><span
                                class="text"> <?= lang('weight_upload'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php }
    ?>

    <?php if ($GP['hrms-manpower_requisition'] || $GP['hrms-add_manpower_requisition'] || $GP['hrms-recruitment_approval']
        || $GP['hrms-add_recruitment_approval']
    ) {
        ?>
        <li class="mm_hrms">
            <a class="dropmenu" href="#">
                <i class="fa fa-dashboard"></i>
                <span class="text"> <?= lang('HR'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['hrms-manpower_requisition']) { ?>
                    <li id="hrms_manpower_requisition">
                        <a class="submenu" href="<?= site_url('hrms/manpower_requisition'); ?>">
                            <i class="fa fa-user"></i><span
                                    class="text"> <?= lang('List_Manpower_Requisition'); ?></span>
                        </a>
                    </li>
                <?php }
                ?>
                <?php if ($GP['hrms-add_manpower_requisition']) { ?>
                    <li id="hrms_add_manpower_requisition">
                        <a class="submenu" href="<?= site_url('hrms/add_manpower_requisition'); ?>">
                            <i class="fa fa-plus"></i><span
                                    class="text"> <?= lang('Add_Manpower_Requisition'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['hrms-recruitment_approval']) { ?>
                <li id="hrms_recruitment_approval">
                    <a class="submenu" href="<?= site_url('hrms/recruitment_approval'); ?>">
                        <i class="fa fa-user"></i><span
                                class="text"> <?= lang('List_Recruitment_Approval'); ?></span>
                    </a>
                </li>
                <?php }?>
                <?php if ($GP['hrms-add_recruitment_approval']) { ?>
                    <li id="hrms_add_recruitment_approval">
                        <a class="submenu" href="<?= site_url('hrms/add_recruitment_approval'); ?>">
                            <i class="fa fa-plus"></i><span
                                    class="text"> <?= lang('Add_Recruitment_Approval'); ?></span>
                        </a>
                    </li>
                <?php } ?>


            </ul>
        </li>
    <?php } ?>

    <?php if ($GP['correction_request-index'] || $GP['correction_request-add'] ){
        ?>
        <li class="mm_correction_request">
            <a class="dropmenu" href="#">
                <i class="fa fa-dashboard"></i>
                <span class="text"> <?= lang('Correction_Request'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['correction_request-index']) { ?>
                    <li id="correction_request_index">
                        <a class="submenu" href="<?= site_url('correction_request'); ?>">
                            <i class="fa fa-th"></i><span
                                    class="text"> <?= lang('Correction_Request'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['correction_request-add']) { ?>
                    <li id="correction_request_add">
                        <a class="submenu" href="<?= site_url('correction_request/add'); ?>">
                            <i class="fa fa-plus"></i><span
                                    class="text"> <?= lang('Add_Correction_Request'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php }
    ?>


    <?php if ($GP['document-index'] || $GP['document-add'] || $GP['document-edit'] || $GP['document-file_manager'] ||
        $GP['document-delete']
    ) {
        ?>
        <li class="mm_document">
            <a class="dropmenu" href="#">
                <i class="fa fa-list-alt"></i>
                <span class="text"> <?= lang('document'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['document-index']) { ?>
                    <li id="document_index">
                        <a class="submenu" href="<?= site_url('document'); ?>">
                            <i class="fa fa-list-alt"></i><span
                                    class="text"> <?= lang('list_document'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['document-add']) { ?>
                    <li id="document_add">
                        <a class="submenu" href="<?= site_url('document/add'); ?>">
                            <i class="fa fa-plus"></i><span
                                    class="text"> <?= lang('add_document'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['document-doc_movement_list']) { ?>
                    <li id="document_doc_movement_list">
                        <a class="submenu" href="<?= site_url('document/doc_movement_list'); ?>">
                            <i class="fa fa-list-alt"></i><span
                                    class="text"> <?= lang('doc_movement_list'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['document-add_movement']) { ?>
                    <li id="document_add_movement">
                        <a class="submenu" href="<?= site_url('document/add_movement'); ?>">
                            <i class="fa fa-plus"></i><span
                                    class="text"> <?= lang('add_movement'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['document-file_manager']) { ?>
                    <li id="document_file_manager">
                        <a class="submenu" href="<?= site_url('document/file_manager'); ?>">
                            <i class="fa fa-search"></i><span
                                    class="text"> <?= lang('File_Manager'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php if ($GP['reports-quantity_alerts'] || $GP['reports-company_bill_details'] || $GP['reports-expiry_alerts'] || $GP['reports-products'] || $GP['reports-monthly_sales'] || $GP['reports-sales'] || $GP['reports-payments'] || $GP['reports-purchases'] || $GP['reports-customers'] || $GP['reports-suppliers'] || $GP['reports-expenses']) { ?>
        <li class="mm_reports">
            <a class="dropmenu" href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span class="text"> <?= lang('reports'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['reports-quantity_alerts']) { ?>
                    <li id="reports_quantity_alerts">
                        <a href="<?= site_url('reports/quantity_alerts') ?>">
                            <i class="fa fa-bar-chart-o"></i><span
                                class="text"> <?= lang('product_quantity_alerts'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-expiry_alerts']) {
                    ?>
                    <?php if ($Settings->product_expiry) { ?>
                        <li id="reports_expiry_alerts">
                            <a href="<?= site_url('reports/expiry_alerts') ?>">
                                <i class="fa fa-bar-chart-o"></i><span
                                    class="text"> <?= lang('product_expiry_alerts'); ?></span>
                            </a>
                        </li>
                    <?php } ?>
                <?php
                }
                if ($GP['reports-products']) {
                    ?>
                    <li id="reports_products">
                        <a href="<?= site_url('reports/products') ?>">
                            <i class="fa fa-filter"></i><span
                                class="text"> <?= lang('products_report'); ?></span>
                        </a>
                    </li>
                    <li id="reports_adjustments">
                        <a href="<?= site_url('reports/adjustments') ?>">
                            <i class="fa fa-barcode"></i><span
                                class="text"> <?= lang('adjustments_report'); ?></span>
                        </a>
                    </li>
                    <li id="reports_categories">
                        <a href="<?= site_url('reports/categories') ?>">
                            <i class="fa fa-folder-open"></i><span
                                class="text"> <?= lang('categories_report'); ?></span>
                        </a>
                    </li>
                    <li id="reports_brands">
                        <a href="<?= site_url('reports/brands') ?>">
                            <i class="fa fa-cubes"></i><span
                                class="text"> <?= lang('brands_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-product-reorder']) {
                    ?>
                    <li id="reports_products">
                        <a href="<?= site_url('reports/product_reorder') ?>">
                            <i class="fa fa-filter"></i><span
                                class="text"> <?= lang('product_reorder_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-daily_sales']) {
                    ?>
                    <li id="reports_daily_sales">
                        <a href="<?= site_url('reports/daily_sales') ?>">
                            <i class="fa fa-calendar-o"></i><span
                                class="text"> <?= lang('daily_sales'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-monthly_sales']) {
                    ?>
                    <li id="reports_monthly_sales">
                        <a href="<?= site_url('reports/monthly_sales') ?>">
                            <i class="fa fa-calendar-o"></i><span
                                class="text"> <?= lang('monthly_sales'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-sales']) {
                    ?>
                    <li id="reports_sales">
                        <a href="<?= site_url('reports/sales') ?>">
                            <i class="fa fa-heart"></i><span
                                class="text"> <?= lang('sales_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-sales-margin']) {
                    ?>
                    <li id="reports_sales_margin">
                        <a href="<?= site_url('reports/sales_margin') ?>">
                            <i class="fa fa-heart"></i><span
                                class="text"> <?= lang('sales_margin_report'); ?></span>
                        </a>
                    </li>
                <?php }?>

                <?php
               if ($GP['reports-company_bill_details']) { ?>
                <li id="reports_company_bill_details">
                <a href="<?= site_url('reports/company_bill_details') ?>">
                    <i class="fa fa-calendar-o"></i><span
                        class="text"> <?= lang('company_bill_details'); ?></span>
                </a>
              </li>
              <?php } ?>
                <?php
        if ($GP['reports-company_wise_bill']) { ?>
        <li id="reports_company_wise_bill">
            <a href="<?= site_url('reports/company_wise_bill') ?>">
                <i class="fa fa-calendar-o"></i><span
                    class="text"> <?= lang('company_wise_bill'); ?></span>
            </a>
        </li>
        <?php } ?>
                <?php

                //

                if ($GP['reports-payments']) {
                    ?>
                    <li id="reports_payments">
                        <a href="<?= site_url('reports/payments') ?>">
                            <i class="fa fa-money"></i><span
                                class="text"> <?= lang('payments_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-daily_purchases']) {
                    ?>
                    <li id="reports_daily_purchases">
                        <a href="<?= site_url('reports/daily_purchases') ?>">
                            <i class="fa fa-calendar-o"></i><span
                                class="text"> <?= lang('daily_purchases'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-monthly_purchases']) {
                    ?>
                    <li id="reports_monthly_purchases">
                        <a href="<?= site_url('reports/monthly_purchases') ?>">
                            <i class="fa fa-calendar-o"></i><span
                                class="text"> <?= lang('monthly_purchases'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-purchases']) {
                    ?>
                    <li id="reports_purchases">
                        <a href="<?= site_url('reports/purchases') ?>">
                            <i class="fa fa-star"></i><span
                                class="text"> <?= lang('purchases_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-expenses']) {
                    ?>
                    <li id="reports_expenses">
                        <a href="<?= site_url('reports/expenses') ?>">
                            <i class="fa fa-star"></i><span
                                class="text"> <?= lang('expenses_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-customers']) {
                    ?>
                    <li id="reports_customer_report">
                        <a href="<?= site_url('reports/customers') ?>">
                            <i class="fa fa-users"></i><span
                                class="text"> <?= lang('customers_report'); ?></span>
                        </a>
                    </li>
                <?php
                }
                if ($GP['reports-suppliers']) {
                    ?>
                    <li id="reports_supplier_report">
                        <a href="<?= site_url('reports/suppliers') ?>">
                            <i class="fa fa-users"></i><span
                                class="text"> <?= lang('suppliers_report'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php if ($GP['company-index'] || $GP['designation-index'] || $GP['operator-index'] || $GP['package-index'] || $GP['doctype-index'] || $GP['backups_index' ]) { ?>
        <li class="mm_system_settings">
            <a class="dropmenu" href="#">
                <i class="fa fa-cog"></i>
                <span class="text"> <?= lang('Settings'); ?> </span>
                <span class="chevron closed"></span>
            </a>
            <ul>
                <?php if ($GP['company-index']) { ?>
                    <li id="system_settings_company">
                        <a class="submenu"
                           href="<?= site_url('system_settings/company'); ?>">
                            <i class="fa fa-th"></i><span
                                class="text"> <?= lang('company'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['designation-index']) { ?>
                    <li id="mm-designation-index">
                        <a class="submenu"
                           href="<?= site_url('system_settings/designation'); ?>">
                            <i class="fa fa-th"></i><span
                                class="text"> <?= lang('designation'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['operator-index']) { ?>
                    <li id="mm-operator-index">
                        <a class="submenu"
                           href="<?= site_url('system_settings/operator'); ?>">
                            <i class="fa fa-th"></i><span
                                class="text"> <?= lang('operator'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['package-index']) { ?>
                    <li id="mm-package-index">
                        <a class="submenu"
                           href="<?= site_url('system_settings/package'); ?>">
                            <i class="fa fa-th"></i><span
                                class="text"> <?= lang('package'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($GP['doctype-index']) { ?>
                    <li id="mm-doctype-index">
                        <a class="submenu"
                           href="<?= site_url('system_settings/doctype'); ?>">
                            <i class="fa fa-th"></i><span
                                class="text"> <?= lang('doc_type'); ?></span>
                        </a>
                    </li>
                <?php } ?>
         <?php if ($GP['backups_index']) { ?>
                <li id="system_settings_backups">
                    <a href="<?= site_url('system_settings/backups') ?>">
                        <i class="fa fa-database"></i><span
                            class="text"> <?= lang('backups'); ?></span>
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
                    <li class="right_log hidden-xs">
                        <?= lang('your_ip') . ' ' . $ip_address . " <span class='hidden-sm'>( " . lang('last_login_at') . ": " . date($dateFormats['php_ldate'], $this->session->userdata('old_last_login')) . " " . ($this->session->userdata('last_ip') != $ip_address ? lang('ip:') . ' ' . $this->session->userdata('last_ip') : '') . " )</span>" ?>
                    </li>
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
