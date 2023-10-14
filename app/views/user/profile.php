
<!-- start navbar -->
<!-- <div class="container"> -->
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
              <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=User/dashboard">Home</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>?url=User/mata_kuliah">Mata Kuliah</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>?url=User/profile">Profile</a>
            </li>
            <li class="nav-item col-12 col-lg-auto">
                <a class="nav-link logout" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#Logout">Logout</a>
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
        <div class="col-md-12">
              <!-- <div class="card m-2"> -->
                <?php Flasher::flash(); ?>
              <!-- </div> -->
        </div>
          <div class="col-md-6 mt-2">
              <div class="card">
                  <div class="card-header">
                    <legend> Informasi Tentang Anda! </legend>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <?php
                          if ($_SESSION['level']=='1') {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                  <img src="public/img/_uploads/<?= $data['user']['folder_uploads']; ?>" class="rounded-circle" style="height:75px; width:75px;" alt="">
                                </td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $data['user']['nama_mhs']; ?></td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td><?= $data['user']['nim']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?= $data['user']['kode_kelas']; ?></td>
                            </tr>
                              <?php
                          }elseif ($_SESSION['level']=='2') {
                              ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                  <img src="<?= BASEURL; ?>public/img/_uploads/<?= $data['user']['folder_uploads']; ?>" class="rounded-circle" style="height:75px; width:75px;" alt="">
                                </td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $data['user']['nama_dosen']; ?></td>
                            </tr>
                            <tr>
                                <td>NIDN</td>
                                <td>:</td>
                                <td><?= $data['user']['nidn']; ?></td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td><?= $data['user']['nama_prodi']; ?></td>
                            </tr>
                              <?php
                          }
                          ?>
                          
                      </table>
                      <a href="" class="btn btn-primary tombolEditProfile" data-bs-toggle="modal" data-bs-target="#formProfile" data-username="<?= $data['user']['username']; ?>">Edit</a>
                  </div>
              </div>
          </div>
          <div class="col-md-6 mt-2">
              <div class="card">
                  <div class="card-header">
                    <legend> Edit Password </legend>
                  </div>
                  <div class="card-body">
                      <fieldset>
                      <!-- <legend>Edit Password</legend> -->
                        <form action="<?= BASEURL; ?>?url=User/ubah_pass" method="post">
                          <div class="form-group mt-3 col-md-12 pass-conf">
                              <label for="pass_new" class="control-label" >
                                  <b>New password</b>
                              </label>
                              <input size="40" class="form-control form-control" id="pass_new" name="pass_new" type="password" />
                          </div>
                          <div class="form-group mt-3 col-md-12">
                              <label for="pass_confirm" class="control-label" >
                                <b>Confirm password</b>
                              </label>
                              <input  size="40" class="form-control form-control" id="pass_confirm" name="pass_confirm" type="password" />
                          </div>
                          <div class="form-group mt-3 col-md-12">
                              <label for="pass_default" class="control-label" >
                                  <b>Password Now</b>
                              </label>
                              <input size="40" class="form-control form-control" id="pass_default" name="pass_default" type="password"/>
                          </div>
                          <div class="form-group mt-3">
                              <button type="submit" class="btn btn-primary">Ubah Password</button>
                          </div>
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
        <h5 class="modal-title judulProfile" id="judulModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="<?= BASEURL; ?>?url=Log/editProfile" method="post" enctype="multipart/form-data">
          <input type="hidden" name="username" id="username">
            <div class="mb-3">
                <label for="gambar" class="form-label">Pilih gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
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

      if ($('#pass_default').val('')) {
        $('.pass-conf').attr('hidden', false);
      }else{
        $('.pass-conf').attr('hidden', true);
      }
      // $('.pass').attr('hidden', false);
      // $('.btn-pass').attr('hidden', false);

        $('.tombolEditProfile').on('click', function() {
          // $('#modal-size').attr('class', 'modal-dialog modal-md');
          $('.judulProfile').html('Ubah Foto Profile');
          $('.modal-footer button[type=submit]').html('Ubah');

          $('#modal-size').attr('class', 'modal-dialog modal-lg');

            const username = $(this).data('username');

            $.ajax({
              url: '<?= BASEURL; ?>User/getUser',
              data: {username : username},
              method: 'post',
              dataType: 'json',
              success: function(data){
                $('#username').val(data.username);
              }
          });
      });
    });
</script>