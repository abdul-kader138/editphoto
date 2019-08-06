<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('weight_upload'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("guard/weight_upload", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">


                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("month", "month"); ?>
                                <?php
                                $opt = array("January" => "January", "February" => "February", "March" => "March", "April" => "April", "May" => "May", "June" => "June", "July" => "July", "August" => "August", "September" => "September", "October" => "October", "November" => "November", "December" => "December");
                                echo form_dropdown('month', $opt, (isset($_POST['month']) ? $_POST['month'] : ''), 'id="month"  required="required" class="form-control input-tip select" style="width:100%;"');
                                ?>
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
                    </div>
                    <div class="col-lg-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("start_date", "start_date"); ?>
                                <?php echo form_input('start_date', (isset($_POST['start_date']) ? $_POST['start_date'] : ""), 'class="form-control date" required="required" id="start_date"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("end_date", "end_date"); ?>
                                <?php echo form_input('end_date', (isset($_POST['end_date']) ? $_POST['end_date'] : ""), 'class="form-control date" required="required" id="end_date"'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        <div class="well well-sm">
                            <a href="<?php echo $this->config->base_url(); ?>assets/csv/sample_weight_upload.csv"
                               class="btn btn-primary pull-right"><i class="fa fa-download"></i> Download Sample
                                File</a>
                            <span class="text-warning"><?php echo $this->lang->line("csv1"); ?></span><br>
                            <?php echo $this->lang->line("csv2"); ?> <span
                                class="text-info">( <?= lang("Employee Code") . ', ' . lang("weight"); ?>
                                )</span> <?php echo $this->lang->line("csv3"); ?><br>
                            <!--                                <strong>-->
                            <? //= sprintf(lang('x_col_required'), 'All'); ?><!--</strong>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= lang("csv_file", "csv_file") ?>
                            <input id="csv_file" type="file" data-browse-label="<?= lang('browse'); ?>" name="userfile"
                                   required="required"
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

                <?php echo form_close(); ?>

            </div>

        </div>
    </div>
</div>

