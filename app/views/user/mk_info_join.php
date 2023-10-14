<?php

$jatuh_tempo = $data['mk_info']['jatuh_tempo'];
$mk_point = $data['mk']['mk_active_points'];
# =====================================================

$timer_hour = "01";
$timer_min = "30";
$timer_sec = "00";
?>
        <div class="row">
            <div class="col-6 col-md-3">
                <p>Mata Kuliah : <br> <?= $data['mk_info']['nama_mk']; ?></p>
            </div>
            <div class="col-6 col-md-3">
                <p>Sesi Kuliah : <br> <?= $data['mk_info']['nama_mk_sesi']; ?></p>
            </div>
            <div class="col-6 col-md-2">
                <p>berakhir dalam : </p>
                <p id="demo" class="text-muted text-center">
                    <input type="text" id="timer_hour" value="<?= $timer_hour; ?>" class="col-3 col-md-3 text-center" disabled>
                    :
                    <input type="text" id="timer_min" value="<?= $timer_min; ?>" class="col-3 col-md-3 text-center" disabled>
                    :
                    <input type="text" id="timer_sec" value="<?= $timer_sec; ?>" class="col-3 col-md-3 text-center" disabled>
                </p>
            </div>
            <div class="col-6 col-md-4">
                <p>ready?</p>
                <div class="row p-2 m-2 tombol">
                    <?php
                        if ($_SESSION['level']==1) {
                            if ($data['mk_info']['status_mk_sesi']==-1) {
                                // jika btn mulai di klik update -1 jadi 1
                                ?>
                                <button type="button" class="btn btn-warning disabled" id="mhs_satu">Belum Mulai</button>
                                <small class="text-danger">(Dosen belum memulai perkuliahan)</small>
                                <?php
                            }elseif ($data['mk_info']['status_mk_sesi']==1) {
                                // jika btn mulai di klik update 1 jadi 0 dan ubah html jadi Saya Hadir
                                ?>
                                <button type="button" class="btn btn-primary" id="mhs_dua">Join Sesi</button>
                                <?php
                            }elseif ($data['mk_info']['status_mk_sesi']==0) {
                                ?>
                                <button type="button" class="btn btn-warning disabled" id="mhs_tiga">Perkuliahan Berakhir</button>
                                <?php
                            }
                            
                        }elseif ($_SESSION['level']==2) {
                            if ($data['mk_info']['status_mk_sesi']==-1) {
                                // jika btn mulai di klik update -1 jadi 1
                                ?>
                                <button type="button" class="btn btn-primary" id="dosen_satu">Start Perkuliahan</button>
                                <?php
                            }elseif ($data['mk_info']['status_mk_sesi']==1) {
                                // jika btn mulai di klik update 1 jadi 0 dan ubah html jadi Saya Hadir
                                ?>
                                <button type="button" class="btn btn-danger" id="dosen_dua" onclick="return confirm('Anda yakin akan stop sesi kuliah ini?')">Stop Perkuliahan</button>
                                <?php
                            }elseif ($data['mk_info']['status_mk_sesi']==0) {

                                ?>
                                <button type="button" class="btn btn-warning disabled" id="dosen_tiga">Perkuliahan Berakhir</button>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-12">
                <div class="border shadow-sm p-2 m-2 rounded">
                    <h2 id="mk_point">Point Presensi: <?= $mk_point; ?> LP</h2>
                    <p class="text-danger">
                        Dianggap telat dalam 10 menit.  
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#contoh">
                        <img src="<?= BASEURL; ?>public/img/icons8-question-mark-48.png" alt="">
                        </button>
                    </p> 
                </div>
            </div>
        </div>


<script>
    $(document).ready(function () {
        var proses;
        if (<?= $data['mk_info']['status_mk_sesi']; ?>==1) {
            // Set tanggal yang akan dijadikan timer
        var tanggalProdukExpired = new Date('<?= $jatuh_tempo; ?>').getTime();

        // Mengupdate timer setiap 1 detik
        proses = setInterval(function() {

            // Memanggil tanggal dan waktu saat ini
            var waktuSekarang = new Date().getTime();

            // Mencari selisih waktu dan tanggal antara saat ini dan data produk
            var cariSelisih = tanggalProdukExpired - waktuSekarang;

            // Memproses selisih waktu
            var hari = Math.floor(cariSelisih / (1000 * 60 * 60 * 24));
            var jam = Math.floor((cariSelisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var menit = Math.floor((cariSelisih % (1000 * 60 * 60)) / (1000 * 60));
            var detik = Math.floor((cariSelisih % (1000 * 60)) / 1000);
            


            $('#timer_hour').val(jam);
            $('#timer_min').val(menit);
            $('#timer_sec').val(detik);


                if(cariSelisih == 0){
                    // location.reload();
                    clearInterval(proses);
                    // return;
                    
                    $('#timer_hour').val('01');
                    $('#timer_min').val('30');
                    $('#timer_sec').val('00');
                }
        }, 1000);
        }else if (<?= $data['mk_info']['status_mk_sesi']; ?>==0) {
            clearInterval(proses);
            
            $('#timer_hour').val('01');
            $('#timer_min').val('30');
            $('#timer_sec').val('00');

            // location.reload();
            $.ajax({
                url: "<?= BASEURL; ?>User/UpdateMkDua",
                success: function () {
                    // console.log(data.nama_mk);
                // $('#mk_info_join').html(data);
                }
            });
        }

    $('#dosen_satu').on('click', function () {
        location.reload();
        $.ajax({
                url: "<?= BASEURL; ?>User/UpdateMk",
                success: function () {            
                    // console.log(data.nama_mk);
                // $('#mk_info_join').html(data);
                }
            });
    });



    $('#dosen_dua').on('click', function () {
        location.reload();
            $.ajax({
                url: "<?= BASEURL; ?>User/UpdateMkDua",
                success: function () {
                    // console.log(data.nama_mk);
                // $('#mk_info_join').html(data);
                }
            });
        });
        

        
        $('#mhs_dua').on('click', function () {
            // $.ajax({
            //     url: "<?= BASEURL; ?>User/UpdateMkDua",
            //     success: function () {
            //         // console.log(data.nama_mk);
            //     // $('#mk_info_join').html(data);
            //     }
            // });
        });
    });
</script>