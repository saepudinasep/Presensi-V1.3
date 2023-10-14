<?php
date_default_timezone_set('Asia/Jakarta');
$minute = date('H:i:s');
$tgl_sekarang = date('d-m-Y');
?>
<!-- END AJAX -->
<div class="container">
  <div class="row mt-3 bg-primary">
    <p class="text-light p-2">
        <strong><a href="<?= BASEURL; ?>?url=User/mata_kuliah" class="text-light"> Mata Kuliah</a> </strong> /
        <?= $data['mk']['nama_mk']; ?>
        <br>
        Silahkan Pilih Sesi Kuliah Anda hari ini.
    </p>
  </div>
</div>
<div class="container">
  <div class="row mt-3" id="waktu">
  </div>
  <div class="row mt-2">
  <div class="col">
      <table class="table table-responsive table-striped table-hover">
        <tbody>
        <?php
        //  sesi mahasiswa
        if ($_SESSION['level']==1) {
        ?>
        <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
          <?php
            $tgl_jadwal = date('d-m-Y', strtotime($sesi_mk['jadwal_perkuliahan']));
            $jarak = strtotime($tgl_jadwal) - strtotime($tgl_sekarang);
            $hari = $jarak/60/60/24;
            ?>
          <tr>
              <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
              <td><?= $sesi_mk['nama_dosen']; ?> | <?= $tgl_jadwal; ?></td>
              <?php
              if ($hari<=0) {
                if ($sesi_mk['status_mk_sesi']==0) {
                  ?>
                <td>
                  <a href="" class="btn btn-sm btn-danger disabled">Berakhir</a>
                </td>
                <td>
                  <a href="<?= BASEURL; ?>?url=User/leaderboard/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-success">Leaderboard</a>
                </td>
                  <?php
                }else {
                  ?>
                
                  <td colspan="2">
                    <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-warning" data-id="<?= $sesi_mk['id_mk_sesi']; ?>" onclick="return confirm('Anda ingin masuk di sesi yang belum dimulai dosen?')">Belum Mulai</a>
                  </td>
                  <?php
                }
                
              }else {
                ?>
                <td colspan="2">
                  <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-warning disabled" data-id="<?= $sesi_mk['id_mk_sesi']; ?>">Belum Mulai</a>
                </td>
                <?php
              }
              ?>
          </tr>
          
          <?php endforeach; ?>
        <!-- end -->
        <?php
        }
        //  sesi dosen
        elseif ($_SESSION['level']==2) {
        //  var_dump($_SESSION['id_mk']);
        ?>
        <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
          <?php
            $tgl_jadwal = date('d-m-Y', strtotime($sesi_mk['jadwal_perkuliahan']));
            $jarak = strtotime($tgl_jadwal) - strtotime($tgl_sekarang);
            $hari = $jarak/60/60/24;
            ?>
          <tr>
              <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
              <td><?= $sesi_mk['nama_dosen']; ?> | <?= $tgl_jadwal; ?></td>
              <?php
              if ($hari<=0) {
                if ($sesi_mk['status_mk_sesi']==0) {
                  ?>
                <td>
                  <a href="" class="btn btn-sm btn-danger disabled">Berakhir</a>
                </td>
                <td>
                  <a href="<?= BASEURL; ?>?url=User/leaderboard/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-success">Leaderboard</a>
                </td>
                  <?php
                }else {
                  ?>
                
                  <td colspan="2">
                  <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-primary">Join Sesi</a>
                  
                  </td>
                  <?php
                }
                
              }else {
                ?>
                <td colspan="2">
                <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-warning disabled" data-id="<?= $sesi_mk['id_mk_sesi']; ?>">Belum Mulai</a>
                </td>
                <?php
              }
              ?>
          </tr>

        <?php endforeach; ?>
        <!-- end -->
        <?php
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>
</div>


<script>
  
  $(document).ready(function () {

    setInterval(function() {
      waktu();
    }, 10);

    function waktu() {
      $.ajax({
        url: "<?= BASEURL; ?>User/waktu_ajax",
        success: function (data) {
          $('#waktu').html(data);
                      // console.log(data.nama_mk);
                  // $('#mk_info_join').html(data);
        }
      });
    }
    
  });
</script>

<!-- end content -->