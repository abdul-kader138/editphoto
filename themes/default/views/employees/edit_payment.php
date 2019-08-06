<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('edit_employee_payment'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('edit_employee_payment'); ?></p>

                <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                echo form_open("employees/edit_employee_payment/" . $employee_payment->id, $attrib);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-5" >
                            <div class="form-group">
                                <?= lang("employee_id", "employee_id"); ?>
                                <?php
                                $b2[""] = lang('select') . ' ' . lang('company');
                                foreach ($employees as $employee) {
                                    $b2[$employee->employee_id] = ($employee->name.' - '.$employee->employee_id);
                                }
                                echo form_dropdown('employee_id', $b2, $employee_payment->employee_id, 'id="employee_id" required="required" class="form-control select" style="width:100%;"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('payment_payroll', 'payment_payroll'); ?>
                                <div class="controls">
                                    <?php echo form_input(array('name'=>'payment_payroll','type'=>'number','step'=>'any'), $employee_payment->payment_payroll, 'class="form-control" id="payment_payroll"  required="required" '); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('bank_account', 'bank_account'); ?>
                                <div class="controls">
                                    <?php echo form_input(array('name'=>'bank_account','type'=>'text'), $employee_payment->bank_account, 'class="form-control" id="bank_account"  required="required" '); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= lang('status', 'status'); ?>
                                <?php
                                $opt = array(1 => lang('active'), 0 => lang('inactive'));
                                echo form_dropdown('active', $opt, $employee_payment->active, 'id="active" required="required" class="form-control select" style="width:100%;"');
                                ?>
                            </div>



                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <?php echo lang('gross_salary', 'gross_salary'); ?>
                                <div class="controls">
                                    <?php echo form_input(array('name'=>'gross_salary','type'=>'number','step'=>'any'), $employee_payment->gross_salary, 'class="form-control" id="gross_salary" required="required" '); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo lang('payment_other', 'payment_other'); ?>
                                <div class="controls">
                                    <?php echo form_input(array('name'=>'payment_other','type'=>'number','step'=>'any'), $employee_payment->payment_other, 'class="form-control" id="payment_other" required="required" '); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('bank_name', 'bank_name'); ?>
                                <div class="controls">
                                    <?php $sst = array('EBL(Poultry)' => lang('EBL(Poultry)'),'EBL(Jessor)' => lang('EBL(Jessore)'));
                                    echo form_dropdown('bank_name', $sst, $employee_payment->bank_name, 'class="form-control input-tip" required="required" id="bank_name"'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <p><?php echo form_submit('edit_employee_payment', lang('edit_employee_payment'), 'class="btn btn-primary"'); ?></p>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('.no').slideUp();
        $('#group').change(function (event) {
            var group = $(this).val();
            if (group == 1 || group == 2) {
                $('.no').slideUp();
            } else {
                $('.no').slideDown();
            }
        });
    });
</script>
