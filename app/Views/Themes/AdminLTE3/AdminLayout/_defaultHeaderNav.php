<!-- Navbar -->
<!--<nav class="main-header navbar navbar-expand navbar-white navbar-light">-->
<nav class="main-header navbar navbar-expand navbar-<?= config('Basics')->theme['navbar']['bg'] ?> navbar-<?= config('Basics')->theme['navbar']['type'] ?> <?= config('Basics')->theme['navbar']['type'] ? '' : 'border-bottom-0' ?>">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link sidebar-toggle" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= route_to('/') ?>" class="nav-link"><?=lang('Basic.global.Home')?></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="https://www.ozar.net/products/codeigniterwizard/sample?r=uap421b4ml&layout=1&theme=alte304" class="nav-link"><?=lang('Basic.global.About')?></a>
        </li>
    </ul>

    <!-- Right navbar links can be defined here -->
    <ul class="navbar-nav ml-auto">
        <!-- Language Dropdown Menu Placeholder -->
<?php if (config('Basics')->authImplemented && config('Basics')->theme['sidebar']['user']['visible']  ) { ?>
    <?php if (logged_in() ) { ?>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?=site_url(user()->picture ?? 'assets/generic-user-avatar.png') ?>" class="user-image img-circle elevation-2"
                        alt="<?= user()->fullName ?> picture">
                <?php // uncomment the below block if you would like to show the user's name
                /*
                <span class="d-none d-md-inline"><?= user()->fullName ?></span>
                */ ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?=site_url(user()->picture ?? 'assets/generic-user-avatar.png') ?>" class="img-circle elevation-2" alt="<?=user()->fullName ?> picture">
                    <p>
                        <?=user()->fullName ?>
                        <small><?=lang('Basic.global.MemberSince') ?> <?= date('j F Y', strtotime(user()->created_at)) ?></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?= route_to('user-profile') ?>" class="btn btn-default btn-flat"><?=lang('Basic.global.Profile') ?></a>
                    <a href="<?= route_to('logout') ?>" class="btn btn-default btn-flat float-right"><?=lang('Basic.global.SignOut') ?></a>
                </li>
            </ul>
        </li>
    <?php } else { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <?=lang('Basic.global.Members')?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="<?= route_to('login') ?>" class="dropdown-item"><?=lang('Auth.signIn')?></a>
            <a href="<?= route_to('register') ?>" class="dropdown-item"><?=lang('Auth.register')?></a>
            </div>
        </li>
    <?php } ?>
<?php } ?>
    </ul>

</nav>
<!-- /.navbar -->