<?php
  foreach($data['mahasiswa'] as $mhs) :
?>
<!-- start navbar -->
<!-- <div class="container"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-5">
      <a class="navbar-brand mb-0 h1" href="<?= BASEURL; ?>?url=Mahasiswa/dashboard">
        <img src="<?= BASEURL; ?>/public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Presline
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Mahasiswa/dashboard">Home</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=Mahasiswa/mata_kuliah/<?= $mhs['id_kelas']; ?>">Mata Kuliah</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Mahasiswa/profile">Profile</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
          <a class="nav-link logout" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#formModal">Logout</a>
            </li>
        </ul>
      </div>
    </div>
</nav>
<!-- </div> -->
<!-- end navbar -->


<!-- start content -->
<!-- Mata Kuliah -->
<div class="container mt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
        <div class="row" ng-app="myApp" ng-controller="myCtrl">
            <div class="col-6 col-md-3">
                <p>Mata Kuliah : <br> <?= $data['join_sesi']['nama_mk']; ?></p>
            </div>
            <div class="col-6 col-md-3">
                <p>Sesi Kuliah : <br> <?= $data['join_sesi']['nama_mk_sesi']; ?></p>
            </div>
            <div class="col-6 col-md-3">
                <p>berakhir dalam : </p>
                <div class="row border shadow-sm bg-body rounded">
                    <p class="text-center m-2" id="demo"><?= $data['join_sesi']['durasi_kuliah']; ?></p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <p>ready?</p>
                <div class="row p-2 m-2 tombolReady">
                    <button type="button" ng-click="myFunction()" class="btn btn-primary ready" id="ready">Start</button>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-12">
                <div class="border shadow-sm p-2 m-2 rounded">
                    <h2 id="mk_point">Point Presensi: <?= $data['join_sesi']['mk_active_points']; ?> LP</h2>
                    <p class="text-danger">Dianggap telat dalam 10 menit</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Players -->
<div class="container mt-3 shadow-sm p-3 mb-5 bg-body rounded overflow-auto" style="max-height: 350px;">
    <div class="row">
        <div class="col-4 col-md-3 text-center">
            <div class="rounded-pill bg-success bg-opacity-25 bg-gradient" id="simple-list-example">
                <h1 class="display-4 text-success">0</h1>
            </div>
            <p>0 of <?= count($data['mhs']); ?> Players</p>
        </div>
        <div class="col-8 col-md-9 text-center">
            <!-- <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0"> -->
                <div class="row">
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <div class="col-4 col-md-2 m-1">
                        <img src="<?= BASEURL; ?>public/img/student.png" class="rounded-circle w-50" alt="">
                        <p><small><?= $mhs['nama_mhs']; ?></small></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            <!-- </div> -->
        </div>
    </div>
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
            <div class="collapse mt-3" id="collapseExample">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-10 text-center">
                        <table class="table table-hover text-center">
                            <tbody>
                            <!-- <thead>
                                <tr>
                                <th colspan="3" class="text-bg-info p-3 h3">
                                    <img src="<?= BASEURL; ?>public/img/leaderboard.png" width="50px" height="50px" alt="...">
                                    Mahasiswa Terbaik Hari Ini !
                                </th>
                                </tr>
                            </thead> -->
                            <tr class="table-danger">
                                <th scope="row">1 <sup>st</sup></th>
                                <td>
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                Arum Sari
                                </td>
                                <td>20000 Lp</td>
                            </tr>
                            <tr class="table-primary">
                                <th scope="row">2 <sup>nd</sup></th>
                                <td>
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                Asep Saepudin
                                </td>
                                <td>15000 Lp</td>
                            </tr>
                            <tr class="table-success">
                                <th scope="row">3 <sup>rd</sup></th>
                                <td>
                                <img src="<?= BASEURL; ?>public/img/medal.png" width="30px" height="30px" alt="...">
                                Fina Raudotul Janah
                                </td>
                                <td>12000 Lp</td>
                            </tr>
                            <tr>
                                <th scope="row">4 <sup>th</sup></th>
                                <td>
                                Ali Ikbal
                                </td>
                                <td>11000 Lp</td>
                            </tr>
                            <tr>
                                <th scope="row">5 <sup>th</sup></th>
                                <td>
                                Krisna Mulyana
                                </td>
                                <td>10000 Lp</td>
                            </tr>
                            <tr>
                                <th scope="row">6 <sup>th</sup></th>
                                <td>
                                Siti Saropah
                                </td>
                                <td>9000 Lp</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- <a href="" class="btn btn-primary btn-sm mt-2" aria-current="page" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat Selengkapnya</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- chatting -->
<div class="container mt-3 shadow-sm bg-body rounded">
    <div class="row bg-primary rounded-top">
        <div class="col m-1 text-light">
        ~~ Chat Session Started ~~ <span id="date_time"></span>
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
                            [Mahasiswa - <?= $_SESSION['nama']; ?>]
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
            <!-- tiga -->
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
            <!-- lima -->
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
            <!-- enam -->
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
            <!-- <div class="row m-2 justify-content-end">
                <div class="col pt-2 pb-2 col-md-10 bg-primary bg-opacity-75 rounded-4">
                    <div class="col-md-4">
                    <div class="card text-bg-primary">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img src="<?= BASEURL; ?>public/img/student.png" class="img-fluid rounded-circle" alt="..." style="height: 50px;">
                            </div>
                            <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                        <img src="<?= BASEURL; ?>public/img/student.png" alt="" class="img-fluid rounded-circle" style="height: 50px;">
                        <p>[Dosen - Dian Ade Kurnia]</p>
                    </div>
                 </div>
            </div>
            <div class="row m-2 justify-content-start">
                <div class="col col-md-10 bg-success rounded-4">
                    Chat
                </div>
            </div> -->
        </div>
    </div>
</div>


<!-- chat -->
<div class="container mt-3">
    <!-- <div class="row m-3">
        <div class="col">
            <button class="btn btn-primary" type="submit">Izinkan</button>
            <a href="" class="btn btn-primary">Izinkan</a>
        </div>
    </div> -->
    <div class="row m-3">
        <div class="col">
            <p>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#normalchat" aria-expanded="false" aria-controls="normalchat">
                Normal Chat
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#bertanya" aria-expanded="false" aria-controls="bertanya">
                Bertanya
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#upload" aria-expanded="false" aria-controls="upload">
                Upload
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#polling" aria-expanded="false" aria-controls="polling">
                Polling
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#tf" aria-expanded="false" aria-controls="tf">
                TF
            </button>
            <button class="btn bg-success bg-opacity-50" type="button" data-bs-toggle="collapse" data-bs-target="#pg" aria-expanded="false" aria-controls="pg">
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

 <!-- end content -->


 

<?php
  endforeach;
?>