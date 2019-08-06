<link rel="stylesheet" type="text/css"
      href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link href="<?= $assets ?>elFinder/css/elfinder.min.css" rel="stylesheet"/>
<link href="<?= $assets ?>elFinder/themes/windows-10/css/theme-gray.css" rel="stylesheet"/>

<script type="text/javascript" src="<?= $assets ?>elFinder/js/elfinder.min.js"></script>
<?php
?>
<style>
    .ui-dialog{
        background-color: #dbdee0;
    }
</style>
<script type="text/javascript" charset="utf-8">

        $().ready(function () {
            window.setTimeout(function () {
                var locale = "<?= $languages->code;?>";
                var _locale = locale;
                if (locale == 'pt') {
                    _locale = 'pt_BR';
                }
                var elf = $('#elfinder').elfinder({
                    // lang: 'ru',             // language (OPTIONAL)
                    url: '<?= site_url()?>document/elfinder_init',  // connector URL (REQUIRED)
                    lang: _locale,
                    height: 700,
                    uiOptions: {
                        // toolbar configuration

                        toolbar: [
                            ['back', 'forward'],
                            ['mkdir', 'upload'],
                            ['info'],
                            ['quicklook'],
                            ['copy','paste'],
                            ['rm'],
                            ['duplicate', 'rename', 'edit', 'resize'],
                            ['extract', 'archive'],
                            ['search'],
                            ['view'],
                        ],
                    }

                }).elfinder('instance');
            }, 200);
        });
</script>

<!-- Element where elFinder will be created (REQUIRED) -->
<div class="panel panel-custom">
        <div id="elfinder" style="background-color:ghostwhite"></div>
    </div>

</div>