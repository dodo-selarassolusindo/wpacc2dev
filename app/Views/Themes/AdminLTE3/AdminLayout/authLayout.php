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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Render additional css -->
    <?= $this->renderSection('css') ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.4/dist/css/adminlte.min.css">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="<?= base_url('assets/flag-icon-css/css/flag-icon.min.css') ?>">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
        <a href="<?=base_url() ?>">
            <img src="<?= base_url(config('Basics')->theme['sidebar']['brand']['logo']['icon']) ?>" class="brand-image img-circle elevation-<?= config('Basics')->theme['sidebar']['brand']['logo']['shadow'] ?>">
        </a>
      <b><?= config('Basics')->appName ?></b>
    </div>
    <?= $this->renderSection('content') ?>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous" defer></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous" defer></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.4/dist/js/adminlte.min.js" defer></script>

<?= $this->renderSection('additionalExternalJs') ?>

<!-- Inline Module Script -->
<script type="module">

<?php if (isset($usingSweetAlert)) { ?>
    import Toast from "<?=base_url('assets/swal/toast.js')?>";
<?php } ?>

    var theTable;
    var <?=csrf_token() ?? 'token'?>v = '<?= csrf_hash() ?>';

    document.addEventListener('DOMContentLoaded', function() {

        $('.sidebar-toggle').on('click', function(event){
            event.preventDefault();
            if( Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))){ 
                sessionStorage.setItem('sidebar-toggle-collapsed','')
            } else { 
                sessionStorage.setItem('sidebar-toggle-collapsed','1')
            }
            if (theTable != null && theTable.columns !== undefined) {
                setTimeout(function(){ 
                    theTable.columns.adjust().draw();
                }, 600);
            }
       
        });
        (function(){
            if(Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))){var body=document.getElementsByTagName('body')[0];body.className=body.className+' sidebar-collapse'}
        })()
        
        <?= $this->renderSection('additionalInlineJs') ?>

        $.ajaxSetup({headers:{'<?= config('Security')->headerName ?>':$('meta[name="<?= config('Security')->tokenName ?>"]').attr('content')}});
        
    });
</script>



</body>

</html>