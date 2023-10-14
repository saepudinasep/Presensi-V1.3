<?php 
if ($data['leaderboard']==NULL) {
    for($i=1; $i <=10; $i++){
        ?>
        <tr class="<?php 
                if ($i == 1) {
                   echo "table-danger";
                }elseif ($i == 2) {
                    echo "table-primary";
                }elseif ($i == 3) {
                    echo "table-success";
                }else {
                    echo "";
                }
            ?>">
                <th scope="row"><?= $i; ?> <sup>
                    <?php
                    if ($i == 1) {
                        echo "st";
                    }elseif ($i == 2) {
                        echo "nd";
                    }elseif ($i == 3) {
                        echo "rd";
                    }else {
                                            echo "th";
                                        }
                                        ?>
                                    </sup></th>
                                    <td>
                                        <?php
                                            if ($i == 1) {
                                                ?>
                                                <img src="<?= BASEURL; ?>public/img/gold.png" width="30px" height="30px" alt="...">
                                                <?php
                                            }elseif ($i == 2) {
                                                ?>
                                                <img src="<?= BASEURL; ?>public/img/silver.png" width="30px" height="30px" alt="...">
                                                <?php
                                            }elseif ($i == 3) {
                                                ?>
                                                <img src="<?= BASEURL; ?>public/img/bronze.png" width="30px" height="30px" alt="...">
                                                <?php
                                            }else {
                                                echo "";
                                            }
                                        ?>
                                    <?= "......."; ?>
                                    </td>
                                    <td><?= "......."; ?></td>
                                </tr>
        <?php
  }
}else {
    ?>
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
    <?php
}
?>
