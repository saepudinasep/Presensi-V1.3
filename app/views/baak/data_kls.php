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
                            <h1 class="h2 mt-4">Prodi <?= $data['prodi_1']['nama_prodi']; ?></h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <!-- <a href="<?=BASEURL;?>Baak/data_dosen_cetak" target="_blank"><button><i class="fa fa-print" aria-hidden="true"></i></button></a> -->
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
                            <li class="breadcrumb-item active">Prodi <?= $data['prodi_1']['nama_prodi']; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <?php Flasher::flash(); ?>
                        </div>
                        <div class="row mb-4 justify-content-end">
                            <div class="col-md-6">
                                <a href="<?= BASEURL; ?>?url=Data_kelas/data_kls" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg>
                                REFRESH
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form action="<?= BASEURL; ?>?url=Data_kelas/cariKelas" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari Kelas..." name="keyword" id="keyword" autocomplete="off">
                                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Kelas
                                <a href="" class="btn btn-primary tombolTambahKelas" data-bs-toggle="modal" data-bs-target="#formKelas" style="text-decoration: none;">
                                    <img src="<?= BASEURL; ?>public/img/tambah.png" alt="" style="height: 20px;"> Tambah Data
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['kelas'] as $index => $kelas) : ?>
                                            <tr>
                                                <td><?= $index+1; ?>.</td>
                                                <td>
                                                    <a href="<?= BASEURL; ?>?url=Data_mhs/data_viewMhs/<?= $kelas['id_kelas']; ?>" style="text-decoration: none;">
                                                    <?= $kelas['kode_kelas']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= BASEURL; ?>?url=Data_kelas/UbahKelas/<?= $kelas['id_kelas']; ?>" class="UbahKelas" data-bs-toggle="modal" data-bs-target="#formKelas" data-id="<?= $kelas['id_kelas']; ?>">
                                                        <img src="<?= BASEURL; ?>public/img/edit.png" alt="" style="height: 20px;">
                                                    </a>
                                                    <a href="<?= BASEURL; ?>?url=Data_kelas/hapusKelas/<?= $kelas['id_kelas']; ?>" onclick="return confirm('yakin akan menghapus data ini?');">
                                                        <img src="<?= BASEURL; ?>public/img/delete.jpg" alt="" style="height: 20px;">
                                                    </a>
                                                    <a href="" class="Detailkelas" data-bs-toggle="modal" data-bs-target="#formDetail" data-id="<?= $kelas['id_kelas']; ?>">
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
<div class="modal fade" id="formKelas" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="<?= BASEURL; ?>?url=Data_kelas/tambahKelas" method="post">
          <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="kode_kelas" class="form-label">Kode Kelas</label>
                <input type="text" class="form-control" id="kode_kelas" name="kode_kelas">
            </div>
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
            </div>
            <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
                <select class="form-select" id="prodi" name="prodi" disabled>
                    <option value="<?= $_SESSION['id_prodi']; ?>"><?= $data['prodi_1']['nama_prodi']; ?></option>
                </select>     
            </div>
            <div class="mb-3">
                <label for="jenis_jalur" class="form-label">Jenis Jalur</label>
                <input type="text" class="form-control" id="jenis_jalur" name="jenis_jalur">
            </div>
            <div class="mb-3">
                <label for="jenis_kelas" class="form-label">Jenis Kelas</label>
                <input type="text" class="form-control" id="jenis_kelas" name="jenis_kelas">
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester">
            </div>
            <div class="mb-3">
                <label for="kelas_ket" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="kelas_ket" name="kelas_ket">
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
        //start modal tombolTambahKelas
        $('.tombolTambahKelas').on('click', function() {
            $('.modal-title').html('Tambah Data Kelas');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('#modal-size').attr('class', 'modal-dialog modal-md');

            $('#kode_kelas').val('');
            $('#nama_kelas').val('');
            $('#jenis_jalur').val('');
            $('#jenis_kelas').val('');
            $('#semester').val('');
            $('#kelas_ket').val('');
            $('#id').val('');

      });
        // end modal tombolTambahKelas 

        
      // start modal ubahDataProdi
      $('.UbahKelas').on('click', function() {
            $('.modal-title').html('Ubah Data Prodi');
            $('.modal-footer button[type=submit]').html('Ubah');
            $('#modal-size').attr('class', 'modal-dialog modal-md');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>Data_kelas/UbahKelas');
            // $('#username').attr('', 'disabled');
            $('#username').attr('readonly', true);

            const id = $(this).data('id');

            $.ajax({
              url: '<?= BASEURL; ?>Data_kelas/getUbahKelas',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                //   console.log(data);kode_kelas, nama_kelas, prodi, jenis_jalur, jenis_kelas, semester, kelas_ket
                  $('#kode_kelas').val(data.kode_kelas);
                  $('#nama_kelas').val(data.nama_kelas);
                  $('#prodi').val(data.id_prodi);
                  $('#jenis_jalur').val(data.jenis_jalur);
                  $('#jenis_kelas').val(data.jenis_kelas);
                  $('#semester').val(data.semester);
                  $('#kelas_ket').val(data.kelas_ket);
                  $('#id').val(data.id_kelas);
              }
          });
      });
      // end modal ubahDataProdi

      
      // start modal ubahDataProdi
      $('.Detailkelas').on('click', function() {
        $('.modal-title').html('Detail Kelas');
        $('#close').html('Close');

        $('#modal-size_formDetail').attr('class', 'modal-dialog modal-sm');

            const id = $(this).data('id');

            $.ajax({
              url: '<?= BASEURL; ?>Data_kelas/getUbahKelas',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  let detail = '<p> Kode Kelas : '+data.kode_kelas+'</br> Nama Kelas : '+data.nama_kelas+'</br> Jenis Jalur : '+data.jenis_jalur+'</br> Jenis Kelas : '+data.jenis_kelas+'</br> Keterangan : '+data.kelas_ket+'</br> Semester : '+data.semester+'</p>';
                    $('.pLog').html(detail);
              }
          });
      });
      // end modal ubahDataProdi
    });
</script>