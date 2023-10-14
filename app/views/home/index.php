

<!-- start navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container-fluid px-5">
      <a class="navbar-brand mb-0 h1" href="<?= BASEURL; ?>?url=Home/#hero">
        <img src="<?= BASEURL; ?>public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Presline
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-12 col-lg-auto"><a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=Home/#hero">Home</a></li>
          <li class="nav-item col-12 col-lg-auto"><a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Home/#tentang">Tentang</a></li>
          <li class="nav-item col-12 col-lg-auto"><a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Home/#faq">FAQ</a></li>
          <li class="nav-item col-12 col-lg-auto"><a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Home/panduan">Panduan</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- end navbar -->


<!-- header -->

<!-- content / isinya disini -->
<div data-bs-spy="scroll" data-bs-target="#navbarSupportedContent" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example   rounded-2" tabindex="0">

<!-- start hero -->
  <div id="hero" class="container mt-3 pt-3">
    <div class="row">
      <div class="col-md-6 text-left">
        <h1 class="mt-md-5 pt-5 text-Dark">Selamat Datang <br>
        Di Presensi Online 
        <br>STMIK IKMI Cirebon</h1>
        <p class="text-secondary">Presensi online memudahkan mahasiswa, dosen, dan manajemen akademik dalam pengisian data e-learning dan diimplementasikan untuk memotivasi keaktifan mahasiswa maupun keaktifan dosen.</p>
        
        <a href="<?= BASEURL; ?>?url=Log/index" class="btn btn-primary">Login Preseline</a>
        
      </div>
      <div class="col-md-6 mt-5 pt-5" align="right">
        <img src="<?= BASEURL; ?>public/img/logo3.png" class="img-fluid d-block w-85" alt="gambar hero">
      </div>
    </div>
  </div>
  <br>
<!-- end hero -->

<!-- start tentang -->
    <div id="tentang" class="row pt-5 p-3 m-3 bg-light rounded">
        <h2 class="display-6 fw-bold text-secondary">Tentang Presensi Online</h2>
        <div class="col-12 col-md-12 col-sm-12 col-lg-12">
            <p class="fs-4">Presensi online memudahkan mahasiswa, dosen, dan manajemen akademik dalam pengisian data e-learning dan memotivasi keaktifan mahasiswa maupun keaktifan dosen. Dalam Presensi Online dosen melakukan presensi dengan menambah sesi perkuliahan baru sesuai dengan jadwal kuliah dan setelah membuka sesi pada sistem barulah mahasiswa dapat mengisi presensi.</p>
            
            <div class="collapse" id="collapseExample">
                <p class="fs-4">Saat sesi perkuliahan berlangsung, mahasiswa dapat mengajukan pertanyaan atau masukan pada fitur chat dan sistem akan mencatat secara otomatis memberikan poin awal untuk nilai keaktifan disisi lain, dosen dapat memberikan poin tambahan atau pengurangan atas pertanyaan atau masukan dari mahasiswa tersebut sesuai dengan bobot pertanyaan atau masukan dan diakhir sesi mahasiswa wajib mengisi poin-poin kesimpulan dari apa yang dosen sampaikan, mahasiswa juga dapat mengerjakan beberapa challenges (latihan) yang telah dibuat oleh dosen.</p>
            </div>
            <button class="btn btn-outline-info btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Selengkapnya
          </button>
        </div>
    </div>
<!-- end tentang -->

<!-- mahasiswa terbaik -->
  <div id="mhs_terbaik" class="row justify-content-md-center m-2 p-2 justify-content-center">
    <div class="col-md-8 col-8 text-center">
      <table class="table table-hover text-center">
        <tbody>
          <thead>
            <tr>
              <th colspan="3" class="text-bg-info p-3 h3">
                <!-- <img src="<?= BASEURL; ?>public/img/leaderboard.png" width="50px" height="50px" alt="..."> -->
                Mahasiswa Terbaik Hari Ini !
              </th>
            </tr>
          </thead>
            <?php foreach($data['leaderboard'] as $index => $leaderboard) : ?>
              <tr class="<?php 
              if ($index+1 == 1) {
                echo "table-danger";
              }elseif ($index+1 == 2) {
                echo "table-primary";
              }elseif ($index+1 == 3) {
                echo "table-success";
              }else {
                echo "";
              }
              ?>">
              <th scope="row"><?= $index+1; ?> <sup>
                <?php
                if ($index+1 == 1) {
                  echo "st";
                }elseif ($index+1 == 2) {
                  echo "nd";
                }elseif ($index+1 == 3) {
                  echo "rd";
                }else {
                  echo "th";
                }
                ?>
                </sup></th>
                <td>
                  <?php
                    if ($index+1 == 1) {
                    ?>
                    <img src="<?= BASEURL; ?>public/img/gold.png" width="30px" height="30px" alt="...">
                    <?php
                    }elseif ($index+1 == 2) {
                    ?>
                    <img src="<?= BASEURL; ?>public/img/silver.png" width="30px" height="30px" alt="...">
                    <?php
                    }elseif ($index+1 == 3) {
                    ?>
                    <img src="<?= BASEURL; ?>public/img/bronze.png" width="30px" height="30px" alt="...">
                    <?php
                    }else {
                    echo "";
                    }
                    ?>
                    <?= $leaderboard['nama_mhs']; ?>
                </td>
                <td><?= $leaderboard['point']; ?></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      <a href="<?= BASEURL; ?>?url=Log/index" class="btn btn-primary btn-lg mt-2">Lihat Rangking Saya</a>
    </div>
  </div>
