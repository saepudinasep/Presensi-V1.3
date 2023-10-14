<?php
  foreach($data['mahasiswa'] as $mhs) :
?>
<!-- start navbar -->
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
<!-- end navbar -->

<!-- start content -->
<div class="row mt-3 mx-3 bg-primary">
  <p class="text-light p-2">
     <strong><a href="<?= BASEURL; ?>?url=Mahasiswa/mata_kuliah/<?= $mhs['id_kelas']; ?>" class="text-light"> Mata Kuliah</a> </strong> / Riset MBKM <br>
    Silahkan Pilih Sesi Kuliah Anda hari ini.
  </p>
</div>


<div class="container mt-3">
        <table class="table table-striped table-hover">
            <tbody>
                   <!-- start -->
                <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
                <tr>
                    <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
                    <td>Dosen Pengajar : <?= $sesi_mk['nama_dosen']; ?></td>
                    <?php
                        if ($sesi_mk['status_mk_sesi']==-1) {
                    ?>
                          <td colspan="2">
                          <a href="<?= BASEURL ?>?url=Mahasiswa/join_sesi/<?= $sesi_mk['id_mk_sesi']; ?>/<?= $sesi_mk['id_mk']; ?>" class="btn btn-primary">Belum Mulai</a>
                          </td>
                          <?php
                        }elseif ($sesi_mk['status_mk_sesi']==NULL) {

                          ?>
                          <td>
                          <a href="" class="btn btn-warning disabled">Berakhir</a>
                          
                          </td>
                          <td>
                          <a href="<?= BASEURL; ?>?url=Mahasiswa/leaderboard/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-success">Leaderboard</a>
                          </td>

                    <?php
                        }
                     ?>
                    
                </tr>
                <?php endforeach; ?>
                <!-- end -->
            </tbody>
        </table>
    </div>


<!-- end content -->


<?php
  endforeach;
?>