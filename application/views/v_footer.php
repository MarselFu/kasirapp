<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">Copyright &copy; 2023 <a class="text-bold-800 grey darken-2"
                href="https://www.instagram.com/marsel_fu/" target="_blank">Kasir Kita By Marcellino Fadhilah Utomo</a></span><span class="float-md-right d-none d-lg-block">
            <i class="ft-heart pink"></i> Versi Aplikasi Saat ini 0.1 (Beta Tester)<span id="scroll-top"></span></span></p>
</footer>


<script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>

<script src="<?= base_url() ?>app-assets/vendors/js/charts/chart.min.js"></script>

<script src="<?= base_url() ?>app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url() ?>app-assets/js/core/app.js"></script>
<script src="<?= base_url() ?>app-assets/js/scripts/pages/appointment.js"></script>
<script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url() ?>app-assets/js/scripts/pages/hospital-patients-list.js"></script>
<script src="<?= base_url() . '' ?>app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
<script src="<?= base_url() ?>app-assets/sweetalert/sweetalert2.all.min.js"></script>
<?php if ($this->session->flashdata('message') == 'success') : ?>
<script>
Swal.fire({
    type: 'success',
    title: 'Success',
    icon: 'success',
    text: 'Data berhasil terkirim',
    // timer: 2000,
    showConfirmButton: true
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('message') == 'error') : ?>
<script>
Swal.fire({
    type: 'error',
    title: 'Opps!',
    text: 'Data gagal terkirim!',
    // text: 'Anda akan di arahkan dalam 2 Detik',
    // timer: 2000,
    showConfirmButton: true
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('message') == 'warning') : ?>
<script>
Swal.fire({
    type: 'warning',
    title: 'Deleted!',
    icon: 'warning',
    text: 'Data berhasil terhapus..!!',
    // text: 'Anda akan di arahkan dalam 2 Detik',
    // timer: 2000,
    showConfirmButton: true
})
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('message') == 'info') : ?>
<script>
Swal.fire({
    type: 'info',
    title: 'Info!',
    icon: 'success',
    text: 'Data Berhasil Terupdate..!!',
    // text: 'Anda akan di arahkan dalam 2 Detik',
    // timer: 2000,
    showConfirmButton: true
})
</script>
<?php endif; ?>

