<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <script type="text/javascript">if (parent.frames.length !== 0) {
            top.location = '<?=site_url('pos')?>';
        }</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>styles/theme.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/helpers/login.css" rel="stylesheet"/>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= $assets ?>js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login-page">
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p>
                <strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.
            </p>
        </div>
    </div>
</noscript>
<div class="page-back">
    <div class="text-center">
        <?php if ($Settings->logo2) {
            echo '<img src="' . base_url('assets/uploads/logos/' . $Settings->logo2) . '" alt="' . $Settings->site_name . '" style="margin-bottom:10px;" />';
        } ?>
    </div>

    <div id="login">
        <div class=" container">

            <div class="login-form-div">
                <div class="login-content">
                    <?php if ($Settings->mmode) { ?>
                        <div class="alert alert-warning">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <?= lang('site_is_offline') ?>
                        </div>
                        <?php
                    }
                    if ($error) {
                        ?>
                        <div class="alert alert-danger">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <ul class="list-group"><?= $error; ?></ul>
                        </div>
                        <?php
                    }
                    if ($message) {
                        ?>
                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <ul class="list-group"><?= $message; ?></ul>
                        </div>
                        <?php
                    }
                    if ($this->session->userdata('message')) {
                    ?>
                    <div class="alert alert-success">
                        <button data-dismiss="alert" class="close" type="button">×</button>
                        <ul class="list-group"><?= $this->session->userdata('message'); ?></ul>
                    </div>
                    <?php
                    }
                    ?>

                    <?php echo form_open("auth/login", 'class="login" data-toggle="validator"'); ?>
                    <div class="div-title col-sm-12">
                        <h3 class="text-primary"><?= lang('login_to_your_account') ?></h3>
                    </div>
                    <div class="col-sm-12">
                        <div class="textbox-wrap form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" value="<?= DEMO ? 'owner@tecdiary.com' : ''; ?>" required="required"
                                       class="form-control" name="identity"
                                       placeholder="<?= lang('username') ?>"/>
                            </div>
                        </div>
                        <div class="textbox-wrap form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" value="<?= DEMO ? '12345678' : ''; ?>" required="required"
                                       class="form-control " name="password"
                                       placeholder="<?= lang('pw') ?>"/>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($Settings->captcha) {
                        ?>
                        <div class="col-sm-12">
                            <div class="textbox-wrap form-group">
                                <div class="row">
                                    <div class="col-sm-6 div-captcha-left">
                                        <span class="captcha-image"><?php echo $image; ?></span>
                                    </div>
                                    <div class="col-sm-6 div-captcha-right">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <a href="<?= base_url(); ?>auth/reload_captcha"
                                                       class="reload-captcha">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                </span>
                                            <?php echo form_input($captcha); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } /* echo $recaptcha_html; */
                    ?>

                    <div class="form-action col-sm-12">
                        <div class="checkbox pull-left">
                            <div class="custom-checkbox">
                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                            </div>
                            <span class="checkbox-text pull-left"><label
                                        for="remember"><?= lang('remember_me') ?></label></span>
                        </div>
                        <button type="submit" class="btn btn-success pull-right"><?= lang('login') ?> &nbsp; <i
                                    class="fa fa-sign-in"></i></button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="clearfix"></div>
                </div>
                <div class="login-form-links link1">
                    <h4 class="text-info"><?= lang('dont_have_account') ?></h4>
                    <span><?= lang('no_worry') ?></span>
                    <a href="<?php echo site_url('signup')?>" class="text-info register_link">
                        <?= lang('click_here') ?></a>
                    <span><?= lang('to_register') ?></span>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= $assets ?>js/jquery.js"></script>
<script src="<?= $assets ?>js/bootstrap.min.js"></script>
<script src="<?= $assets ?>js/jquery.cookie.js"></script>
<script src="<?= $assets ?>js/login.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        localStorage.clear();
        var hash = window.location.hash;
        if (hash && hash != '') {
            $("#login").hide();
            $(hash).show();
        }
    });
</script>
</body>
</html>
