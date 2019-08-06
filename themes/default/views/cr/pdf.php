<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->lang->line('Document') . ' ' . $document->reference_no; ?></title>
    <link href="<?= $assets ?>styles/helpers/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet">
    <style type="text/css">
        html, body {
            height: 100%;
            background: #FFF;
        }

        body:before, body:after {
            display: none !important;
        }

        .table th {
            text-align: center;
            padding: 5px;
        }

        .table td {
            padding: 4px;
        }

        div {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="myModalLabel" style="color: #00A0C6; text-align:center">Correction Request Details - <?= $document->reference_no; ?></h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped ">
                                    <tbody>
                                    <tr>
                                        <td style="width: 30%"><b><?= lang("Company"); ?>:</b></td>
                                        <td style="width: 70%"><?= $companies->name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b><?= lang("Category"); ?>:</b></td>
                                        <td style="width: 70%"><?= $dcotype->name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b><?= lang("Title"); ?>:</b></td>
                                        <td style="width: 70%"><?= $document->name; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                    <tr>
                                        <td style="width: 30%"><b><?= lang("Type"); ?>:</b></td>
                                        <td style="width: 70%"><?= $document->type;?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%"><b><?= lang("Status"); ?>:</b></td>
                                        <td style="width: 70%"><?= $document->status;?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php if ($document->description) { ?>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th colspan="2">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="2"><?= $document->description; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>


                </div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                            <tr>
                                <?php for($i = 0, $l = count($footer); $i < $l; ++$i){
                                    $divi=((12/$l)*20);
                                    ?>
                                    <td><div>
                                            <p>&nbsp;</p>
                                            <p><?php echo ((!empty($footer[$i]['username'])) ? ucwords($footer[$i]['username']) : "-------------".'</br>');?></p>
                                            <p style="border-top: 1px solid #000;"><?php echo $footer[$i]['approver_type']?></p>
                                        </div></td>
                                    <td colspan="<?php echo $divi; ?>">&nbsp;&nbsp;&nbsp;</td>
                                <?php }?>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>