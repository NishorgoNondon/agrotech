<?php

    if(isset($_POST['Farmer'])){
        header("Location: farmerSignUp.php");
    }
    if(isset($_POST['Employee'])){
        header("Location: employeeSignUp.php");
    }
    if(isset($_POST['Dealer'])){
        header("Location: dealerSignUp.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - AgroTech</title>
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
            height: 175vh;
        }
        .highlight-text{
          color: rgb(203, 203, 54);
        }
        select.form-control {
            color: #000;
        }
        select.form-control option {
            color: #000;
        }
    </style>
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                <h1> <span class="text-warning">Agro<span class="text-white">Tech</span></a> </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Select User Type</h3>
                        <form method="post" class="signup-form">
                            <div class="form-group">
                                <button type="submit" name= "Farmer" class="form-control btn btn-primary submit px-3">Farmer</button>
                            </div>
                        </form>
                        <form method="post" class="signup-form">
                            <div class="form-group">
                                <button type="submit" name= "Employee" class="form-control btn btn-primary submit px-3">Employee</button>
                            </div>
                        </form>
                        <form method="post" class="signup-form">
                            <div class="form-group">
                                <button type="submit" name= "Dealer" class="form-control btn btn-primary submit px-3">Dealer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
