<?php
    session_start();
    $con = mysqli_connect("localhost","root","","agrotechdb") or die("connection error");
    if(isset($_POST['signup'])){
        $userID = mysqli_real_escape_string($con, $_POST['userID']);
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $area = mysqli_real_escape_string($con, $_POST['area']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        mysqli_query($con, "INSERT INTO `Participant`(`User ID`, `First Name`, `Last Name`, `Gender`, `Area`, `Contact`, `Password`, `Type`) VALUES('$userID', '$fname', '$lname', '$gender', '$area', '$contact', '$password', 'Farmer')");
        mysqli_query($con, "INSERT INTO `Farmer`(`Farmer ID`, `Address`) VALUES('$userID', '$address')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Sign Up</title>
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
                  <h2 class="heading-section">Welcome to <span class="highlight-text">Agro</span>Tech</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Create an Account</h3>
                        <form method="post" class="signup-form">
                            <div class="form-group">
                                <input type="text" name= "fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name= "gender">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "contact" class="form-control" placeholder="Mobile No." required>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "address" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name= "area">
                                    <option value="" disabled selected>Area</option>
                                    <option value= "Narayanganj">Narayanganj</option>
                                    <option value= "Munshiganj">Munshiganj</option>
                                    <option value= "Narsingdi">Narsingdi</option>
                                    <option value= "Gazipur">Gazipur</option>
                                    <option value= "Manikganj">Manikganj</option>
                                    <option value= "Jamalpur">Jamalpur</option>
                                    <option value= "Sherpur">Sherpur</option>
                                    <option value= "Mymensingh">Mymensingh</option>
                                    <option value= "Ishwarganj">Ishwarganj</option>
                                    <option value= "Muktagacha">Muktagacha</option>
                                    <option value= "Fulbaria">Fulbaria</option>
                                    <option value= "Bhaluka">Bhaluka</option>
                                    <option value= "Gouripur">Gouripur</option>
                                    <option value= "Trishal">Trishal</option>
                                    <option value= "Kishoreganj">Kishoreganj</option>
                                    <option value= "Netrokona">Netrokona</option>
                                    <option value= "Sunamganj">Sunamganj</option>
                                    <option value= "Sylhet">Sylhet</option>
                                    <option value= "Maulvibazar">Maulvibazar</option>
                                    <option value= "Sreemangal">Sreemangal</option>
                                    <option value= "Golapganj">Golapganj</option>
                                    <option value= "Barlekha">Barlekha</option>
                                    <option value= "Beanibazar">Beanibazar</option>
                                    <option value= "Zakiganj">Zakiganj</option>
                                    <option value= "Habiganj">Habiganj</option>
                                    <option value= "Comilla">Comilla</option>
                                    <option value= "Chandpur">Chandpur</option>
                                    <option value= "Lakshmipur">Lakshmipur</option>
                                    <option value= "Noakhali">Noakhali</option>
                                    <option value= "Feni">Feni</option>
                                    <option value= "Chattogram">Chattogram</option>
                                    <option value= "Khagrachari">Khagrachari</option>
                                    <option value= "Rangamati">Rangamati</option>
                                    <option value= "Bandarban">Bandarban</option>
                                    <option value= "Coxs's Bazar">Coxs's Bazar</option>
                                    <option value= "Thakurgaon">Thakurgaon</option>
                                    <option value= "Dinajpur">Dinajpur</option>
                                    <option value= "Nilphamari">Nilphamari</option>
                                    <option value= "Rangpur">Rangpur</option>
                                    <option value= "Badarganj">Badarganj</option>
                                    <option value= "Lalmonirhat">Lalmonirhat</option>
                                    <option value= "Kurigram">Kurigram</option>
                                    <option value= "Gaibandha">Gaibandha</option>
                                    <option value= "Bogura">Bogura</option>
                                    <option value= "Joypurhat">Joypurhat</option>
                                    <option value= "Rajshahi">Rajshahi</option>
                                    <option value= "Naogaon">Naogaon</option>
                                    <option value= "Natore">Natore</option>
                                    <option value= "Puthia">Puthia</option>
                                    <option value= "Chapainawabganj">Chapainawabganj</option>
                                    <option value= "Natore">Natore</option>
                                    <option value= "Naogaon">Naogaon</option>
                                    <option value= "Pabna">Pabna</option>
                                    <option value= "Sirajganj">Sirajganj</option>
                                    <option value= "Kushtia">Kushtia</option>
                                    <option value= "Meherpur">Meherpur</option>
                                    <option value= "Chuadanga">Chuadanga</option>
                                    <option value= "Jhenaidah">Jhenaidah</option>
                                    <option value= "Jessore">Jessore</option>
                                    <option value= "Narail">Narail</option>
                                    <option value= "Magura">Magura</option>
                                    <option value= "Barisal">Barisal</option>
                                    <option value= "Bhola">Bhola</option>
                                    <option value= "Jhalokati">Jhalokati</option>
                                    <option value= "Uzirpur">Uzirpur</option>
                                    <option value= "Muladi">Muladi</option>
                                    <option value= "Gournadi">Gournadi</option>
                                    <option value= "Pirojpur">Pirojpur</option>
                                    <option value= "Patuakhali">Patuakhali</option>
                                    <option value= "Barguna">Barguna</option>
                                    <option value= "Khulna">Khulna</option>
                                    <option value= "Satkhira">Satkhira</option>
                                    <option value= "Bagerhat">Bagerhat</option>
                                    <option value= "Bagerhat">Bagerhat</option>
                                    <option value= "Satkhira">Satkhira</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name= "userID" class="form-control" placeholder="User ID" required>
                            </div>
                            <div class="form-group">
                                <input id="signup-password-field" name= "password" type="password" class="form-control" placeholder="Password" required>
                                <span class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePassword('signup-password-field')"></span>
                            </div>
                            <div class="form-group">
                                <input id="confirm-password-field" type="password" class="form-control" placeholder="Confirm Password" required>
                                <span class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePassword('confirm-password-field')"></span>
                            </div>
                            <div class="w-65">
                                <label class="checkbox-wrap checkbox-primary">I agree to the Terms and Conditions
                                  <input type="checkbox" checked>
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            <div class="form-group">
                                <button type="submit" name= "signup" class="form-control btn btn-primary submit px-3">Sign Up</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Sign Up With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-google mr-2"></span> Google</a>
                        </div>
                        <p class="w-100 text-center mt-4">Already have an account? <a href="login.html" style="color: #cbcb36">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function togglePassword(id) {
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>