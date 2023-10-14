<?php
date_default_timezone_set('Asia/Jakarta');
$hari_sekarang = date('d');
$bln_sekarang = date('m');
$thn_sekarang = date('Y');
$minute = date('H:i:s');
?>

<p>
<?= $hari_sekarang.'-'.$bln_sekarang.'-'.$thn_sekarang.' '.$minute; ?>
</p>
        <!-- <table class="table table-striped table-hover"> -->
            <tbody>

                   <?php
                  //  sesi mahasiswa
                   if ($_SESSION['level']==1) {
                    ?>
                    <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
                      <?php
                        $hari_jadwal = date('d', strtotime($sesi_mk['jadwal_perkuliahan']));
                        $bln_jadwal = date('m', strtotime($sesi_mk['jadwal_perkuliahan']));
                        $thn_jadwal = date('Y', strtotime($sesi_mk['jadwal_perkuliahan']));
                        ?>
                      <tr>
                          <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
                          <td><?= $sesi_mk['nama_dosen']; ?> | <?= $hari_jadwal.'-'.$bln_jadwal.'-'.$thn_jadwal; ?></td>
                          <?php
                          if ($thn_sekarang>=$thn_jadwal && $bln_sekarang>=$bln_jadwal && $hari_sekarang>=$hari_jadwal) {
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
                  //  sesi dosen
                   elseif ($_SESSION['level']==2) {
                    //  var_dump($_SESSION['id_mk']);
                    ?>
                    <?php foreach($data['sesi_mk'] as $sesi_mk) : ?>
                <tr>
                    <!-- <td><?= $sesi_mk['nama_mk']; ?></td> -->
                    <td><?= $sesi_mk['nama_mk_sesi']; ?></td>
                    <?php
                    // jika status mata kuliah = -1
                        if ($sesi_mk['no_subject']==-1) {
                    ?>
                          <td colspan="2">
                          <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-warning" data-id="<?= $sesi_mk['id_mk_sesi']; ?>">Belum Mulai</a>
                          </td>
                          <?php
                          
                    // jika status mata kuliah = 0
                        }elseif ($sesi_mk['no_subject']==0) {

                          ?>
                          <td>
                          <a href="" class="btn btn-sm btn-danger disabled">Berakhir</a>
                          
                          </td>
                          <td>
                            <a href="<?= BASEURL; ?>?url=User/leaderboard/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-success">Leaderboard</a>
                          </td>

                    <?php
                    // jika status mata kuliah = 1
                        }elseif ($sesi_mk['no_subject']==1) {

                          ?>
                          <td colspan="2">
                          <a href="<?= BASEURL ?>?url=User/getSesi/<?= $sesi_mk['id_mk_sesi']; ?>" class="btn btn-sm btn-primary">Join Sesi</a>
                          
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
        <!-- </table> -->
    <!-- </div> -->