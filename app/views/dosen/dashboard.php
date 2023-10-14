<?php
  // foreach($data['dosen'] as $dosen) :
?>
<!-- start navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-5">
      <a class="navbar-brand mb-0 h1" href="<?= BASEURL; ?>?url=Dosen/dashboard">
        <img src="<?= BASEURL; ?>/public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Presline
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/dashboard">Home</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/mata_kuliah">Mata Kuliah</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/profile">Profile</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link logout" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#formModal">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- end navbar -->



<!-- content / isinya disini -->
<!-- <div class="container mt-3"> -->
<div class="row mt-3 mx-3 justify-content-center">
    <div class="col-10 col-sm-3">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <p class="card-text text-center">
            <img src="<?= BASEURL; ?>public/img/dosen.png" class="rounded-circle w-25" alt=""> <br>
            <label for=""><?= $data['dosen']['username']; ?></label> <br>
            <label for=""><?= $data['dosen']['nama_dosen']; ?></label> <br>
            <!-- <label for="">Email</label> -->
             <br>
            <button type="button" class="btn btn-success">Edit Profile</button>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="card">
        <div class="card-body">
            <?php Flasher::flash(); ?>
          <p class="card-text">
            <h1 class="display-6">Selamat Datang di </h1>
            <h1 class="display-4"> Sistem Presensi Online <br> STMIK IKMI Cirebon</h1>
          Sistem ini dapat digunakan oleh para dosen dan manajer akademik untuk memonitoring
          tingkat keaktifan tiap mahasiswa. Dengan fitur WhatsApp Gateway manajer akademik
          dapat memberikan notifikasi selamat maupun notifikasi peringatan kepada seluruh
          peserta kuliah.
        </p>
        </div>
      </div>
    </div>
</div>
<!-- </div> -->

<?php
  // endforeach;
?>