<?php
//  var_dump($data['user']) 
 ?>

 <!-- start navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-5">
      <a class="navbar-brand mb-0 h1" href="<?= BASEURL; ?>?url=User/index">
        <img src="<?= BASEURL; ?>/public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Presline
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=User/index">Home</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=User/mata_kuliah">Mata Kuliah</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=User/profile">Profile</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link logout" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#Logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- end navbar -->

<div class="row mt-3 mx-3 justify-content-center">
    <div class="col-10 col-sm-3">
      <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
          <p class="card-text text-center">
            <?php
            if ($_SESSION['level']=='1') {
              // var_dump($data['user']['folder_uploads']);
              ?>
              <!-- var_dump -->
            <img src="public/img/_uploads/<?= $data['user']['folder_uploads']; ?>" class="rounded-circle" style="height:75px; width:75px;" alt=""> <br>
            <label for=""><?= $data['user']['nim']; ?></label> <br>
            <label for=""><?= $data['user']['nama_mhs']; ?></label> <br>
            <label for=""><?= $data['user']['kode_kelas']; ?></label> <br>
              <?php
            }
            elseif ($_SESSION['level']=='2') {
              ?>
              <img src="<?= BASEURL; ?>public/img/_uploads/<?= $data['user']['folder_uploads']; ?>" class="rounded-circle" style="height:75px; width:75px;" alt=""> <br>
              <label for=""><?= $data['user']['username']; ?></label> <br>
              <label for=""><?= $data['user']['nama_dosen']; ?></label> <br>
              <label for=""><?= $data['user']['nidn']; ?></label> <br>
              <?php
            }
            ?>
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="card">
        <div class="card-body">
            <?php Flasher::flash(); ?>
          <p class="card-text">
            <h1 class="display-6">Selamat Datang di Presline</h1>
          </p>
          <?php
          if ($_SESSION['level']==1) {
            ?>
            <p class="card-text">
              Daftar Kehadiran Anda :
            </p>
            <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
            <?php
          }elseif ($_SESSION['level']==2) {
            ?>
            <p class="card-text">
              Daftar Kehadiran Mengajar Anda :
            </p>
            <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
            

            <?php
          }
          ?>
            
        </div>
      </div>
    </div>
</div>



            <script>
              new Chart(document.getElementById("bar-chart-grouped"), {
                    type: 'bar',
                    data: {
                      labels: [<?php foreach($data['mk'] as $mk) : ?>
                          "<?= $mk['nama_mk']; ?>",
                        <?php endforeach; ?>],
                      datasets: [
                        {
                          label: "Hadir",
                          backgroundColor: "#3e95cd",
                          data: [<?php foreach($data['data_hadir'] as $data_hadir) : ?>
                          "<?= $data_hadir['jumlah']; ?>",
                        <?php endforeach; ?>]
                        }, {
                          label: "Tidak Hadir",
                          backgroundColor: "#8e5ea2",
                          data: [<?php foreach($data['tidak_hadir'] as $tidak_hadir) : ?>
                          "<?= $tidak_hadir['jumlah']; ?>",
                        <?php endforeach; ?>]
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'Population growth (millions)'
                      }
                    }
                });
            </script>