  <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js"></script>
<!-- Slider -->
<script src="template/dist/js/slider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>

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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script src="<?php echo base_url('select2-4.0.6-rc.1/dist/js/select2.min.js')?>"></script>
<script src="<?php echo base_url('select2-4.0.6-rc.1/dist/js/i18n/id.js')?>"></script>
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
</script>


</body>
</html>