<?php


if ($_SESSION['user'] == "") {
    header("Location:".BASEURL);
}

    // if (@$_SESSION['nama'] != "") {
    //     if ($_SESSION['level']==1) {
    //         header("Location:".BASEURL."?url=mahasiswa/dashboard");
    //     }elseif ($_SESSION['level']==2) {
    //         header("Location:".BASEURL."?url=dosen/dashboard");
    //     }elseif ($_SESSION['level']==3) {
    //         header("Location:".BASEURL."?url=baak/dashboard");
    //     }
    // }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">

    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    
    <!-- <script>
  $( function() {
    $( document ).tooltip();
  } );

 
  </script>

  <style type="text/css">
      #message {
    display:none;
    width: 730px;
    /*background: #f1f1f1;
    color: #000;
    position: relative;
    padding:10px 20px;
    width:30%;
    margin:auto;
    margin-top:-20px;*/
}
#message p {
    padding: 0px 50px;
    font-size: 16px;
}
.valid {
    color: green;
}
.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}
.invalid {
    color: red;
}
.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
}
  </style> -->
</head>
<body>


<!--  -->



<div class="container m-3 p-3">
	<h2 class="text-black-50">Hallo <?= $_SESSION['nama']; ?></h4>
	<h4 class="text-black-50">Silahkan ubah password terlebih dahulu !</h4>
    <form action="<?= BASEURL; ?>?url=Log/ubah_pass" method="post">
        <input type="text" name="user_session" id="user_session" value="<?= $_SESSION['user']; ?>" hidden>
        <input type="text" name="pass_session" id="pass_session" value="<?= $_SESSION['pass']; ?>" hidden>
        <input type="text" name="admin_lev" id="admin_lev" value="<?= $_SESSION['level']; ?>" hidden>
        <div class="form-group">
            <div class="col-sm-8">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="form-group mt-3 pt-3">
            <label for="pass_default" class="col-sm-2 control-label" >
                <b>Password default</b>
            </label>
            <div class="col-sm-8">            
                <input size="40" class="form-control form-control" id="pass_default" name="pass_default" type="tex" />
                <!-- <p class="help-block">Masukan Password Default Anda Tadi.</p> -->
            </div>
            <!-- <div class="col-sm-2"></div> -->
        </div>
        <div class="form-group mt-3 pt-3">
            <label for="pass_new" class="col-sm-2 control-label" >
                <b>New password</b>
            </label>
            <div class="col-sm-8">            
                <input size="40" class="form-control form-control" id="pass_new" name="pass_new" type="password" />
                <!-- <p class="help-block">Masukan Password Baru Anda.</p> -->

            </div>
            <!-- <div class="col-sm-2"></div> -->
        </div>
        <!-- <div class="form-group mt-3 p-3 border" id="message">
            <h6 class="text-secondary">Password harus terdiri dari: </h6>
            <p id="letter" class="invalid">Memiliki <b>huruf kecil</b></p>
            <p id="capital" class="invalid">Memiliki <b>huruf besar</b></p>
            <p id="number" class="invalid">Memiliki <b>nomor</b></p>
            <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
        </div> -->
        <div class="form-group mt-3 pt-3">
            <label for="pass_confirm" class="col-sm-2 control-label" >
                <b>Confirm password</b>
            </label>
            <div class="col-sm-8">
                <input  size="40" class="form-control form-control" id="pass_confirm" name="pass_confirm" type="password" />
                <!-- <p class="help-block">Pastikan Password Konfirmasi Anda Sudah Sama dengan Password Baru Anda.</p> -->
            </div>
        </div>
        <div class="form-group mt-3 pt-3">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </div>
    </form>

</div>


<script type="text/javascript" src="<?= BASEURL; ?>public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/sweetalert.min.js"></script>

<script type="text/javascript" src="<?= BASEURL; ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>public/js/script.js"></script>


<!-- <script type="text/javascript">
    var myInput = document.getElementById("pass_new");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
    }
</script> -->


</body>
</html>