<section class="content-header pt-2 pb-1">
    <div class="container-fluid">
        <div class="row mb-2 align-items-end">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <?= $pageTitle ?? '' ?>
                    <?php if (isset($pageSubTitle)) { ?>
                        <small class="font-weight-light ml-1 text-md"><?= $pageSubTitle ?></small>
                    <?php } ?>
                </h1>
            </div>
            <?php if (!isset($currentLocale) && current_url() != '/' && current_url() != site_url()) { ?>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right text-sm">
                    <?php $path = explode('/', uri_string()); ?>
                    <?php if (count($path) > 0) { ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>">
                            <?=lang('Basic.global.Dashboard')?>
                        </a>
                    </li>
                <?php $accuPath=''; for ($i = 0; $i < count($path); $i++) { ?>
                    <?php if ($i == count($path) - 1) { ?>
                    <li class="breadcrumb-item active"><?= mb_convert_case(lang('Basic.global.'. $path[$i]), MB_CASE_TITLE, "UTF-8") ?></li>
                    <?php } else { ?>
                        <?php $accuPath .= $path[$i].'/'.($path[$i]=='edit' ? $path[$i+1] : ''); ?>
                        <?php $segment = mb_convert_case(lang('Basic.global.'. $path[$i]), MB_CASE_TITLE, "UTF-8"); ?>
                    <li class="breadcrumb-item"><a href="<?= base_url($i > 0 ? $accuPath : $path[$i]) ?>"><?= is_numeric($path[$i]) || strpos($segment, 'Basic.global') !== false ? $path[$i] : $segment ?></a></li>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                    <li class="breadcrumb-item"><a href="<?= base_url(uri_string()) ?>"><?= str_replace('-',' ', ucfirst(uri_string())) ?></a></li>
            <?php } ?>
                </ol>
            </div>
            <?php } ?>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content-header -->