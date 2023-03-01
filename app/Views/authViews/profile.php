<?= $this->extend($config->viewLayout ?? 'Themes/AdminLTE3/AdminLayout/defaultLayout') ?>
<?= $this->section('content') ?>

    <div class="card card-outline card-primary">

        <div class="card-header text-center">
            <h1 class="h2"><?=lang('Basic.global.UserProfile') ?></h1>
        </div>

        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="<?= $userPic ?>"
                     alt="<?=lang('Basic.global.UserProfile').' '.lang('Users.picture') ?>">
            </div>

            <h3 class="profile-username text-center"><?= $userName ?></h3>
            <p class="text-muted text-center"><?= lang('Basic.global.MemberSince') ?> <?= $joinDate ?></p>

            <?= !empty($validation->getErrors()) ? $validation->listErrors("bootstrap_style") : view("Themes/_commonPartialsBs/_alertBoxes") ?>

            <form action="<?= base_url() . route_to('user-profile') ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="userName"><?= lang('Users.username') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username"
                                       class="form-control <?= session('error.username') ? 'is-invalid' : '' ?>"
                                       value="<?= user()->username ?>" placeholder="<?= lang('users.username') ?>">
                            </div><!-- /.input group -->
                            <div class="invalid-feedback">
                                <?= session('error.username') ?>
                            </div>
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label for="firstName"><?= lang('Users.firstName') ?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-font"></span>
                                    </div>
                                </div>
                                <input type="text" id="firstName" name="first_name"
                                       class="form-control <?= session('error.first_name') ? 'is-invalid' : '' ?>"
                                       placeholder="<?= lang('Users.firstName') ?>" value="<?= $firstName ?>">
                            </div><!-- /.input group -->
                            <div class="invalid-feedback">
                                <?= session('error.first_name') ?>
                            </div>
                        </div><!-- /.form group -->
                    </div><!-- //.col-md-6 -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" id="email" name="email"
                                       class="form-control <?= session('error.email') ? 'is-invalid' : '' ?>"
                                       value="<?= user()->email ?>" placeholder="<?= lang('Auth.email') ?>">
                            </div><!-- /.input group -->
                            <div class="invalid-feedback">
                                <?= session('error.email') ?>
                            </div>
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label for="lastName"><?= lang('Users.lastName') ?></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-id-card"></span>
                                    </div>
                                </div>
                                <input type="text" id="lastName" name="last_name"
                                       class="form-control <?= session('error.last_name') ? 'is-invalid' : '' ?>"
                                       placeholder="<?= lang('Users.lastName') ?>" value="<?= $lastName ?>">
                            </div><!-- /.input group -->
                            <div class="invalid-feedback">
                                <?= session('error.last_name') ?>
                            </div>
                        </div><!-- /.form group -->
                    </div><!-- //.col-md-6 -->

                </div><!-- //.row -->

                <?= csrf_field() ?>

                <div id="accordion">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    <?= lang('Basic.global.ChangePassword') ?>?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                                <input type="password" name="password"
                                                       class="form-control <?= session('error.password') ? 'is-invalid' : '' ?>"
                                                       placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                            </div><!-- /.input-group -->
                                            <?php if (session('error.password')) { ?>
                                                <div class="invalid-feedback">
                                                    <h6><?= session('error.password') ?></h6>
                                                </div>
                                            <?php } ?>
                                        </div><!-- /.form group -->
                                     </div><!-- //.col-md-6 -->

                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="confirmPassword"><?= lang('Auth.repeatPassword') ?></label>
                                             <div class="input-group mb-3">
                                                 <div class="input-group-prepend">
                                                     <div class="input-group-text">
                                                         <span class="fas fa-lock"></span>
                                                     </div>
                                                 </div>
                                                 <input type="password" name="pass_confirm"
                                                        class="form-control <?= session('error.pass_confirm') ? 'is-invalid' : '' ?>"
                                                        placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                             </div><!-- /.input-group -->
                                                 <?php if (session('error.pass_confirm')) { ?>
                                                     <div class="invalid-feedback">
                                                         <h6><?= session('error.pass_confirm') ?></h6>
                                                     </div>
                                                 <?php } ?>

                                        </div><!-- /.form group -->
                                    </div><!-- //.col-md-6 -->
                                </div><!-- //.row -->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary"> &nbsp; <?= lang('Basic.global.Save') ?> &nbsp; </button>
                        <?php /*
                        <a href="javascript:history.back()"
                           class="btn btn-default btn-block"><?= lang('Basic.global.Cancel') ?></a>
                        */ ?>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

<?= $this->endSection() ?>