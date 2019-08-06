<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    a.folder  {
        color: #F8D789;
        font-size: 16px;;
        text-decoration-color: #000810;
    }

    a.folder span {
        color: #808080;
    }
    a.file  {
        color: #647182;
        font-size: 14px;;
        font-color: #000810;
    }
    a:hover
    {
        color:#00A0C6;
        text-decoration:none;
        cursor:pointer;
    }
</style>
<div class="box">
<div class="box-header">
    <h2 class="blue"><i class="fa-fw fa fa-search"></i><?= lang('File_Explorer'); ?></h2>
</div>
<div class="box-content">

<div class="row">
    <?php
    $prefix = $output_folder['controller'].'/'.$output_folder['virtual_root'].'/'.$output_folder['path_in_url'];
    $prefix_download = "assets/uploads/".$output_folder['path_in_url'];
    if (!empty($output_folder['dirs'])){
        echo '<div class="col-md-12">';
        foreach( $output_folder['dirs'] as $dir ){
            echo '<div class="col-md-3">';
            echo anchor($prefix.$dir['name'], '<i class="fa fa-folder"></i><span><b> '.$dir['name'].'</b></span><br/>',array('class' => 'folder'));
            echo"</div>";
        }
        echo"</div>";
    }
?>
    <div class="col-md-12">
        <hr/><br/></div>
    <br/>
<?php
    if (!empty($output_folder['files'])) {
        echo '<div class="col-md-12">';
        foreach( $output_folder['files'] as $file ){
            echo '<div class="col-md-4">';
            echo anchor($prefix_download.$file['name'], '<i class="fa fa-file"></i><b> '.$file['name'].'</b><br/>',array('class' => 'file','download'=>'download'));
            echo"</div>";
    }
        echo"</div>";
    }
//        echo anchor($prefix.$output_folder[$file]['name'], $file['name']).'<br>';
    ?>
    <div class="col-md-12">
        <br/><hr/></div>
    <br/>
</div>
</div>
</div>
