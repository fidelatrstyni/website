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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

<!-- wilayah indonesia -->
<!-- <script src="</?php echo base_url('jquery/jquery-3.3.1.min.js')?>"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="<?php echo base_url('select2-4.0.6-rc.1/dist/js/select2.min.js')?>"></script>
<script src="<?php echo base_url('select2-4.0.6-rc.1/dist/js/i18n/id.js')?>"></script>

<script>
//untuk mendapatkan id_provinsi
let id_provinsi = $('#provinsi').val();
//untuk mendapatkan nama provinsi
let nama_provinsi = $('#provinsi option:selected').text();    
</script>

<script>
    
$(document).ready(function() {
    //untuk memanggil plugin select2
    $('#provinsi').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Provinsi',
        language: "id",

    });
    $('#kota').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kota/Kabupaten',
        language: "id"
    });
    $('#kecamatan').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kecamatan',
        language: "id"
    });
    $('#kelurahan').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kelurahan',
        language: "id"
    });

    //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
    $("#provinsi").change(function() {
        $("img#load1").show();
        var id_provinces = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('DataWilayah/wilayah?jenis=kota'); ?>",
            data: "id_provinces=" + id_provinces,
            success: function(msg) {
                $("select#kota").html(msg);
                $("img#load1").hide();
                getAjaxKota();
            }
        });
    });

    $("#kota").change(getAjaxKota);

    function getAjaxKota() {
        $("img#load2").show();
        var id_regencies = $("#kota").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('DataWilayah/wilayah?jenis=kecamatan'); ?>",
            data: "id_regencies=" + id_regencies,
            success: function(msg) {
                $("select#kecamatan").html(msg);
                $("img#load2").hide();
                getAjaxKecamatan();
            }
        });
    }

    $("#kecamatan").change(getAjaxKecamatan);

    function getAjaxKecamatan() {
        $("img#load3").show();
        var id_district = $("#kecamatan").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('DataWilayah/wilayah?jenis=kelurahan'); ?>",
            data: "id_district=" + id_district,
            success: function(msg) {
                $("select#kelurahan").html(msg);
                $("img#load3").hide();
            }
        });
    }
});

// let optProv = $("<option selected='selected'></option>").val(3).text("Aceh")
 
// $("#provinsi").append(optProv).trigger('change');
</script>


<script>
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 5,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})
</script>

<!-- Splide Slider-->
<script>
new Splide('.splide', {
    perPage: 3,
    perMove: 1,
    loop: true,
}).mount();
</script>

<!-- Splide js CDN -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
new Splide('.splide', {
    perPage: 3,
    rewind: true,
    perMove: 1,
    gap: "1rem",
}).mount();
</script>

<!-- Map -->
<script>
// fungsi initialize untuk mempersiapkan peta
function initialize() {
    var propertiPeta = {
        center: new google.maps.LatLng(-7.320284632511725, 112.77233778312714),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script src="src/dist/vanillaCalendar.js" type="text/javascript"></script>
<script>
window.addEventListener('load', function() {
    vanillaCalendar.init({
        disablePastDays: true
    });
})
</script>

<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
/*const swal = $('.swal').data('swal');
if (swal) {
    Swal.fire({
        title: 'Data berhasil',
        text: swal,
        icon: 'success'
    })
}*/

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

    /*Swal.fire({
        title: 'Are you sure?',
        text: "Deleted data cannot be returned!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',
            )
        }
        document.location.href = href;
    })*/

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


<!-- Upload profil -->
<script>
function triggerClick() {
    document.querySelector('#profil').click()
}

function displayImage(e) {
    if (e.files[0]) {
        var render = new FileReader();

        render.onload = function(e) {
            document.querySelector('#displayProfil').setAttribute('src', e.target.result);
        }
        render.readAsDataURL(e.files[0]);
    }
}
</script>

<!-- Upload gambar -->
<script>
function triggerClick() {
    document.querySelector('#gambar2').click()
}

function displayImage(e) {
    if (e.files[0]) {
        var render = new FileReader();

        render.onload = function(e) {
            document.querySelector('#displayGambar2').setAttribute('src', e.target.result);
        }
        render.readAsDataURL(e.files[0]);
    }
}
</script>
<!--Import jQuery before export.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<!--Data Table-->
<!-- <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

<!--Export table buttons-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>



<script>
$(document).ready(function() {

    $('#example').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
    });

    $('#tblLaporan').DataTable({
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                footer: true
            },
            {
                extend: 'pdfHtml5',
                footer: true
            }
        ]
    });


});
</script>

<!-- modal password -->
<script>
$(document).ready(function() {

    // get edit Password
    $('.btn-password').on('click', function() {
        // Call Modal Edit
        $('#passwordModal').modal('show');
    });

});
</script>

</body>

</html>