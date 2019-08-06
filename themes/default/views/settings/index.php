<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$wm = array('0' => lang('no'), '1' => lang('yes'));
$ps = array('0' => lang("disable"), '1' => lang("enable"));
?>
<script>
    $(document).ready(function () {
        <?php if(isset($message)) { echo 'localStorage.clear();'; } ?>
        var timezones = <?= json_encode(DateTimeZone::listIdentifiers(DateTimeZone::ALL)); ?>;
        $('#timezone').autocomplete({
            source: timezones
        });
        if ($('#protocol').val() == 'smtp') {
            $('#smtp_config').slideDown();
        } else if ($('#protocol').val() == 'sendmail') {
            $('#sendmail_config').slideDown();
        }
        $('#protocol').change(function () {
            if ($(this).val() == 'smtp') {
                $('#sendmail_config').slideUp();
                $('#smtp_config').slideDown();
            } else if ($(this).val() == 'sendmail') {
                $('#smtp_config').slideUp();
                $('#sendmail_config').slideDown();
            } else {
                $('#smtp_config').slideUp();
                $('#sendmail_config').slideUp();
            }
        });
        $('#overselling').change(function () {
            if ($(this).val() == 1) {
                if ($('#accounting_method').select2("val") != 2) {
                    bootbox.alert('<?=lang('overselling_will_only_work_with_AVCO_accounting_method_only')?>');
                    $('#accounting_method').select2("val", '2');
                }
            }
        });
        $('#accounting_method').change(function () {
            var oam = <?=$Settings->accounting_method?>, nam = $(this).val();
            if (oam != nam) {
                bootbox.alert('<?=lang('accounting_method_change_alert')?>');
            }
        });
        $('#accounting_method').change(function () {
            if ($(this).val() != 2) {
                if ($('#overselling').select2("val") == 1) {
                    bootbox.alert('<?=lang('overselling_will_only_work_with_AVCO_accounting_method_only')?>');
                    $('#overselling').select2("val", 0);
                }
            }
        });
        $('#item_addition').change(function () {
            if ($(this).val() == 1) {
                bootbox.alert('<?=lang('product_variants_feature_x')?>');
            }
        });
        var sac = $('#sac').val()
        if(sac == 1) {
            $('.nsac').slideUp();
        } else {
            $('.nsac').slideDown();
        }
        $('#sac').change(function () {
            if ($(this).val() == 1) {
                $('.nsac').slideUp();
            } else {
                $('.nsac').slideDown();
            }
        });
    });
