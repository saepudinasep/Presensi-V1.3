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

<!-- start -->
<!-- <div class="container mt-3 bg-primary"> -->
<div class="row mt-3 mx-3 bg-primary">
    <p class="text-light p-2">
      <strong> Mata Kuliah </strong> <br>
      Silahkan Pilih Mata Kuliah Anda hari ini.
    </p>
</div>
<!-- </div> -->
<!-- end -->

<!-- start matkul -->
<!-- <div class="container mt-3"> -->
<div class="row mt-2 mx-2 justify-content-left">
    <?php
        if ($data['mk']==NULL) {
          echo "
          <h1> Belum ada Mata Kuliah Terdaftar </h1>
          ";
        }else {

          ?>
          <?php foreach($data['mk'] as $mk) : ?>
            <div class="card m-2 col-md-4 p-2 border bg-light" style="width: 18rem;">
              <img src="<?= BASEURL; ?>public/img/mk_1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $mk['nama_mk']; ?></h5>
                <p class="card-text"><?= $mk['mk_desc']; ?></p>
                <a href="<?= BASEURL; ?>?url=Mahasiswa/sesi_kuliah/<?= $mk['id_mk']; ?>" class="btn btn-primary">Pilih</a>
              </div>
            </div>
          <?php endforeach; ?>
          <?php
          
        }
    ?>
    
</div>
  
<!-- </div> -->
<!-- end matkul -->

<!-- end content -->


<?php
  endforeach;
?>