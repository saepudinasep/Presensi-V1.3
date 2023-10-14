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
                            <a class="nav-link active collapsed" href="<?= BASEURL; ?>?url=Baak/data_akademik" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                            <a class="nav-link" href="<?= BASEURL; ?>?url=Baak/data_presensi_mhs">
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
                            <h1 class="h2 mt-4">Jadwal Kuliah Kelas <?= $data['kelas']['kode_kelas']; ?></h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href=""><button type="button" class="btn btn-sm btn-outline-secondary m-1">Export</button></a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary m-1" data-bs-toggle="collapse" href="#collapseExample">Import</button>
                                    </div>
                                </div>
                        </div>
                        <!-- collapse -->
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <p>Pilih file yang akan diimport!</p>
                                <form enctype="multipart/form-data"  action="<?= BASEURL; ?>Baak/data_dosen" method="post">
                                    <input class="form-control" name="fileexcel" type="file" required="required">
                                    <br>
                                    <button class="btn btn-sm btn-info" type="submit" name="import">Import</button>
                                </form>
                            </div>
                        </div>
                        <!-- end collapse -->
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= BASEURL;?>?url=Baak/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= BASEURL;?>?url=Baak/data_akademik">Data Akademik</a></li>
                            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>?url=Data_kelas/kls/<?= $data['prodi_1']['id_prodi']; ?>">Prodi <?= $data['prodi_1']['nama_prodi']; ?></a></li>
                            <li class="breadcrumb-item active">Kelas <?= $data['kelas']['kode_kelas']; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <?php Flasher::flash(); ?>
                        </div>
                        <!-- <div class="card mb-4"> -->
                            <!-- <a href="" class="btn btn-success mb-2">Jadwal Kuliah</a> -->
                        <!-- </div> -->
                        <div class="row mb-4 justify-content-end">
                            <div class="col-md-12">
                                <a href="<?= BASEURL; ?>?url=Data_mhs/viewMhs" class="btn btn-success">Mahasiswa</a>
                                <a href="<?= BASEURL; ?>?url=Data_mhs/viewMhs" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg>
                                REFRESH
                                </a>
                            </div>
                            <!-- <div class="col-md-6">
                                <form action="<?= BASEURL; ?>?url=Data_mhs/cariMhs" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
                                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Jadwal 
                                <a href="" class="btn btn-primary tombolTambahJadwal" data-bs-toggle="modal" data-bs-target="#formMhs" style="text-decoration: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    Tambah Data
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Mata Kuliah</th>
                                            <th>Sesi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['mhs'] as $index => $mhs) : ?>
                                            <tr>
                                                <td><?= $index+1; ?>.</td>
                                                <td>
                                                    <?= $mhs['nama_mhs']; ?>
                                                </td>
                                                <td>
                                                    <?= $mhs['nim']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= BASEURL; ?>?url=Data_mhs/UbahMhs/<?= $mhs['id_mhs']; ?>" class="UbahMhs" data-bs-toggle="modal" data-bs-target="#formMhs" data-id="<?= $mhs['id_mhs']; ?>">
                                                        <img src="<?= BASEURL; ?>public/img/edit.png" alt="" style="height: 20px;">
                                                    </a>
                                                    <a href="<?= BASEURL; ?>?url=Data_mhs/hapusMhs/<?= $mhs['username']; ?>" onclick="return confirm('yakin akan menghapus data ini?');">
                                                        <img src="<?= BASEURL; ?>public/img/delete.jpg" alt="" style="height: 20px;">
                                                    </a>
                                                    <a href="" class="DetailMhs" data-bs-toggle="modal" data-bs-target="#formDetail" data-id="<?= $mhs['id_mhs']; ?>">
                                                        <img src="<?= BASEURL; ?>public/img/detail.png" alt="" style="height: 20px;">
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



                             
<!-- Modal -->
<div class="modal fade" id="formMhs" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="<?= BASEURL; ?>?url=Data_mhs/tambahJadwal" method="post">
          <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="id_mk" class="form-label">Mata Kuliah</label>
                <select class="form-select" id="id_mk" name="id_mk">
                    <?php
                        foreach($data['mk'] as $mk) :
                    ?>
                    <option value="<?= $mk['id_mk']; ?>"><?= $mk['nama_mk']; ?></option>
                    <?php
                      endforeach;
                    ?>
                </select>     
            </div>
            <div class="mb-3">
                <label for="tanggal_perkuliahan" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal_perkuliahan" name="tanggal_perkuliahan">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <!-- <span class="tombol"></span> -->
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Detail -->

<div class="modal fade" id="formDetail" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size_formDetail" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <span class="pLog"></span>
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <span class="tombol"></span>
        <!-- <button type="button" id="aksi" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



<script>
    $(function () {
        //start modal tombolTambahJadwal
        $('.tombolTambahJadwal').on('click', function() {
            $('.modal-title').html('Tambah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>?url=Data_mhs/tambahJadwal');
            $('#modal-size').attr('class', 'modal-dialog modal-md');

            $('#nama_mhs').val('');
            $('#nim').val('');
            $('#jk').val('');
            $('#id').val('');

      });
        // end modal tombolTambahJadwal 

        
      // start modal ubahDataProdi
      $('.UbahMhs').on('click', function() {
            $('.modal-title').html('Ubah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah');
            $('#modal-size').attr('class', 'modal-dialog modal-md');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>Data_mhs/UbahMhs');
            // $('#username').attr('', 'disabled');
            $('#username').attr('readonly', true);

            const id = $(this).data('id');

            $.ajax({
              url: '<?= BASEURL; ?>Data_mhs/getUbahMhs',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                if (data.gender=='L') {
                    $('#jkl').attr('checked', true);
                    $('#jkp').attr('checked', false);
                }
                else if(data.gender=='P'){
                    $('#jkp').attr('checked', true);
                    $('#jkl').attr('checked', false);
                }
                    $('#nama_mhs').val(data.nama_mhs);
                    $('#nim').val(data.nim);
                    $('#id').val(data.id_mhs);
              }
          });
      });
      // end modal ubahDataProdi

      
      // start modal ubahDataProdi
      $('.DetailMhs').on('click', function() {
        $('.modal-title').html('Detail Mahasiswa');
        $('#close').html('Close');

        $('#modal-size_formDetail').attr('class', 'modal-dialog modal-sm');

            const id = $(this).data('id');

            $.ajax({
              url: '<?= BASEURL; ?>Data_mhs/getUbahMhs',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  var gender;
                if (data.gender=='L') {
                    gender = 'LAKI - LAKI';
                }
                else if(data.gender=='P'){
                    gender = 'Perempuan';
                }

                var status;
                if (data.status_mhs=='1') {
                    status = 'AKTIF';
                }
                  let detail = '<p> NIM : '+data.nim+'</br> Nama : '+data.nama_mhs+'</br> Username : '+data.username+'</br> Jenis Kelamin : '+gender+'</br> Status : '+status+'</p>';
                    $('.pLog').html(detail);
              }
          });
      });
      // end modal ubahDataProdi
    });
</script>