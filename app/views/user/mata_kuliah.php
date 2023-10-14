
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
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=User/index">Home</a>
          </li>
          <li class="nav-item col-12 col-lg-auto">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=User/mata_kuliah">Mata Kuliah</a>
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


<!-- content / isinya disini -->
<!-- start -->
<div class="row mt-3 mx-3 bg-primary">
    <p class="text-light p-2">
      <strong> Mata Kuliah </strong> <br>
      Silahkan Pilih Mata Kuliah hari ini.
    </p>
</div>
<!-- end -->

<div class="row mt-2 mx-2 justify-content-left">
  <div class="col">

  <?php Flasher::flash(); ?>
  </div>
</div>
<div class="row mt-2 mx-2 justify-content-left">
  <!-- <div class="card">
  </div> -->
    <?php
        if ($data['mk']==NULL) {
          echo "
          <h1> Belum ada Mata Kuliah Terdaftar </h1>
          ";
        }else {

          ?>
          <?php foreach($data['mk'] as $mk) : ?>
                      <?php
                        // $_SESSION['id_mk'] = $mk['id_mk'];
                      ?>
            <div class="card m-2 col-md-4 p-2 border bg-light" style="width: 18rem;">
              <img src="<?= BASEURL; ?>public/img/mk_1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $mk['nama_mk']; ?></h5>
                <p class="card-text"><?= $mk['mk_desc']; ?></p>
                <!-- <form action="<?= BASEURL; ?>?url=User/kuliah_sesi" method="post"> -->
                  <!-- <input type="text" name="id_mk" id="id_mk" value="<?= $mk['id_mk']; ?>" hidden>
                  <button type="submit" class="btn btn-primary">Pilih</button> -->
                  <a href="<?= BASEURL; ?>?url=User/getKuliah/<?= $mk['id_mk']; ?>" class="btn btn-primary">Pilih</a>
                <!-- </form> -->
                <?php 
                if ($_SESSION['level']==2) {
                  ?>
                    <a href="" class="btn btn-info UbahDesc" data-bs-toggle="modal" data-bs-target="#formDesc" data-id="<?= $mk['id_mk']; ?>">Edit Deskripsi</a>
                  <?php
                }
                ?>
              </div>
            </div>
          <?php endforeach; ?>
          <?php
          
        }
    ?>
</div>



<!-- Modal -->
<div class="modal fade" id="formDesc" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="<?= BASEURL; ?>User/ubahDesc" method="post">
          <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="mk_desc" class="form-label">Deskripsi </label>
                <textarea class="form-control" id="mk_desc" name="mk_desc" rows="3"></textarea>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    // start modal ubahDataDosen
    
      // start modal ubahDataDosen
      $('.UbahDesc').on('click', function() {
          $('.modal-title').html('Ubah Deskripsi Mata Kuliah');
          $('.modal-footer button[type=submit]').html('Ubah');
          $('#modal-size').attr('class', 'modal-dialog modal-md');


          const id = $(this).data('id');

          $.ajax({
              url: '<?= BASEURL; ?>Data_matkul/getUbahMk',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                $('#mk_desc').val(data.mk_desc);
                $('#id').val(data.id_mk);
              }
          });

      });
      // end modal tambahDataDosen 
    });

</script>