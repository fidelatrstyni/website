<footer class="main-footer">
    <strong>Copyright &copy; 2021 Khallila Enterprise.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!--aside class="control-sidebar control-sidebar-dark">
</aside-->

</div>

<script src="<?php echo base_url('template/plugins/jquery/jquery.min.js')?>"></script>

<script src="<?php echo base_url('template/plugins/jquery-ui/jquery-ui.min.js')?>"></script>

<script>
$.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?php echo base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<script src="<?php echo base_url('template/plugins/chart.js/Chart.min.js')?>"></script>

<script src="<?php echo base_url('template/plugins/sparklines/sparkline.js')?>"></script>

<script src="<?php echo base_url('template/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?php echo base_url('template/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>

<script src="<?php echo base_url('template/plugins/jquery-knob/jquery.knob.min.js')?>"></script>

<script src="<?php echo base_url('template/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('template/plugins/daterangepicker/daterangepicker.js')?>"></script>

<script src="<?php echo base_url('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>">
</script>

<script src="<?php echo base_url('template/plugins/summernote/summernote-bs4.min.js')?>"></script>

<script src="<?php echo base_url('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>

<script src="<?php echo base_url('template/dist/js/adminlte.js?v=3.2.0')?>"></script>

<script src="<?php echo base_url('template/dist/js/demo.js')?>"></script>

<script src="<?php echo base_url('template/dist/js/pages/dashboard.js')?>"></script>

<script src="<?php echo base_url('bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')?>"></script>

<script src="<?php echo base_url('sweetAlert/dist/sweetalert2.all.js')?>"></script>

<!-- Sweet Alert Alamat -->
<script>
$(document).ready(function() {

    // get Edit Alamat
    $('.btn-editMakanan').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.id_data').val(id);
        $('.id_user').val(id_user);
        $('.nama_penerima').val(nama_penerima);
        $('.alamat').val(alamat);
        $('.kota').val(kota);
        $('.kode_pos').val(kode_pos);
        $('.no_tlp').val(no_tlp);
        $('.status').val(status);
        // Call Modal Edit
        $('#editModalAlamat').modal('show');
    });

});
</script>

<!-- Sweet Alert 2 -->
<script>
<?php if(isset($_SESSION['notif']) && $_SESSION['notif'] !== ''): ?>
Swal.fire({
    title: "<?php echo $_SESSION['notif']['status']; ?>",
    text: "<?php echo $_SESSION['notif']['message']; ?>",
    icon: "<?php echo $_SESSION['notif']['status']; ?>",
});
<?php endif; ?>
</script>

<!-- Sweet Alert Hapus -->
<script>
$(document).on('click', '.btn-hapus', function(e) {
    // matikan aksi default
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Deleted!',
                text: 'Your file has been deleted.',
                icon: 'success'
            }).then(function() {
                document.location.href = href;
            });
        } else {
            Swal.fire("Cancelled", "Your data file is safe!", "error");
        }
    })
})
</script>

</body>

</html>