<!-- end mahasiswa terbaikkk -->

<!-- persentase kehadiran -->
  <div class="row justify-content-center">
    <p class="text-center h2 pt-5 mb-5 judulChart">Persentasi Kehadiran Mahasiswa STMIK IKMI Cirebon</p>
    <div class="card col-md-10 col-10 mb-5">
    <!-- <p class="card-title">Persentasi Kehadiran</p> -->
    <div class="card-body">
      <canvas class="canvas" id="bar-chart-grouped" width="200" height="100"></canvas>
    </div>
        
      </div>
      <script>
        // CHART 
        new Chart(document.getElementById("bar-chart-grouped"), {
                      type: 'bar',
                      data: {
                        labels: ["Teknik Informatika", "Rekayasa Perangkat Lunak", 
                        "Management Informatika", "Komputerisasi Akuntansi", "Sistem Informasi"],
                        datasets: [
                          {
                            label: "Hadir",
                            backgroundColor: "lightgreen",
                            data: [78,75,70,80,74]
                          }, {
                            label: "Tidak Hadir",
                            backgroundColor: "red",
                            data: [22,25,30,20,26]
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
        // END CHART
      </script>
    </div>
  </div>
<!-- end persentase kehadiran -->

<!-- start jumlah dosen, mahasiswa -->
  <div id="jmlh" class="row text-center pt-5 mt-5 bg-primary bg-opacity-75">
    <div class="box col-md-6 mb-3">
      <img src="<?= BASEURL; ?>public/img/dosen3.png"  class="img-fluid rounded-circle w-25" alt="Dosen">
      <p class="text-light mt-3">
        <label class="h4" for="jumlah"><?= count($data['dosen']); ?></label> <br>
        Total Dosen
      </p>
    </div>
    <div class="box col-md-6 mb-3">
      <img src="<?= BASEURL; ?>public/img/student.png"  class="img-fluid rounded-circle w-25 " alt="Student">
      <p class="text-light mt-3">
        <label class="h4" for="jumlah"><?= count($data['mhs']); ?></label> <br>
        Total Mahasiswa
      </p>
    </div>
  </div>
<!-- end -->

<!-- start faq -->
<div id="faq" class="container pt-5 mt-5">
  <div class="row">
    <div class="col-md-4">
      <h1>Frequently Asked Questions</h1>
      <img src="<?= BASEURL; ?>public/img/faq.png" class="w-100" alt="">
    </div>
    <div class="col-md-8 faq">
      <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <p class="h4">Apa itu Presline?</p>
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Presline merupakan kepanjangan dari Presensi Online. Presline adalah  aplikasi presensi online yang memudahkan mahasiswa, dosen, dan manajemen akademik dalam pengisian data e-learning dan diimplementasikan untuk memotivasi keaktifan mahasiswa maupun keaktifan dosen..</div>
            </div>
          </div>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-heading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="false" aria-controls="flush-collapseOne">
            <p class="h4">Apa kelebihan Aplikasi ini?</p>
            </button>
          </h2>
          <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Aplikasi ini terdapat forum chat dimana dosen dapat memberikan pertanyaan dan mahasiswa dapat langsung menjawabnya, sehingga dosen dapat mengetahui keaktifan dan pemahaman mahasiswa.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
            <p class="h4">Berapa lama waktu absensi yang dapat diakses mahasiswa?</p>
            </button>
          </h2>
          <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Absensi dapat diakses selama jam perkuliahan berlangsung.</div>
          </div>
        </div>
      </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            <p class="h4">Bagaimana cara mahasiswa mendapatkan point?</p>
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Mahasiswa join tepat waktu dan mahasiswa menjawab pertanyaan yang diberikan oleh dosen dengan benar.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            <p class="h4">Apakah poin dapat mempengaruhi absensi?</p>
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Ya tentu akan mempengaruhi, nilai absensi tidak maksimal.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            <p class="h4">Bagaimana jika mahasiswa berhalangan hadir dalam perkuliahan dikarenakan sakit dan sebagainya?</p>
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Jika berhalangan hadir segera konfirmasi ke Baak.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end faq -->


<!-- </div> -->



<!-- footer -->
