<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_document'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("document/add", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Name", "Name") . '<b> *</b>'; ?>
                                <?php echo form_input('name', (isset($_POST['name']) ? $_POST['name'] : ""), 'class="form-control input-tip" id="name" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Address", "Address") . '<b> *</b>'; ?>
                                <?php echo form_input('address', (isset($_POST['address']) ? $_POST['address'] : ""), 'class="form-control input-tip" id="address" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("reference_no", "slref") . '<b> *</b>';; ?>
                                <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : $slnumber), 'class="form-control input-tip" required="required" id="reference_no"'); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Agreement_Start_Date", "Agreement_Start_Date") . '<b> *</b>'; ?>
                                <?php echo form_input('agreement_start_date', (isset($_POST['agreement_start_date']) ? $_POST['agreement_start_date'] : ""), 'class="form-control input-tip date" readonly="readonly" id="agreement_start_date" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Agreement_Expire_Date", "Agreement_Expire_Date") . '<b> *</b>'; ?>
                                <?php echo form_input('agreement_expire_date', (isset($_POST['agreement_expire_date']) ? $_POST['agreement_expire_date'] : ""), 'class="form-control input-tip date" readonly="readonly" id="agreement_expire_date" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("year", "year"); ?>
                                <?php
                                $opt = array(2016 => "2016", 2017 => "2017", 2018 => "2018", 2019 => "2019", 2020 => "2020", 2021 => "2021", 2022 => "2022", 2023 => "2023", 2024 => "2024", 2025 => "2025", 2026 => "2026", 2027 => "2027", 2028 => "2028", 2029 => "2029", 2030 => "2030");
                                echo form_dropdown('year', $opt, (isset($_POST['year']) ? $_POST['year'] : ''), 'id="year" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Commission_Type", "Commission_Type"); ?>
                                <?php
                                $bl[""] = "";
                                foreach ($brands as $brand) {
                                    $bl[$brand->id] = $brand->name;
                                }
                                echo form_dropdown('commission_id', $bl, (isset($_POST['commission_id']) ? $_POST['commission_id'] : $Settings->default_biller), 'id="company_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Commission_Type") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Target_Qty_(TON)", "Target_Qty_(TON)") . '<b> *</b>'; ?>
                                <?php
                                $att = array('name' => 'target_qty', 'type' => 'number');
                                echo form_input($att, (isset($_POST['target_qty']) ? $_POST['target_qty'] : ""), 'class="form-control input-tip" required="required" id="target_qty"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("1st_Target", "1st_Target") . '<b> *</b>'; ?>
                                <?php
                                $att = array('name' => '1_target', 'type' => 'number');
                                echo form_input($att, (isset($_POST['1_target']) ? $_POST['1_target'] : ""), 'class="form-control input-tip" required="required" id="1_target"'); ?>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("1st_Target_Commission", "1st_Target_Commission") . '<b> *</b>'; ?>
                                <?php
                                $att = array('name' => '1_target_commission', 'type' => 'number');
                                echo form_input($att, (isset($_POST['1_target_commission']) ? $_POST['1_target_commission'] : ""), 'class="form-control input-tip" required="required" id="1_target_commission"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("2nd_Target", "2nd_Target") . '<b> *</b>'; ?>
                                <?php
                                $att = array('name' => '2_target', 'type' => 'number');
                                echo form_input($att, (isset($_POST['2_target']) ? $_POST['2_target'] : ""), 'class="form-control input-tip" required="required" id="2_target"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("2nd_Target_Commission", "2nd_Target_Commission") . '<b> *</b>'; ?>
                                <?php
                                $att = array('name' => '2_target_commission', 'type' => 'number');
                                echo form_input($att, (isset($_POST['2_target_commission']) ? $_POST['2_target_commission'] : ""), 'class="form-control input-tip" required="required" id="2_target_commission"'); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Instruments", "Instruments") . '<b> *</b>'; ?>
                                <?php $sst = array('Bank Guarantee' => lang('Bank_Guarantee'), 'Cheque' => lang('Cheque'));
                                echo form_dropdown('instrument', $sst, '', 'class="form-control input-tip" required="required" id="Instrument"'); ?>

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Instrument_No", "Instrument_No") . '<b> *</b>'; ?>
                                <?php echo form_input('instrument_no', (isset($_POST['instrument_no']) ? $_POST['instrument_no'] : ""), 'class="form-control input-tip"  id="instrument_no" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Bank_Name", "Bank_Name") . '<b> *</b>'; ?>
                                <?php
                                $b2[""] = "";
                                foreach ($banks as $bank) {
                                    $b2[$bank->id] = $bank->name;
                                }
                                echo form_dropdown('instrument_bank', $b2, (isset($_POST['instrument_bank']) ? $_POST['instrument_bank'] : ""), 'id="company_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Bank_Name") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Branch_Name", "Branch_Name") . '<b> *</b>'; ?>
                                <?php echo form_input('instrument_branch', (isset($_POST['instrument_branch']) ? $_POST['instrument_branch'] : ""), 'class="form-control input-tip" id="name" required="required"'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Total_Cheque", "Total_Cheque") . '<b> *</b>'; ?>
                                <?php
                                $attbs = array('name' => 'total_cheque', 'type' => 'number');
                                echo form_input($attbs, (isset($_POST['total_cheque']) ? $_POST['total_cheque'] : ""), 'class="form-control input-tip" required="required" id="total_cheque"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Credit_Limit", "Credit_Limit") . '<b> *</b>'; ?>
                                <?php
                                $attbs = array('name' => 'credit_limit', 'type' => 'number');
                                echo form_input($attbs, (isset($_POST['credit_limit']) ? $_POST['credit_limit'] : ""), 'class="form-control input-tip" required="required" id="credit_limit"'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                        <div class="row" id="bt">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= lang("other_info", "other_info"); ?>
                                        <?php echo form_textarea('other_info', (isset($_POST['other_info']) ? $_POST['other_info'] : ""), 'class="form-control" id="other_info" style="margin-top: 10px; height: 100px;"'); ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-12">
                            <div
                                    class="fprom-group"><?php echo form_submit('add_sale', $this->lang->line("submit"), 'id="add_sale" class="btn btn-primary" style="padding: 6px 15px; margin:15px 0;"'); ?>
                                <button type="button" class="btn btn-danger" id="reset"><?= lang('reset') ?></div>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>

        </div>
    </div>
</div>
