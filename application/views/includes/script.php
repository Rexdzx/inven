<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= site_url('/assets/js/jquery.min.js') ?>"></script>
<script src="<?= site_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= site_url('assets/js/jquery.easing.min.js') ?>"></script>
<script src="<?= site_url('/assets/js/script.js') ?>"></script>
<script>
function confirmDelete(event) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: 'Apakah Anda Yakin Hapus Data Ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonText: 'Hapus',
        confirmButtonColor: 'red'
    }).then(dialog => {
        if (dialog.isConfirmed) {
            window.location.assign(event.dataset.deleteUrl)
        }
    })
}
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
</script>

<?php if($this->session->flashdata('success')) : ?>
<script>
//flash message
Swal.fire({
    type: "success",
    icon: "success",
    title: "BERHASIL!",
    text: "<?= $this->session->flashdata('success') ?>",
    timer: 1500,
    showConfirmButton: false,
    showCancelButton: false,
    buttons: false,
});
</script>
<?php endif ?>

<?php if($this->session->flashdata('failed')) : ?>
<script>
Toast.fire({
    icon: 'error',
    title: '<?= $this->session->flashdata('failed') ?>'
})
</script>
<?php endif ?>