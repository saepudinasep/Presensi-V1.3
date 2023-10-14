

<?php

session_start();
if (@$_SESSION['user'] != "") {
    if ($_SESSION['level']==3) {
        header("Location:".BASEURL."?url=Baak/dashboard");
        
        // $user = md5($_SESSION['user']);
        // if ($_SESSION['pass']==$user) {
        //     header("Location:".BASEURL."?url=Log/ubah_password");
        // }else {
        //     header("Location:".BASEURL."?url=Baak/dashboard");
        // }
    }else {
        header("Location:".BASEURL."?url=User/index");
        // $user = md5($_SESSION['user']);
        // if ($_SESSION['pass']==$user) {
        //     header("Location:".BASEURL."?url=Log/ubah_password");
        // }else {
        //     header("Location:".BASEURL."?url=User/index");
        // }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style_me.css">

    <script src="<?= BASEURL; ?>public/js/chart.js"></script>

    <style type="text/css">
        
    </style>
</head>
<body>
