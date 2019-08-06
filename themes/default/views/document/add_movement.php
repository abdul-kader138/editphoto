<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('add_movement'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?php echo lang('enter_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("document/add_movement", $attrib);

                ?>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("name", "name"); ?>
                                <?php echo form_input('name', (isset($_POST['name']) ? $_POST['name'] : ""), 'class="form-control input-tip" id="name" required="required"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("reference_no", "slref"); ?>
                                <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : ""), 'class="form-control input-tip" required="required" id="reference_no"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Document", "Document"); ?>
                                <?php
                                $wh1[''] = '';
                                foreach ($docs as $doc) {
                                    $wh1[$doc->id] = $doc->name;
                                }
                                echo form_dropdown('document_id', $wh1, (isset($_POST['document_id']) ? $_POST['document_id'] : ""), 'id="document_id" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("document") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("Application_Type", "Application_Type"); ?>
                                <?php $sst = array('New' => lang('New_Application'),'Renew Application' => lang('Renew_Application'), 'Amend' => lang('Amend'), 'Updated' => lang('Updated'));
                                echo form_dropdown('application_type', $sst, '', 'class="form-control input-tip" required="required" id="application_type"'); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Responsible_Person", "Responsible_Person"); ?>
                                <?php
                                $wh2[''] = '';
                                foreach ($employees as $employee) {
                                    $wh2[$employee->id] = $employee->name;
                                }
                                echo form_dropdown('responsible_person', $wh2, (isset($_POST['responsible_person']) ? $_POST['responsible_person'] : ""), 'id="responsible_person" class="form-control input-tip select" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("Responsible_Person") . '" required="required" style="width:100%;" ');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Processing_Fees", "Processing_Fees"); ?>
                                <?php echo form_input('processing_fees', (isset($_POST['processing_fees']) ? $_POST['processing_fees'] : ""), 'class="form-control input-tip" id="processing_fees"'); ?>
                            </div>
                        </div>




                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Notification_Date", "Notification_Date"); ?>
                                <?php echo form_input('notification_date', (isset($_POST['notification_date']) ? $_POST['notification_date'] : ""), 'class="form-control input-tip date" id="notification_date"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= lang("Expire_Date", "Expire_Date"); ?>
                                <?php echo form_input('expire_date', (isset($_POST['expire_date']) ? $_POST['expire_date'] : ""), 'class="form-control input-tip date" id="expire_date"'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= lang("document", "document") ?>
                                <input id="document" type="file" data-browse-label="<?= lang('browse'); ?>" name="document" data-show-upload="false"
                                       data-show-preview="false" class="form-control file">
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
