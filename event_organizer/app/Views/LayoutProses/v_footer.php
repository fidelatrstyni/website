<!-- Main Footer -->
<!--footer class="main-footer"-->

<!-- Default to the left -->
<!--strong><center>Copyright &copy; 2021 <a href="http://localhost/event_organizer/public/home">Khalila Enterprise</a>.</strong> All rights reserved.
  </footer-->
<footer class="container-fluid bg-grey py-5 credit" style="margin-top: -10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="logo-part">
                            <img src="https://i.ibb.co/sHZz13b/logo.png" class="w-50 logo-footer">
                            <p>7637 Laurel Dr. King Of Prussia, PA 19406</p>
                            <p>Use this tool as test data for an automated system or find your next pen</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4">
                        <h6> About Company</h6>
                        <p>Khalila Enterprise from Sidoarjo, Make Your Party is Memorable</p>
                        <a href="#" class="btn-footer"> More Info </a><br>
                        <a href="#" class="btn-footer"> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <h6> Help us</h6>
                        <div class="row ">
                            <div class="col-md-6">
                                <ul>
                                    <li> <a href="#"> Home</a> </li>
                                    <li> <a href="#"> About</a> </li>
                                    <li> <a href="#"> Service</a> </li>
                                    <li> <a href="#"> Team</a> </li>
                                    <li> <a href="#"> Help</a> </li>
                                    <li> <a href="#"> Contact</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-6 px-4">
                                <ul>
                                    <li> <a href="#"> Cab Faciliy</a> </li>
                                    <li> <a href="#"> Fax</a> </li>
                                    <li> <a href="#"> Terms</a> </li>
                                    <li> <a href="#"> Policy</a> </li>
                                    <li> <a href="#"> Refunds</a> </li>
                                    <li> <a href="#"> Paypal</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <h6>Our Social Media</h6>
                        <div class="social">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                        <form class="form-footer my-3">
                            <input type="text" placeholder="search here...." name="search">
                            <input type="button" value="Go">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <strong>
        <center>Copyright &copy; 2021 <a href="http://localhost/event_organizer/public/home">Khalila Enterprise</a>.
    </strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<div id="calendarModal" class="modal fade">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title">Informasi Pembayaran</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">×</span> <span
                        class="sr-only">close</span></button>
            </div>
            <form class="form-horizontal" id="informasi-form" action="<?= base_url('Fullcalendar/insert'); ?>"
                method="post" enctype="multipart/form-data">
                <div id="modalBody" class="modal-body">
                    <input type="hidden" id="start_hidden">
                    <input type="hidden" id="end_hidden">
                    <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $id_kategori[0] ?>">
                    <input type="hidden" id="id_tempat" name="id_tempat" value="<?= $dataEvent[0]['id_tempat']?>">
                    <div class="row">
                        <?php foreach ($users as $key => $value){?>
                        <div class="col-md-6">

                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $value['nama']?>">
                            <label for="">No Telephone</label>
                            <input type="text" class="form-control" name="tlp" value="<?= $value['tlp']?>">
                            <label for="">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat"><?= $alamat?></textarea>

                        </div>
                        <div class="col-md-6">
                            <label for="">Waktu Mulai</label>
                            <input class="form-control" type="time" name="time" id="start_time">
                            <label for="">Waktu Akhir</label>
                            <input class="form-control" type="time" name="time" id="end_time">
                            <label for="">Konsep</label>
                            <textarea type="text" class="form-control" id="konsep" name="konsep"></textarea>
                        </div>
                        <?php }?>

                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

                                <tr>
                                    <th width="">Nama Paket dan Lokasi</th>
                                    <th style="text-align:right">Harga</th>
                                    <th style="text-align:right">Sub-Total</th>
                                </tr>

                                <?php $i = 1; ?>

                                <?php foreach($paket as $key => $value): ?>
                                <input type="hidden" id="id_paket" name="id_paket" value="<?= $value['id_paket']?>" />

                                <tr>
                                    <td>
                                        <?php echo $value['nama_paket']; ?>
                                    </td>

                                    <td style="text-align:right">Rp.
                                        <?php echo format_number($value['harga_paket']); ?>
                                    </td>

                                    <td style="text-align:right">
                                        <?php $subTotal = 0;
                                        $subTotal = $value['harga_paket'] + $dataEvent[0]['harga'];
                                        echo 'Rp. ' . format_number($value['harga_paket']);;
                                        ?>
                                    </td>

                                </tr>

                                <?php $i++; $total = $subTotal?>

                                <?php endforeach; ?>
                                <tr>
                                    <td>
                                        <?php echo $dataEvent[0]['nama']; ?>
                                    </td>

                                    <td style="text-align:right">Rp.
                                        <?php echo format_number($dataEvent[0]['harga']); ?>
                                    </td>

                                    <td style="text-align:right">Rp.
                                        <?php echo format_number($dataEvent[0]['harga']); ?>
                                    </td>

                                </tr>

                                <tr>
                                    <td colspan="1"> </td>
                                    <td class="right">
                                        <h3>Total</h3>
                                    </td>
                                    <td class="right">
                                        <h3>Rp. <?php echo format_number($total); ?></h3>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <div class="col-md-6">
                            <label for="">Pembayaran Dapat Melalui :</label>
                            <p>Bank BRI No Rek 1233939983</p>
                            <p>Bank Bca No Rek 2233222222</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Pembayaran :</label>
                            <p>
                            <input type="radio" name="pembayaran" id="pembayaran" value="uang muka">
                            <label for="html">Uang Muka</label>
                            </p>
                            <?php $uangMuka = ($total / 100) * 25?>
                            <p>Pembayaran uang muka 25% sebesar <b>Rp. <?= format_number($uangMuka)?></b></p>
                            <input class="form-control" type="hidden" name="uang_muka" id="uang_muka" value="<?= $uangMuka?>">
                            <p>
                            <input type="radio" name="pembayaran" id="pembayaran" value="lunas">
                            <label for="css">Lunas</label>
                            </p>
                            <p>Pembayaran lunas sebesar <b>Rp. <?= format_number($total)?></b></p>
                            <input class="form-control" type="hidden" name="lunas" id="lunas" value="<?= $total?>">
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Bukti Pembayaran</label>
                            <div class="form-group text-center">
                                <img src=" <?= base_url('Upload/assets/placeholder.png')?>" alt=""
                                    id="displayPembayaran" onclick="triggerClick()">
                                <label for="buktiPembayaran">Click Gambar Untuk Upload</label>
                                <input type="file" name="buktiPembayaran" onchange="displayImage(this)"
                                    id="buktiPembayaran" style="display: none;">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit">Booking Now</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Time -->

