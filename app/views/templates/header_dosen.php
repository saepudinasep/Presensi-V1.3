<?php
    // session_start();
    // if (isset($_COOKIE['ch_sid']) && isset($_COOKIE['lvl'])) {
    //     $_SESSION['user'] = $_COOKIE['ch_sid'];
    //     $_SESSION['level'] = $_COOKIE['lvl'];
    //     if ($_SESSION['user']===hash('sha256', $ch_sid)) {
    //         if ($_SESSION['level']==1) {
    //             header("Location:".BASEURL."?url=Mahasiswa/dashboard");
    //         }elseif ($_SESSION['level']==2) {
    //             header("Location:".BASEURL."?url=Dosen/dashboard");
    //         }elseif ($_SESSION['level']==3) {
    //             header("Location:".BASEURL."?url=Baak/dashboard");
    //         }
    //     }
    // }



    if ($_SESSION['user']=="") {
        header("Location:".BASEURL);
    }

    if ($_SESSION['level']==1) {
        header("Location:".BASEURL."?url=Mahasiswa/dashboard");
    }elseif ($_SESSION['level']==3) {
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    