
<!-- start navbar -->
<!-- <div class="container"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-5">
      <a class="navbar-brand mb-0 h1" href="<?= BASEURL; ?>?url=dashboard/dosen">
        <img src="<?= BASEURL; ?>/public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Presline
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
            <li class="nav-item col-12 col-lg-auto">
              <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=dosen/dashboard">Home</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=dosen/mata_kuliah">Mata Kuliah</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=dosen/profile">Profile</a>
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


<!-- start -->
<!-- <div class="container mt-3 bg-primary"> -->
<div class="row mt-3 mx-3 bg-primary">
  <p class="text-light p-2">
     <strong><a href="<?= BASEURL; ?>?url=Dosen/mata_kuliah" class="text-light"> Mata Kuliah</a> </strong> / <?= $data['mk']['nama_mk']; ?> <br>
    Silahkan Pilih Sesi Kuliah Yang Ingin Anda Ajar hari ini.
  </p>
</div>
<!-- </div> -->
<!-- end -->

<!-- start -->
<!-- <div class="container"> -->
    <div class="container mt-3">
        <table class="table table-striped table-hover">
            <tbody>
                   <!-- start -->
                <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
                <tr>
                    <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
                    <!-- <td> -->

                    <?php
                        if ($sesi_mk['status_mk_sesi']==-1) {
                            ?>

                            <td colspan="2">
                            <a href="<?= BASEURL ?>?url=Dosen/join_sesi/<?= $sesi_mk['id_mk_sesi']; ?>/<?= $sesi_mk['id_mk']; ?>" class="btn btn-primary">Belum Mulai</a>
                            </td>
                            <?php
                        }elseif ($sesi_mk['status_mk_sesi']==NULL) {
                            ?>
                            <td>
                            <a href="" class="btn btn-warning disabled">Berakhir</a>
                            
                            </td>
                            <td>
                            <a href="<?= BASEURL; ?>?url=Dosen/leaderboard" class="btn btn-success">Leaderboard</a>
                            </td>
                            <?php
                        }
                     ?>
                    <!-- </td> -->
                    
                </tr>
                <?php endforeach; ?>
                <!-- end -->
            </tbody>
        </table>
    </div>
    <!-- <div class="row mt-2 mx-2 justify-content-around">
        
        <div class="card m-1 col-md-4 p-1 border bg-light">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                        Pilih Sesi
                    </a>
                </p>
                <div class="collapse" id="">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sesi Kuliah
                                <a href="" class="btn btn-warning disabled">Selesai</a>
                                <a href="<?= BASEURL; ?>?url=sesi_kuliah/leaderboard" class="btn btn-success">Leaderboard</a>
                                
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pra UTS
                                <a href="<?= BASEURL; ?>?url=dosen/join_sesi" class="btn btn-primary">Masuk</a>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div> -->
<!-- </div> -->
<!-- end -->