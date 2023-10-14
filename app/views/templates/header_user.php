<?php

if ($_SESSION['user']=="") {
    header("Location:".BASEURL);
}

if ($_SESSION['level']==3) {
    header("Location:".BASEURL."?url=Baak/dashboard");
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

    <script src="<?= BASEURL; ?>public/js/chart.js"></script>    
    <script src="<?= BASEURL; ?>public/js/jquery-3.6.1.min.js"></script>
    <style>
        .offline{
            filter: brightness(20%);
        }
        .online{
            filter: brightness(100%);
        }
    </style>
</head>
<body>
    