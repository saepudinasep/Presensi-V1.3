<?php
  // foreach($data['mahasiswa'] as $mhs) :
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
          <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Mahasiswa/mata_kuliah/<?= $mhs['id_kelas']; ?>">Mata Kuliah</a>
        </li>
        <li class="nav-item col-12 col-lg-auto">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=Mahasiswa/profile">Profile</a>
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

<div class="container mt-4">
    <h3>Profile</h3>
      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Informasi Tentang Anda!</div>
                  <div class="card-body">
                      <table class="table">
                          <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td>Asep Saepudin</td>
                          </tr>
                          <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td>Blok 1 RT/RW. 003/002 Desa Ciuyah Kecamatan Waled Kabupaten Cirebon</td>
                          </tr>
                          <tr>
                              <td>Telepon</td>
                              <td>:</td>
                              <td>085721485664</td>
                          </tr>
                      </table>
                      <a href="" class="btn btn-primary">Edit</a>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Edit User Login</div>
                  <div class="card-body">
                      <fieldset>
                      <legend>Edit Username</legend>
                        <form action="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control" value="saepudin2001" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">New Username</span>
                                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <input type="button" value="Save" class="btn btn-success">
                        </form>
                      </fieldset>
                      <hr>
                      <fieldset>
                      <legend>Edit Password</legend>
                        <form action="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">New Password</span>
                                <input type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Confirm New Password</span>
                                <input type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                            <input type="button" value="Save" class="btn btn-success">
                        </form>
                      </fieldset>
                  </div>
              </div>
          </div>
      </div>
  </div>

<!-- end content -->


<?php
  // endforeach;
?>