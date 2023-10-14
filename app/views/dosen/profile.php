
<!-- start navbar -->
<!-- <div class="container"> -->
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
              <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/dashboard">Home</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/mata_kuliah">Mata Kuliah</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=Dosen/profile">Profile</a>
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
                              <td><?= $data['dosen']['nama_dosen']; ?></td>
                          </tr>
                          <tr>
                              <td>NIDN</td>
                              <td>:</td>
                              <td><?= $data['dosen']['nidn']; ?></td>
                          </tr>
                          <tr>
                              <td>Program Studi</td>
                              <td>:</td>
                              <td><?= $data['dosen']['nama_prodi']; ?></td>
                          </tr>
                          <tr>
                              <td>WhatsApp</td>
                              <td>:</td>
                              <td><?= $data['user']['terverifikasi_wa']; ?></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td><?= $data['user']['terverifikasi_email']; ?></td>
                          </tr>
                      </table>
                      <a href="" class="btn btn-primary tombolEditProfile" data-bs-toggle="modal" data-bs-target="#formProfile" data-username="<?= $data['dosen']['username']; ?>">Edit</a>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Edit User Login</div>
                  <div class="card-body">
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



  <!-- Modal -->
<div class="modal fade" id="formProfile" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div id="modal-size" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="<?= BASEURL; ?>?url=Baak/editProfile" method="post">
          <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="number" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="nidn" class="form-label">nidn</label>
                <input type="nim" class="form-control" id="nidn" name="nidn">
            </div>
            <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
              <select class="form-select" id="prodi" name="prodi">
                    <?php
                        foreach($data['prodi'] as $prodi) :
                    ?>
                    <option value="<?= $prodi['id_prodi']; ?>"><?= $prodi['nama_prodi']; ?></option>
                    <?php
                      endforeach;
                    ?>
                </select>     
            </div>
            <div class="mb-3">
                <label for="wa" class="form-label">WhatsApp</label>
                <input type="text" class="form-control" id="wa" name="wa">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
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

<script>
    $(function(){
        $('.tombolEditProfile').on('click', function() {
            $('.modal-title').html('Edit Profile');
            $('.modal-footer button[type=submit]').html('Edit');
            $('#modal-size').attr('class', 'modal-dialog modal-md');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>Baak/editProfile');
            // $('#username').attr('', 'disabled');
            $('#username').attr('readonly', true);

            const username = $(this).data('username');

            $.ajax({
              url: '<?= BASEURL; ?>Baak/getUser',
              data: {username : username},
              method: 'post',
              dataType: 'json',
              success: function(data){
                // $('#nim').val(data.nim);
                // $('#nama').val(data.nama_mhs);
                // // $('#jk').val(data.gender);
                // $('#prodi').val(data.id_prodi);
                // $('#username').val(data.username);
                // $('#id').val(data.id_mhs);
              }
          });
      });
    });
</script>