</script>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-cog"></i><?= lang('system_settings'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang('update_info'); ?></p>

                <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("system_settings", $attrib);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><?= lang('site_config') ?></legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("site_name", "site_name"); ?>
                                    <?= form_input('site_name', $Settings->site_name, 'class="form-control tip" id="site_name"  required="required"'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("language", "language"); ?>
                                    <?php
                                    $lang = array(
                                        'arabic'                    => 'Arabic',
                                        'english'                   => 'English',
                                        'german'                    => 'German',
                                        'portuguese-brazilian'      => 'Portuguese (Brazil)',
                                        'simplified-chinese'        => 'Simplified Chinese',
                                        'spanish'                   => 'Spanish',
                                        'thai'                      => 'Thai',
                                        'traditional-chinese'       => 'Traditional Chinese',
                                        'turkish'                   => 'Turkish',
                                        'vietnamese'                => 'Vietnamese',
                                    );
                                    echo form_dropdown('language', $lang, $Settings->language, 'class="form-control tip" id="language" required="required" style="width:100%;"');
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="currency"><?= lang("default_currency"); ?></label>

                                    <div class="controls"> <?php
                                        foreach ($currencies as $currency) {
                                            $cu[$currency->code] = $currency->name;
                                        }
                                        echo form_dropdown('currency', $cu, $Settings->default_currency, 'class="form-control tip" id="currency" required="required" style="width:100%;"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="email"><?= lang("default_email"); ?></label>

                                    <?= form_input('email', $Settings->default_email, 'class="form-control tip" required="required" id="email"'); ?>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= lang('maintenance_mode', 'mmode'); ?>
                            <div class="controls">  <?php
                                echo form_dropdown('mmode', $wm, (isset($_POST['mmode']) ? $_POST['mmode'] : $Settings->mmode), 'class="tip form-control" required="required" id="mmode" style="width:100%;"');
                                ?> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="theme"><?= lang("theme"); ?></label>

                            <div class="controls">
                                <?php
                                $themes = array(
                                    'default' => 'Default'
                                );
                                echo form_dropdown('theme', $themes, $Settings->theme, 'id="theme" class="form-control tip" required="required" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="rtl"><?= lang("rtl_support"); ?></label>

                            <div class="controls">
                                <?php
                                echo form_dropdown('rtl', $ps, $Settings->rtl, 'id="rtl" class="form-control tip" required="required" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="captcha"><?= lang("login_captcha"); ?></label>

                            <div class="controls">
                                <?php
                                echo form_dropdown('captcha', $ps, $Settings->captcha, 'id="captcha" class="form-control tip" required="required" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="disable_editing"><?= lang("disable_editing"); ?></label>
                            <?= form_input('disable_editing', $Settings->disable_editing, 'class="form-control tip" id="disable_editing" required="required"'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="rows_per_page"><?= lang("rows_per_page"); ?></label>
                            <?= form_input('rows_per_page', $Settings->rows_per_page, 'class="form-control tip" id="rows_per_page" required="required"'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="dateformat"><?= lang("dateformat"); ?></label>

                            <div class="controls">
                                <?php
                                foreach ($date_formats as $date_format) {
                                    $dt[$date_format->id] = $date_format->js;
                                }
                                echo form_dropdown('dateformat', $dt, $Settings->dateformat, 'id="dateformat" class="form-control tip" style="width:100%;" required="required"');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="timezone"><?= lang("timezone"); ?></label>
                            <?php
                            $timezone_identifiers = DateTimeZone::listIdentifiers();
                            foreach ($timezone_identifiers as $tzi) {
                                $tz[$tzi] = $tzi;
                            }
                            ?>
                            <?= form_dropdown('timezone', $tz, TIMEZONE, 'class="form-control tip" id="timezone" required="required"'); ?>
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <div class="form-group">
                            <?= lang('reg_ver', 'reg_ver'); ?>
                            <div class="controls">  <?php
                                echo form_dropdown('reg_ver', $wm, (isset($_POST['reg_ver']) ? $_POST['reg_ver'] : $Settings->reg_ver), 'class="tip form-control" required="required" id="reg_ver" style="width:100%;"');
                                ?> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= lang('allow_reg', 'allow_reg'); ?>
                            <div class="controls">  <?php
                                echo form_dropdown('allow_reg', $wm, (isset($_POST['allow_reg']) ? $_POST['allow_reg'] : $Settings->allow_reg), 'class="tip form-control" required="required" id="allow_reg" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= lang('reg_notification', 'reg_notification'); ?>
                            <div class="controls">  <?php
                                echo form_dropdown('reg_notification', $wm, (isset($_POST['reg_notification']) ? $_POST['reg_notification'] : $Settings->reg_notification), 'class="tip form-control" required="required" id="reg_notification" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"
                                   for="restrict_calendar"><?= lang("calendar"); ?></label>

                            <div class="controls">
                                <?php
                                $opt_cal = array(1 => lang('private'), 0 => lang('shared'));
                                echo form_dropdown('restrict_calendar', $opt_cal, $Settings->restrict_calendar, 'class="form-control tip" required="required" id="restrict_calendar" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                    </div>
                    </fieldset>

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><?= lang('money_number_format') ?></legend>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="decimals"><?= lang("decimals"); ?></label>

                                <div class="controls"> <?php
                                    $decimals = array(0 => lang('disable'), 1 => '1', 2 => '2', 3 => '3', 4 => '4');
                                    echo form_dropdown('decimals', $decimals, $Settings->decimals, 'class="form-control tip" id="decimals"  style="width:100%;" required="required"');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="qty_decimals"><?= lang("qty_decimals"); ?></label>

                                <div class="controls"> <?php
                                    $qty_decimals = array(0 => lang('disable'), 1 => '1', 2 => '2', 3 => '3', 4 => '4');
                                    echo form_dropdown('qty_decimals', $qty_decimals, $Settings->qty_decimals, 'class="form-control tip" id="qty_decimals"  style="width:100%;" required="required"');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang('sac', 'sac'); ?>
                                <?= form_dropdown('sac', $ps, set_value('sac', $Settings->sac), 'class="form-control tip" id="sac"  required="required"'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="nsac">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="decimals_sep"><?= lang("decimals_sep"); ?></label>

                                    <div class="controls"> <?php
                                        $dec_point = array('.' => lang('dot'), ',' => lang('comma'));
                                        echo form_dropdown('decimals_sep', $dec_point, $Settings->decimals_sep, 'class="form-control tip" id="decimals_sep"  style="width:100%;" required="required"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="thousands_sep"><?= lang("thousands_sep"); ?></label>
                                    <div class="controls"> <?php
                                        $thousands_sep = array('.' => lang('dot'), ',' => lang('comma'), '0' => lang('space'));
                                        echo form_dropdown('thousands_sep', $thousands_sep, $Settings->thousands_sep, 'class="form-control tip" id="thousands_sep"  style="width:100%;" required="required"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang('display_currency_symbol', 'display_symbol'); ?>
                                <?php $opts = array(0 => lang('disable'), 1 => lang('before'), 2 => lang('after')); ?>
                                <?= form_dropdown('display_symbol', $opts, $Settings->display_symbol, 'class="form-control" id="display_symbol" style="width:100%;" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang('currency_symbol', 'symbol'); ?>
                                <?= form_input('symbol', $Settings->symbol, 'class="form-control" id="symbol" style="width:100%;"'); ?>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border"><?= lang('email') ?></legend>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="protocol"><?= lang("email_protocol"); ?></label>

                                <div class="controls"> <?php
                                    $popt = array('mail' => 'PHP Mail Function', 'sendmail' => 'Send Mail', 'smtp' => 'SMTP');
                                    echo form_dropdown('protocol', $popt, $Settings->protocol, 'class="form-control tip" id="protocol"  style="width:100%;" required="required"');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" id="sendmail_config" style="display: none;">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="mailpath"><?= lang("mailpath"); ?></label>

                                        <?= form_input('mailpath', $Settings->mailpath, 'class="form-control tip" id="mailpath"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" id="smtp_config" style="display: none;">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="smtp_host"><?= lang("smtp_host"); ?></label>

                                        <?= form_input('smtp_host', $Settings->smtp_host, 'class="form-control tip" id="smtp_host"'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="smtp_user"><?= lang("smtp_user"); ?></label>

                                        <?= form_input('smtp_user', $Settings->smtp_user, 'class="form-control tip" id="smtp_user"'); ?> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="smtp_pass"><?= lang("smtp_pass"); ?></label>

                                        <?= form_password('smtp_pass', $smtp_pass, 'class="form-control tip" id="smtp_pass"'); ?> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="smtp_port"><?= lang("smtp_port"); ?></label>

                                        <?= form_input('smtp_port', $Settings->smtp_port, 'class="form-control tip" id="smtp_port"'); ?> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"
                                               for="smtp_crypto"><?= lang("smtp_crypto"); ?></label>

                                        <div class="controls"> <?php
                                            $crypto_opt = array('' => lang('none'), 'tls' => 'TLS', 'ssl' => 'SSL');
                                            echo form_dropdown('smtp_crypto', $crypto_opt, $Settings->smtp_crypto, 'class="form-control tip" id="smtp_crypto"');
                                            ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                </div>
            </div>
            <div style="clear: both; height: 10px;"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?= form_submit('update_settings', lang("update_settings"), 'class="btn btn-primary"'); ?>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>
