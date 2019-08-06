<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_employee'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("employees/employee_by_csv", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("company_name", "company_name"); ?>
                                    <?php
                                    $bl[""] = "";
                                    foreach ($companies as $company) {
                                        $bl[$company->id] = $company->name;
                                    }
                                    echo form_dropdown('company_id', $bl, (isset($_POST['company_id']) ? $_POST['company_id'] :''), 'id="company_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("company_name") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                    ?>
                                </div>
                            </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("operator_name", "operator_name"); ?>
                                <?php
                                $b2[""] = "";
                                foreach ($operators as $operator) {
                                    $b2[$operator->id] = $operator->name;
                                }
                                echo form_dropdown('operator_id', $b2, (isset($_POST['operator_id']) ? $_POST['operator_id'] : ''), 'id="operator_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("operator_name") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("package_name", "package_name"); ?>
                                <?php
                                $b3[""] = "";
                                foreach ($packages as $package) {
                                    $b3[$package->id] = $package->name;
                                }
                                echo form_dropdown('package_id', $b3, (isset($_POST['package_id']) ? $_POST['package_id'] : ''), 'id="package_id" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("package_name") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="clearfix"></div>
                            <div class="well well-sm">
                                <a href="<?php echo $this->config->base_url(); ?>assets/csv/sample_employee_upload.csv"
                                   class="btn btn-primary pull-right"><i class="fa fa-download"></i> Download Sample
                                    File</a>
                                <span class="text-warning"><?php echo $this->lang->line("csv1"); ?></span><br>
                                <?php echo $this->lang->line("csv2"); ?> <span
                                    class="text-info">( <?= lang("Employee Code") . ', ' . lang("name") . ', ' . lang("email") . ', ' . lang("mobile_no") . ', ' . lang("ceiling_amount") . ', ' . lang("credit_limit") . ', ' . lang("designation_code").', ' . lang("service_start_date"); ?> )</span> <?php echo $this->lang->line("csv3"); ?><br>
<!--                                <strong>--><?//= sprintf(lang('x_col_required'), 'All'); ?><!--</strong>-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("csv_file", "csv_file") ?>
                                <input id="csv_file" type="file" data-browse-label="<?= lang('browse'); ?>" name="userfile" required="required"
                                       data-show-upload="false" data-show-preview="false" class="form-control file">
                            </div>
                        </div>
                        <div class="clearfix"></div>

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

