<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    hr.line {
        border-top: 1px solid darkslategray;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('Edit_Manpower_Requisition'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("hrms/edit_manpower_requisition/" . $document->id, $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Requisition_Date", "Requisition_Date") . " <b> *</b>"; ?>
                                <?php echo form_input('requisition_date', $this->sma->hrld_date($document->requisition_date), 'class="form-control input-tip date" readonly required="required" id="requisition_date"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Position", "Position") . "<b> *</b>"; ?>
                                <?php $sst = array('Lead' => lang('Lead'), 'Process Owner' => lang('Process_Owner'), 'Associate' => lang('Associate'),'Staff'=>lang('Staff'));
                                echo form_dropdown('position', $sst, $document->position, 'class="form-control input-tip" required="required" id="position" style="width:100%"'); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Company", "Company") . " <b> *</b>"; ?>
                                <?php
                                $bl[""] = "";
                                foreach ($companies as $company) {
                                    $bl[$company->id] = $company->name;
                                }
                                echo form_dropdown('company_id', $bl, $document->company_id, 'id="company_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("company") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Department", "Department") . " <b> *</b>"; ?>
                                <?php echo form_input('department', $document->department, 'class="form-control input-tip" required="required" id="department" '); ?>
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
                                echo form_dropdown('designation_id', $wh, $document->designation_id, 'id="designation_id" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Designation") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Workstation", "Workstation") . " <b> *</b>"; ?>
                                <?php echo form_input('workstation', $document->workstation, 'class="form-control input-tip" required="required" id="workstation" '); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Corporate/Business", "Corporate/Business") . "<b> *</b>"; ?>
                                <?php $sst = array('Corporate' => lang('Corporate'), 'Business' => lang('Business'));
                                echo form_dropdown('organization_type', $sst, $document->organization_type, 'class="form-control input-tip" required="required" id="organization_type" style="width:100%"'); ?>

                            </div>
                        </div>
                        <div class="col-sm-4"
                             id="corporate_name_div" <?php echo((!$document->corporate_name == "") ? "" : 'style="display:none"'); ?>>
                            <div class="form-group">
                                <?= lang("Corporate_Name", "Corporate_Name") . " <b> *</b>"; ?>
                                <?php echo form_input('corporate_name', $document->corporate_name, 'class="form-control input-tip" id="corporate_name" '); ?>
                            </div>
                        </div>
                        <div class="col-sm-4"
                             id="business_name_div" <?php echo((!$document->business_name == "") ? "" : 'style="display:none"'); ?>>
                            <div class="form-group">
                                <?= lang("Business_Name", "Business_Name") . " <b> *</b>"; ?>
                                <?php $sst = array('Feed' => lang('Feed'), 'Poultry' => lang('Poultry'), 'Plast Fiber' => lang('Plast_Fiber'), 'Plastic' => lang('Plastic'),'Consumer Food' => lang('Consumer_Food'),'Horticulture' => lang('Horticulture'),'Tea States' => lang('Tea_States'));
                                echo form_dropdown('business_name', $sst, $document->business_name, 'class="form-control input-tip"  id="business_name" style="width:100%"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php $attributes = array ('class' => 'form-control input-tip','name' => 'number_required', 'id' => 'number_required','type'=>'number','required'=>'required');?>
                                <?= lang("Number_Required", "Number_Required") . " <b> *</b>"; ?>
                                <?php echo form_input($attributes, $document->number_required); ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-6">
                            <div class="combo">

                                <div class="control-group table-group">
                                    <label class="table-label"
                                           for="combo"><?= lang("Required_Experience") . " <b> *</b>"; ?></label>
                                    <div class="controls table-controls">
                                        <table id="prTable"
                                               class="table items table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang('Minimum(Years)'); ?></th>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang("Maximum(Years)"); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>
                                                    <?php $attributes = array ('class' => 'form-control input-tip','name' => 'exp_min', 'id' => 'exp_min','type'=>'number','required'=>'required');?>
                                                    <?php echo form_input($attributes,  $document->exp_min); ?>
                                                </th>
                                                <th>
                                                    <?php $attributes = array ('class' => 'form-control input-tip','name' => 'exp_max', 'id' => 'exp_max','type'=>'number','required'=>'required');?>
                                                    <?php echo form_input($attributes, $document->exp_max); ?>
                                                </th>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="combo">

                                <div class="control-group table-group">
                                    <label class="table-label"
                                           for="combo"><?= lang("Age_Limit") . " <b> *</b>"; ?></label>
                                    <div class="controls table-controls">
                                        <table id="prTable"
                                               class="table items table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang('Minimum(Years)'); ?></th>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang("Maximum(Years)"); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>
                                                    <?php $attributes = array ('class' => 'form-control input-tip','name' => 'age_min', 'id' => 'age_min','type'=>'number','required'=>'required');?>
                                                    <?php echo form_input($attributes, $document->age_min); ?>
                                                </th>
                                                <th>
                                                    <?php $attributes = array ('class' => 'form-control input-tip','name' => 'age_max', 'id' => 'age_max','type'=>'number','required'=>'required');?>
                                                    <?php echo form_input($attributes, $document->age_max); ?>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="line">
                        <div class="col-sm-6">
                            <h3 class="table-label"
                                for="combo"><b>Please choose the appropriate option for requirement:</b></H3>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="ap" value="ap"
                                       name="requirement" <?php echo(($document->ap == '1') ? "checked" : ""); ?>>
                                <label class="form-check-label"
                                       for="ap"><?= lang('Additional_Position') ?></label>

                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rr" value="rr"
                                       name="requirement" <?php echo(($document->rr == '1') ? "checked" : ""); ?>>
                                <label class="form-check-label"
                                       for="materialChecked"><?= lang('Replacement_Due_To_Resignation') ?></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rt" value="rt"
                                       name="requirement" <?php echo(($document->rt == '1') ? "checked" : ""); ?>>
                                <label class="form-check-label"
                                       for="materialChecked"><?= lang('Replacement_Due_To_Termination') ?></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rp" value="rp"
                                       name="requirement" <?php echo(($document->rp == '1') ? "checked" : ""); ?>>
                                <label class="form-check-label"
                                       for="materialChecked"><?= lang('Replacement_Due_To_Promotion') ?></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="rtr" value="rtr"
                                       name="requirement" <?php (($document->rtr == '1') ? "checked" : ""); ?>>
                                <label class="form-check-label"
                                       for="materialChecked"><?= lang('Replacement_Due_To_Transfer') ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <b>Is the position as per the approved manpower budget & approved manpower plan </b>
                                <?php
//                                $opt = array(2019 => "2019", 2020 => "2020", 2021 => "2021", 2022 => "2022", 2023 => "2023", 2024 => "2024", 2025 => "2025", 2026 => "2026", 2027 => "2027", 2028 => "2028", 2029 => "2029", 2030 => "2030");
                                $opt = array("Yes" => "Yes", "No" => "No");
                                echo form_dropdown('mb_year', $opt, $document->mb_year, 'id="mb_year" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>

                            <div class="form-group">
                                <b>Reason for additional position requisition</b>
                                <?php echo form_input('reason_ap', $document->reason_ap, 'class="form-control input-tip" id="reason_ap" required="required"'); ?>

                            </div>
                            <div class="form-group">
                                <b>Time limit within which the position is to be held</b>
                                <?php echo form_input('time_limit', $document->time_limit, 'class="date form-control input-tip" readonly id="time_limit" required="required"'); ?>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="line">
                        <div class="col-sm-12">
                            <div class="combo">

                                <div class="control-group table-group">
                                    <label class="table-label"
                                           for="combo"><?= lang("In Case of New/Additional Position Requirement"); ?>
                                        <br><?= lang("Qualification Required:"); ?></label>
                                    <div class="controls table-controls">
                                        <table id="prTable"
                                               class="table items table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang('Education'); ?></th>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang("Skill"); ?></th>
                                                <th class="col-md-4 col-sm-4 col-xs-4"><?= lang("Nature_Of_Experience"); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th> <?php echo form_input('education', $document->education, 'class="form-control input-tip" id="education"'); ?>
                                                </th>
                                                <th><?php echo form_input('skill', $document->skill, 'class="form-control input-tip" id="skill"'); ?></th>
                                                <th><?php echo form_input('nature_experience', $document->nature_experience, 'class="form-control input-tip" id="nature_experience"'); ?></th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" id="bt">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= lang("Areas_Of_Responsibility", "Areas_Of_Responsibility"); ?>
                                        <?php echo form_textarea('areas_of_responsibility', $document->areas_of_responsibility, 'class="form-control" id="areas_of_responsibility" required="required" style="margin-top: 10px; height: 100px;"'); ?>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Reporting_to", "Reporting_to") . " <b> *</b>"; ?>
                                <?php echo form_input('reporting_to', $document->reporting_to, 'class="form-control input-tip" id="reporting_to" required="required" '); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("No_oF_Reportees", "No_oF_Reportees") . " <b> *</b>"; ?>
                                <?php $attributes = array ('class' => 'form-control input-tip','name' => 'no_of_reportees', 'id' => 'no_of_reportees','type'=>'number','required'=>'required');?>
                                <?php echo form_input($attributes, $document->no_of_reportees); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Gender", "Gender") . "<b> *</b>"; ?>
                                <?php $sst = array('Male' => lang('Male'), 'Female' => lang('Female'));
                                echo form_dropdown('gender', $sst,$document->gender, 'class="form-control input-tip" required="required" id="gender" style="width:100%"'); ?>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="line">
                        <div class="row" id="bt">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= lang("Other_info", "Other_info"); ?>
                                        <?php echo form_textarea('other_info', $document->other_info, 'class="form-control" id="other_info" style="margin-top: 10px; height: 100px;"'); ?>
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
<script>
    $('#organization_type').on('change', function () {
        if (this.value === 'Corporate') {
            $('#corporate_name_div').show();
            $('#business_name_div').hide();
        }
        if (this.value === 'Business') {
            $('#corporate_name_div').hide();
            $('#business_name_div').show();
        }
    });
</script>