<!-- start topbar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-4 m-1 h1" href="<?= BASEURL; ?>?url=Baak/dashboard">
            <img src="<?= BASEURL; ?>public/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            Presline
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user']; ?></span>
                    <img src="<?= BASEURL; ?>public/img/_uploads/<?= $data['user']['folder_uploads']; ?>" style="height: 30px;" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item logout" href="" data-bs-toggle="modal" data-bs-target="#Logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
<!-- end topbar -->

<!-- start sidebar -->

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link mt-3" href="<?= BASEURL; ?>?url=Baak/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="<?= BASEURL; ?>?url=Baak/data_akademik">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Akademik
                            </a>
                            <a class="nav-link" href="<?= BASEURL; ?>?url=Baak/data_dosen">
                                <div class="sb-nav-link-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
                                  </svg>
                                </div>
                                Data Dosen
                            </a>
                            <a class="nav-link" href="<?= BASEURL; ?>?url=Baak/data_matkul">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Mata Kuliah
                            </a>
                            <a class="nav-link" href="<?= BASEURL; ?>?url=Baak/data_presensi_dosen">
                                <div class="sb-nav-link-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                                  </svg>
                                </div>
                                Presensi Dosen
                            </a>
                            <a class="nav-link active" href="<?= BASEURL; ?>?url=Baak/data_presensi_mhs">
                                <div class="sb-nav-link-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                  </svg>
                                </div>
                                Presensi Mahasiswa
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
          
<!-- end sidebar -->



<!-- start Content -->
<div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 mt-4">Prodi <?= $data['prodi_1']['nama_prodi']; ?></h1>
                        </div>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= BASEURL;?>?url=Baak/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= BASEURL;?>?url=Baak/data_presensi_mhs">Presensi Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Prodi <?= $data['prodi_1']['nama_prodi']; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Kelas
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['kelas'] as $index => $kelas) : ?>
                                            <tr>
                                                <td><?= $index+1; ?>.</td>
                                                <td>
                                                    <a href="<?= BASEURL; ?>?url=Data_presensi_mhs/presensi_mk_mhs/<?= $kelas['id_kelas']; ?>" style="text-decoration: none;">
                                                    <?= $kelas['kode_kelas']; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

