<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("correction_request/add", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Company", "Company"); ?>
                                <?php
                                $wh2[''] = '';
                                foreach ($companies as $company) {
                                    $wh2[$company->id] = $company->name;
                                }
                                echo form_dropdown('company_id', $wh2, (isset($_POST['company_id']) ? $_POST['company_id'] : ""), 'id="company_id" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Company") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Category", "Category"); ?>
                                <?php
                                $wh1[''] = '';
                                foreach ($doctype as $doc) {
                                    $wh1[$doc->id] = $doc->name;
                                }
                                echo form_dropdown('category_id', $wh1, (isset($_POST['category_id']) ? $_POST['category_id'] : ""), 'id="category_id" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Category") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Type", "Type"); ?>
                                <?php $ssty = array('Sales(Farm/Factory)' => lang('Sales_(Farm/Factory)'),'Sales(HeadOffice)' => lang('Sales_(HeadOffice)'),'Purchase(Farm/Factory)-Local' => lang('Purchase(Farm/Factory)_Local'),'Purchase(HeadOffice)-Local' => lang('Purchase(HeadOffice)_Local'),'Purchase(HeadOffice)-Export/Import' => lang('Purchase(HeadOffice)_-Export/Import'),'Purchase(Farm/Factory)-Export/Import' => lang('Purchase(Farm/Factory)_-Export/Import'));
                                echo form_dropdown('type', $ssty, (isset($_POST['type']) ? $_POST['type'] : ""), 'class="form-control input-tip" required="required" id="type"'); ?>

                            </div>
                        </div>



                        <div class="clearfix"></div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Title", "Title"); ?>
                                <?php echo form_input('name', (isset($_POST['name']) ? $_POST['name'] : ""), 'class="form-control input-tip" id="name" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Attachment", "document") ?>
                                <input id="document" type="file" data-browse-label="<?= lang('browse'); ?>" name="document" data-show-upload="false"
                                       data-show-preview="false" class="form-control file">
                            </div>
                        </div>

                        <div class="clearfix"></div>


                        <div class="row" id="bt">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= lang("Description", "Description"); ?>
                                        <?php echo form_textarea('description', (isset($_POST['description']) ? $_POST['description'] : ""), 'class="form-control" id="description" style="margin-top: 10px; height: 100px;"'); ?>
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