<!-- <script src="<?php echo base_url('src/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('src/js/popper.js') ?>"></script>
<script src="<?php echo base_url('src/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('src/js/main.js') ?>"></script> -->


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
<!-- <script src="src/dist/vanillaCalendar.js" type="text/javascript"></script> -->
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


<script>
let me = "<?php echo session()->get('id_user') ?>"
let today = new Date().toISOString().slice(0, 10)

function loadlink() {
    $('#links').load('test.php', function() {
        $(this).unwrap();
    });
}


$(function() {
    $(document).on('hidden.bs.modal', '#calendarModal', function(event) {
        $('#displayPembayaran').attr('src', ' <?= base_url(); ?>/Upload/assets/placeholder.png')
        $('#buktiPembayaran').val('')
        // $('#id_kategori').val('')
        // $('#id_tempat').val('')
        // $('#id_paket').val('')
        $('#konsep').val('')
        $('#start_hidden').val('')
        $('#end_hidden').val('')
    });
});

$('.btn-submit').click(function(e) {
    e.preventDefault()

    // var start = $.fullCalendar.formatDate($('#start_hidden').val(), "Y-MM-DD HH:mm:ss");
    // var end = $.fullCalendar.formatDate($('#end_hidden').val(), "Y-MM-DD HH:mm:ss");
    var id_user = <?php echo $_SESSION['id_user'] ?>;

    // var id_alternatif = <//?php echo $_SESSION['id_alternatif'] ?>;
    // var id_kategori = <//?php echo $_SESSION['id_kategori'] ?>;
    let startTime = $('#start_time').val()
    let endTime = $('#end_time').val()
    let tanggalAwal = $('#start_hidden').val()

    if (tanggalAwal == today) {
        alert('Maaf Anda tidak dapat memboking jadwal ini !')
        $('#calendar').fullCalendar('refetchEvents');
        $('#calendarModal').modal('hide');
        return false
    }
    // let tanggalAkhir = $('#end_hidden').val()
    var formData = new FormData();
    formData.append('file', $('#buktiPembayaran')[0].files[0]);
    formData.append('title', 'Booked')
    formData.append('id_kategori', $('#id_kategori').val())
    formData.append('id_tempat', $('#id_tempat').val())
    formData.append('id_paket', $('#id_paket').val())
    formData.append('konsep', $('#konsep').val())
    formData.append('pembayaran', $('#pembayaran').val())
    formData.append('uang_muka', $('#uang_muka').val())
    formData.append('lunas', $('#lunas').val())
    formData.append('start', $('#start_hidden').val() + " " + startTime)
    formData.append('end', $('#end_hidden').val() + " " + endTime)

    $.ajax({
        url: "<?php echo base_url('Fullcalendar/insert'); ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,

        success: function(data) {
            // if(event.start_event != me) {
            //     alert('Maaf Anda tidak dapat mengedit jadwal ini !')
            //     return false
            // }
            // console.log('iki',startTime)
            let json = JSON.parse(data)
            if (json.status == false) {
                alert(json.message)
                $('#calendar').fullCalendar('refetchEvents');
                $('#calendarModal').modal('hide');
                return false;
            } else {
                $('#calendar').fullCalendar('refetchEvents');
                alert(json.message);
                $('#calendarModal').modal('hide');
                // window.location.href = "<?=base_url('Dealing')?>";
            }


        },


    })
})
$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        // timeFormat: 'H(:mm)' ,// uppercase H for 24-hour clock、
        displayEventTime: false,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',

        },
        events: function(start, end, timezone, callback) {
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url('fullcalendar/load'); ?>",
                dataType: 'json',

                success: function(doc) {
                    var events = [];
                    // console.log('xxx',doc)
                    $.each(doc, function(i, v) {
                        let color = "#00FF00" //atur warna jika user
                        if (v.id_user != me) {
                            color = '#ff0000' //atur warna jika bukan user
                        }
                        events.push({
                            id: v.id,
                            title: v.title,
                            start: v.start,
                            end: v.end,
                            id_user: v.id_user,
                            color: color
                        });
                    });
                    callback(events);
                }
            });
        },

        selectable: true,
        selectHelper: true,
        selectAllow: function(select) {
            return moment().diff(select.start, 'days') <= 0
        },
        select: function(start, end, allDay) {
            // var title = prompt("Enter Booking Date");
            // let title = confirm("Booking Date");
            // var title = "Nikah";
            $('#start_hidden').val(moment(start).format('YYYY-MM-DD'))
            $('#end_hidden').val(moment(end).format('YYYY-MM-DD'))
            $('#calendarModal').modal('show');
            // if (title) {
            //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            // var id_user = <?php echo $_SESSION['id_user'] ?>;
            // var id_alternatif = <//?php echo $_SESSION['id_alternatif'] ?>;

            // $.ajax({
            //     url: "<//?php echo base_url('fullcalendar/insert'); ?>",
            //         type: "POST",
            //         data: {
            //             id_user: id_user,
            //             id_alternatif : id_alternatif,
            //             title: 'Booked',
            //             start: start,
            //             end: end
            //         },
            //         success: function() {
            //             calendar.fullCalendar('refetchEvents');
            //             alert("Added Successfully");
            //         }
            //     })
            // }
        },
        editable: true,
        eventResize: function(event) {

            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

            var title = event.title;

            var id = event.id;

            $.ajax({
                url: "<?php echo base_url('fullcalendar/update'); ?>",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function(data) {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Update");
                }
            })
        },
        eventDrop: function(event) {
            if (event.id_user != me) {
                // alert('Maaf Anda tidak dapat mengedit jadwal ini !')
                // return false
                if (!alert('Maaf Anda tidak dapat mengedit jadwal ini !')) {
                    window.location.reload()
                    return false
                }
            }
            // if(confirm('Successful Message')){
            //     // window.location.reload();  
            //     window.location.href = "http://stackoverflow.com";
            // }
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            //alert(start);
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            //alert(end);
            var title = event.title;
            var id = event.id;

            $.ajax({
                url: "<?php echo base_url('fullcalendar/update'); ?>",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function() {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                }
            })
        },
        eventClick: function(event) {
            if (event.id_user != me) {
                alert('Maaf Anda tidak dapat menghapus jadwal ini !')
                return false
            }
            if (confirm("Are you sure you want to remove it?")) {
                var id = event.id;
                $.ajax({
                    // url:"<//?php base_url('fullcalendar/delete'); ?>",
                    url: '<?= base_url()?>/Fullcalendar/delete',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function() {
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Removed');
                    }
                })
            }
        }
    });
});
</script>

<!-- Upload bukti pembayaran -->
<script>
function triggerClick() {
    document.querySelector('#buktiPembayaran').click()
}

function displayImage(e) {
    if (e.files[0]) {
        var render = new FileReader();

        render.onload = function(e) {
            document.querySelector('#displayPembayaran').setAttribute('src', e.target.result);
        }
        render.readAsDataURL(e.files[0]);
    }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

</body>

</html>