<?php
    //  Open-Source License Information:
    /*
        The MIT License (MIT)

        Copyright (c) 2020 Ozar (https://www.ozar.net/)
        Copyright (c) 2014-2019 British Columbia Institute of Technology (https://www.bcit.ca)
        Copyright (c) 2019-2020 CodeIgniter Foundation (https://www.codeigniter.com)
        Copyright (c) 2014-2020 ColorlibHQ (https://adminlte.io)
        Copyright (c) 2019-2020 Agung Sugiarto for portions of this code (https://agungsugiarto.github.io)


        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), 
        to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
        and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
        INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
        IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
        WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

    */
?>
<!DOCTYPE html>
<html lang="<?= config('App')->defaultLocale ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">

    <title><?= isset($pageTitle) ? $pageTitle . ' | ': '' ?><?= config('Basics')->appName ?></title>
    
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.0/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="<?= base_url('assets/flag-icon-css/css/flag-icon.min.css') ?>">

    <!-- Render additional css -->
    <?= $this->renderSection('css') ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.4/dist/css/adminlte.min.css">

</head>

<body class="layout-fixed layout-navbar-fixed sidebar-mini <?= config('Basics')->theme['footer']['fixed'] ? 'layout-footer-fixed' : '' ?> <?= config('Basics')->theme['body-sm'] ? 'text-sm' : '' ?>">
<div class="wrapper">

    <!-- Navbar -->
    <?= $this->include('Themes/AdminLTE3/AdminLayout/_defaultHeaderNav') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('Themes/AdminLTE3/AdminLayout/_leftSidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?= $this->include('Themes/AdminLTE3/AdminLayout/_contentHeader') ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>

                <noscript>
                    <div class="alert alert-warning mt-3" role="alert">
                        <h4><?=lang('Basic.global.Warning')?></h4>
                        <?=lang('Basic.global.jsNeedMsg')?>
                    </div>
                </noscript>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php // Uncomment this if you want to add a sidebar on the right for manual customization
    /*   
    <!-- Control Sidebar on the right hand side -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    */ ?>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>&copy; <?= date('Y') ?> <a href="<?= config('Basics')->theme['footer']['orglink'] ?>">
        <?= config('Basics')->theme['footer']['organization']?></a>.</strong> <?=lang('Basic.global.allRightsReserved')?>
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <?= config('Basics')->appName ?>  <?=lang('Basic.global.createdWith')?> 
            <a href="https://www.ozar.net/products/codeigniterwizard?r=uapb4&layout=1&theme=alte304"><strong>CodeIgniter Wizard</strong></a> <?=lang('Basic.global.createdWithSuffix')?>
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<?= $this->renderSection('footerAdditions') ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.4/dist/js/adminlte.min.js"></script>

<?= $this->renderSection('additionalExternalJs') ?>

<!-- Inline Module Script -->
<script type="text/javascript">

    var theTable;
    var <?=csrf_token() ?? 'token'?>v = '<?= csrf_hash() ?>';

    function yeniden(andac = null) {
        if (andac == null) {
            andac = <?= csrf_token() ?>v;
        } else {
            <?= csrf_token() ?>v = andac;
        }
        $('input[name="<?= csrf_token() ?>"]').val(andac);
        $('meta[name="<?= config('Security')->tokenName ?>"]').attr('content', andac)
        $.ajaxSetup({ headers: {'<?= config('Security')->headerName ?>': andac, 'X-Requested-With': 'XMLHttpRequest' }, <?=csrf_token()?>: andac });
        
    }

    document.addEventListener('DOMContentLoaded', function() {

        $('.sidebar-toggle').on('click', function(event){
            event.preventDefault();
            if( Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))){ 
                sessionStorage.setItem('sidebar-toggle-collapsed','')
            } else { 
                sessionStorage.setItem('sidebar-toggle-collapsed','1')
            }
            if (theTable.columns !== undefined) {
                setTimeout(function(){ 
                    theTable.columns.adjust().draw();
                }, 600);
            }
        
        });
        (function(){
            if(Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))){var body=document.getElementsByTagName('body')[0];body.className=body.className+' sidebar-collapse'}
        })()

        yeniden(<?=csrf_token() ?? 'token'?>v);

        <?= $this->renderSection('additionalInlineJs') ?>

    });

</script>

</body>

</html>