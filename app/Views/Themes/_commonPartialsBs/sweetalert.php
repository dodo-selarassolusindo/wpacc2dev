<!-- Push section css -->
<?= $this->section('css') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.2/dist/sweetalert2.min.css">
<?= $this->endSection() ?>



<!-- Push section js -->
<?= $this->section('additionalExternalJs') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.2/dist/sweetalert2.all.min.js"></script>
<?= $this->endSection() ?>



<?= $this->section('additionalInlineJs') ?>

var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 6000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

<?php if (session('sweet-success')) { ?>
      Toast.fire({
          icon: 'success',
          title: '<?= session('sweet-success.') ?>'
      });
  <?php } ?>
  <?php if (session('sweet-warning')) { ?>
      Toast.fire({
          icon: 'warning',
          title: '<?= session('sweet-warning.') ?>'
      });
  <?php } ?>
  <?php if (session('sweet-error')) { ?>
      Toast.fire({
          icon: 'error',
          title: '<?= session('sweet-error.') ?>'
      });
  <?php } ?>

<?= $this->endSection() ?>