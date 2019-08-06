<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    hr.line {
        border-top: 1px solid darkslategray;
    }

</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('Add_Recruitment_Approval'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open("hrms/add_recruitment_approval", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Name", "Name") . " <b> *</b>"; ?>
                                <?php echo form_input('name', (isset($_POST['name']) ? $_POST['name'] : ""), 'class="form-control input-tip" required="required" id="name" '); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Emp_ID", "Emp_ID") . " <b> *</b>"; ?>
                                <?php echo form_input('emp_id', (isset($_POST['emp_id']) ? $_POST['emp_id'] : ""), 'class="form-control input-tip" required="required" id="emp_id" '); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Designation", "Designation") . " <b> *</b>"; ?>
                                <?php
                                $wh[''] = '';
                                foreach ($designations as $designation) {
                                    $wh[$designation->id] = $designation->name;
                                }
                                echo form_dropdown('designation_id', $wh, (isset($_POST['designation_id']) ? $_POST['designation_id'] : ""), 'id="designation_id" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Designation") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Workstation", "Workstation") . " <b> *</b>"; ?>
                                <?php echo form_input('workstation', (isset($_POST['workstation']) ? $_POST['workstation'] : ""), 'class="form-control input-tip" required="required" id="workstation" '); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Division", "Division") . " <b> *</b>"; ?>
                                <?php echo form_input('division', (isset($_POST['division']) ? $_POST['division'] : ""), 'class="form-control input-tip" required="required" id="division" '); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php $attributes = array ('class' => 'form-control input-tip','name' => 'salary', 'id' => 'salary','type'=>'number','required'=>'required');?>
                                <?= lang("Salary", "Salary") . " <b> *</b>"; ?>
                                <?php echo form_input($attributes, (isset($_POST['salary']) ? $_POST['salary'] : "")); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Gender", "Gender") . " <b> *</b>"; ?>
                                <?php $sst = array('Male' => lang('Male'), 'Female' => lang('Female'));
                                echo form_dropdown('gender', $sst, (isset($_POST['gender']) ? $_POST['gender'] : ""), 'class="form-control input-tip" required="required" id="gender" style="width:100%"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Date_Of_Interview", "Date_Of_Interview") . " <b> *</b>"; ?>
                                <?php echo form_input('date_of_interview', (isset($_POST['date_of_interview']) ? $_POST['date_of_interview'] : ""), 'class="form-control input-tip date" required="required" id="date_of_interview"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Date_Of_Join", "Date_Of_Join") . " <b> *</b>"; ?>
                                <?php echo form_input('date_of_join', (isset($_POST['date_of_join']) ? $_POST['date_of_join'] : ""), 'class="form-control input-tip date" required="required" id="date_of_join"'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Company", "Company") . " <b> *</b>"; ?>
                                <?php
                                $bl[""] = "";
                                foreach ($companies as $company) {
                                    $bl[$company->id] = $company->name;
                                }
                                echo form_dropdown('company_id', $bl, (isset($_POST['company_id']) ? $_POST['company_id'] : $Settings->default_biller), 'id="company_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("company") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Department", "Department") . " <b> *</b>"; ?>
                                <?php echo form_input('department', (isset($_POST['department']) ? $_POST['department'] : ""), 'class="form-control input-tip" required="required" id="department"'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="line">
                        <div class="row" id="bt">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= lang("Other_info", "Other_info"); ?>
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