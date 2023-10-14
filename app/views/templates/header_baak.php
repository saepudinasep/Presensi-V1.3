
<?php

  if ($_SESSION['user'] == "") {
    header("Location:".BASEURL);
  }

  if ($_SESSION['level']==1) {
    header("Location:".BASEURL."?url=User/index");
  }elseif ($_SESSION['level']==2) {
    header("Location:".BASEURL."?url=User/index");
  }



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $data['judul']; ?></title>
        <link rel="icon" href="<?= BASEURL; ?>public/img/logoikmi.png">
        <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/style.css">
        <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style_me.css">
        <script src="<?= BASEURL; ?>public/js/all.js" crossorigin="anonymous"></script>
        <script src="<?= BASEURL; ?>public/js/chart.js"></script>
        <script src="<?= BASEURL; ?>public/js/jquery-3.6.1.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        


