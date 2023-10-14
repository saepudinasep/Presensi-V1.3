<?php

$jatuh_tempo = $data['mk_info']['jatuh_tempo'];
$mk_point = $data['mk']['mk_active_points'];
?>

<?php
date_default_timezone_set('Asia/Jakarta');
$hari_sekarang = date('d');
$bln_sekarang = date('m');
$thn_sekarang = date('Y');
$minute = date('H:i:s');
?>
<div class="container mt-3">
    <a href="<?= BASEURL; ?>User/leave" class="btn btn-primary" onclick="return confirm('Anda yakin akan keluar sesi kuliah ini?')">Keluar</a>
</div>


<!-- Mata Kuliah -->
<div class="container mt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
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
                    <input type="text" id="timer" value="<?= $data['mk_info']['durasi_kuliah']; ?>" class="col-9 col-md-9 text-center" disabled>
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
    </div>
</div>

<script>
    $(document).ready(function () {
        
    });
</script>


<!-- Mahasiswa Online -->
<div class="container mt-3" id="user_join">

</div>

<!-- leaderboard -->
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item bg-secondary rounded-top">
                    <a class="nav-link text-light" aria-current="page" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img src="<?= BASEURL; ?>public/img/leaderboard.png" width="30px" height="30px" alt="">
                        Leaderboard
                    </a>
                </li>
            </ul>
            <div class="mt-3" id="collapseExample">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-10 text-center">
                        <table class="table table-hover text-center">
                            <tbody id="leaderboard_join">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- chatting -->
<div class="container mt-3 mb-3 shadow-sm bg-body rounded">
    <div class="row bg-primary rounded-top">
        <div class="col m-1 text-light">
            <p>
                ~~ Chat Session Started ~~ <span id="waktu"></span>
            </p>
        </div>
    </div>
    <div class="row bg-primary bg-opacity-50 rounded-bottom overflow-auto" style="max-height: 700px;">
        <div class="col">
            <!-- satu -->
            <div class="card m-2 p-1 bg-primary bg-opacity-50 float-end" style="max-width: 750px;">
                <div class="row g-0">
                    <div class="col-md-2 pt-3 text-center">
                        <img src="<?= BASEURL; ?>public/img/student.png" class="img-fluid rounded-circle" style="height: 75px;" alt="...">
                    </div>
                    <div class="col-md-10">
                        <h5 class="card-title p-1">
                            [Dosen - <?= $_SESSION['nama']; ?>]
                        </h5>
                        <p class="card-text p-1">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <!-- dua -->
            <div class="card m-2 p-1 bg-success bg-opacity-50 float-start" style="max-width: 750px;">
                <div class="row g-0">
                    <div class="col-md-2 pt-3 text-center">
                        <img src="<?= BASEURL; ?>public/img/student.png" class="img-fluid rounded-circle" style="height: 75px;" alt="...">
                    </div>
                    <div class="col-md-10">
                        <h5 class="card-title p-1">
                            [Mahasiswa - Asep Saepudin]
                        </h5>
                        <p class="card-text p-1">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- chat -->
<div class="container mt-3">
    <!-- <div class="row m-3">
        <div class="col">
            <button class="btn btn-primary" type="submit">Izinkan</button>
        </div>
    </div> -->
    <div class="row">
        <div class="col">
            <p>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#normalchat" aria-expanded="false" aria-controls="normalchat">
            <img src="<?= BASEURL; ?>public/img/chat.gif" alt="" style="height: 20px;">    
            Normal Chat
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#bertanya" aria-expanded="false" aria-controls="bertanya">
            <img src="<?= BASEURL; ?>public/img/raise_hand64.png" alt="" style="height: 20px;">    
            Bertanya
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#upload" aria-expanded="false" aria-controls="upload">
            <img src="<?= BASEURL; ?>public/img/upload.png" alt="" style="height: 20px;">    
            Upload
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#polling" aria-expanded="false" aria-controls="polling">
            <img src="<?= BASEURL; ?>public/img/polling_48.png" alt="" style="height: 20px;">
            Polling
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#tf" aria-expanded="false" aria-controls="tf">
            <img src="<?= BASEURL; ?>public/img/icons8-question-mark-48.png" alt="" style="height: 20px;">
                
            TF
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#pg" aria-expanded="false" aria-controls="pg">
            <img src="<?= BASEURL; ?>public/img/multiple_choice.gif" alt="" style="height: 20px;">
            
            PG
            </button>
            </p>
            <div style="min-height: 120px;">
                <div class="collapse collapse-horizontal" id="normalchat">
                    <div class="card card-body" style="width: 300px;">
                    Normal Chat
                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="bertanya">
                    <div class="card card-body" style="width: 300px;">
                    Bertanya
                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="upload">
                    <div class="card card-body" style="width: 300px;">
                    Upload
                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="polling">
                    <div class="card card-body" style="width: 300px;">
                    Polling
                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="tf">
                    <div class="card card-body" style="width: 300px;">
                    TF
                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="pg">
                    <div class="card card-body" style="width: 300px;">
                    PG
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    $(document).ready(function(){


        
        setInterval(function() {
        waktu();
        }, 10);

        function waktu() {
        $.ajax({
            url: "<?= BASEURL; ?>User/waktu_ajax",
            success: function (data) {
            $('#waktu').html(data);
            }
        });
        }

        mk_info_join();

    setInterval(function() {

        if (<?= $_SESSION['level']; ?>==2) {
            user_join();
        }
        leaderboard_join();
        chat_join();
        // mk_info_join();
    }, 1000);








    // function UpdateMK()
    // {
    //         $.ajax({
    //             url: "<?= BASEURL; ?>User/UpdateMk",
    //             success: function (data) {
    //                 // console.log(data.nama_mk);
    //             // $('#mk_info_join').html(data);
    //             }
    //         });

    // }


    // ambil data mahasiswa online
    function mk_info_join()
    {
            $.ajax({
                url: "<?= BASEURL; ?>User/mk_info_join",
                success: function (data) {
                    // console.log(data.nama_mk);
                $('#mk_info_join').html(data);
                }
            });

    }
    // ambil data mahasiswa online
    function leaderboard_join()
    {
            $.ajax({
                url: "<?= BASEURL; ?>User/leaderboard_join",
                success: function (data) {
                    // console.log(data.nama_mk);
                $('#leaderboard_join').html(data);
                }
            });

    }

    // ambil data point leaderboard mahasiswa
    function user_join()
    {
        $.ajax({
                url: "<?= BASEURL; ?>User/user_join",
                success: function (data) {
                    // console.log(data.nama_mk);
                $('#user_join').html(data);
                }
            });
    }

    // ambil data chatting
    function chat_join()
    {
            $.ajax({
                url: "<?= BASEURL; ?>User/chat_join",
                success: function (data) {
                    // console.log(data.nama_mk);
                $('#chat_join').html(data);
                }
            });
    }


    });

</script>

<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>