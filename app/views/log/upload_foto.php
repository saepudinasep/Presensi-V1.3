<?php

session_start();
// if ($_SESSION['user'] == "") {
//     header("Location:".BASEURL);
//   }

//   if ($_SESSION['level']==3) {
//     header("Location:".BASEURL."?url=Baak/dashboard");
//   }else {
//     header("Location:".BASEURL."?url=User/index");
//   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presline - Upload Foto</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">
</head>
<body>


<!--  -->



<div class="container mt-3 pt-3">
	<h2 class="text-black-50">Hallo <?= $_SESSION['nama']; ?></h4>
	<h4  class="text-black-50">Silahkan Upload Foto Profile terlebih dahulu !</h4>
    <form action="<?= BASEURL; ?>?url=Log/foto_profile" method="post" enctype="multipart/form-data">
        <input type="text" name="user" id="user" value="<?= $_SESSION['user']; ?>" hidden>
        <div class="form-group">
            <div class="col-sm-8">
                <!-- <?php Flasher::flash(); ?> -->
            </div>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Pilih Foto</label>
            <input class="form-control" type="file" id="gambar" name="gambar">
            </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>

<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>

<script type="text/javascript" src="<?= BASEURL; ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/script.js"></script>


</body>
</html>