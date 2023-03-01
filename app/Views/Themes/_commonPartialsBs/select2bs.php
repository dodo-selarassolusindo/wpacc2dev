<!-- Push section css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<?= $this->endSection() ?>

<!-- Push section js -->
<?= $this->section('additionalExternalJs') ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<?= $this->endSection() ?>


<?= $this->section('additionalInlineJs') ?>
    
            $('.select2bs').select2({
                allowClear: false,
            });
       
<?= $this->endSection() ?>