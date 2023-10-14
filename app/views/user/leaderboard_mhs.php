<div class="container mt-3">
    <a href="<?= BASEURL; ?>User/sesi_kuliah" class="btn btn-primary">Kembali</a>
</div>
<!-- leaderboard -->
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item bg-secondary rounded-top">
                    <a class="nav-link text-light" aria-current="page" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <img src="<?= BASEURL; ?>public/img/leaderboard.png" width="30px" height="30px" alt="">
                        Leaderboard
                    </a>
                </li>
            </ul>
            <div class="collapse mt-3" id="collapseExample">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-10 text-center">
                        <table class="table table-hover text-center">
                            <tbody>
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
                                    <td><?= $leaderboard['poin_presensi']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>
