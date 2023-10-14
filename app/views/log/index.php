<?php
session_start();
// if (@$_SESSION['user'] != "") {
//   if ($_SESSION['level']==3) {
      
//       $user = md5($_SESSION['user']);
//       if ($_SESSION['pass']==$user) {
//           header("Location:".BASEURL."?url=Log/ubah_password");
//       }else {
//           header("Location:".BASEURL."?url=Baak/dashboard");
//       }
//   }else {
//       $user = md5($_SESSION['user']);
//       if ($_SESSION['pass']==$user) {
//           header("Location:".BASEURL."?url=Log/ubah_password");
//       }else {
//           header("Location:".BASEURL."?url=User/index");
//       }
//   }
//   // elseif ($_SESSION['level']==2) {
//   //     header("Location:".BASEURL."?url=Dosen/dashboard");
//   // }elseif ($_SESSION['level']==3) {
//   //     header("Location:".BASEURL."?url=Baak/dashboard");
//   // }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Presline</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">
</head>
<body class="bg-info">

<div class="container mt-4 pt-4"> 
   <div class="row">
    <div class="col-md-8">
      <img src="<?= BASEURL; ?>public/img/logo13.png" class="img-fluid d-block w-75" alt="gambar hero">
    </div>
    <div class="col-md-4">
      <div class="card shadow p-3 mb-5 bg-light rounded">
        <div class="card-body">
          <form action="<?= BASEURL; ?>?url=Log/login" method="post">
            <h1 class="text-primary mt-2">Welcome...</h1>
            <h3 class="text-primary">Sign in to Presline</h3>
              <?php Flasher::flash(); ?>
            <div class="mb-2 pt-2">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username" required>
              <div class="form-text">We'll never share your username with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <!-- <div class="mb-2 form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Log in</button>
            <a href="<?= BASEURL; ?>" class="btn btn-danger">Kembali</a>
            <!-- <button type="button" class="btn btn-link" style="text-decoration: none; font-size: 14px;">Lupa Password</button> -->
            <!-- <a id="close" class="btn btn-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none; font-size: 14px;">
                Lupa Password
              </a>
            <div class="collapse" id="collapseExample">
              <div class="card card-body mt-3">
                Cek kembali username dan Password jika masih salah segera hubungi BAAK
              </div>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>

<script type="text/javascript" src="<?= BASEURL; ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/script.js"></script>


</body>
</html>