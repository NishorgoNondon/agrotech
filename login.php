<?php
    session_start();
    $con = mysqli_connect("localhost","root","","agrotechdb") or die("connection error");
    if(isset($_POST['login'])){
        $userID = mysqli_real_escape_string($con,$_POST['userID']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $check = mysqli_query($con,"select * from `Participant` where `User ID` = '$userID' AND `Password`='$password'");
        $res = mysqli_fetch_assoc($check);
        if(mysqli_num_rows($check)){
            if ($res['Type'] === '') {
                header('Location:dashboard.html');
            }
        }else{
            $msg = "<div class='alert' role='alert'>
            Please Enter Correct Username And Password</a>
            </div>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/styleN.css">
    <style>
        body {
            background-image: url(images/bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            height: 120vh;
        }
    </style>
</head>
<body class="img js-fullheight">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Welcome to AgroTech</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                  <h3 class="mb-4 text-center">Have an account?</h3>
                  <form method = "post" class="signin-form">
                    <div class="form-group">
                      <input type="text" name = "userID"class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input name = "password" id="password-field" type="password" class="form-control" placeholder="Password" required>
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                      <button name = "login" type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                    </div>
                    <div class="form-group d-md-flex">
                      <div class="w-50">
                        <label class="checkbox-wrap checkbox-primary">Remember Me
                          <input type="checkbox" checked>
                          <span class="checkmark"></span>
                        </label>
                      </div>
                      <div class="w-50 text-md-right">
                        <a href="#" style="color: #fff">Forgot Password</a>
                      </div>
                    </div>
                  </form>
                  <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                  <div class="social d-flex text-center">
                    <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                    <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-google mr-2"></span> Google</a>
                  </div>
                  <p></p>
                  <p class="w-100 text-center"> Don't Have An Account? <a href="signup.php" style="color: rgb(203, 203, 54)"> Sign Up</a></p>
              </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
