<?php
    session_start();
    $con = mysqli_connect("localhost","root","","agrotechdb") or die("connection error");
    if(isset($_POST['signup'])){
        $userID = mysqli_real_escape_string($con, $_POST['userID']);
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $area = mysqli_real_escape_string($con, $_POST['area']);
        $type = mysqli_real_escape_string($con, $_POST['type']);
        mysqli_query($con, "INSERT INTO `Participant`(`User ID`, `First Name`, `Last Name`, `Gender`, `Area`, `Contact`, `Password`, `Type`) VALUES('$userID', '$fname', '$lname', '$gender', '$area', '$contact', '$password', 'Employee')");
        mysqli_query($con, "INSERT INTO `Employee`(`Employee ID`) VALUES('$userID')");
        if ($type == 'Technician') {
            $postal_code = mysqli_real_escape_string($con, $_POST['postal-code']);
            $result = mysqli_query($con, "INSERT INTO `Technician`(`Technician ID`, `Postal Code`) VALUES('$userID', '$postal_code')");
            if (!$result) {
                echo "Error: " . mysqli_error($con);
            }
        }

        if ($type == 'Agronomist') {
            $postal_code = mysqli_real_escape_string($con, $_POST['postal-code']);
            mysqli_query($con, "INSERT INTO `Agronomist`(`Agronomist ID`, `Postal Code`) VALUES('$userID', '$postal_code')");
        }
        if ($type == 'District Officer') {
            $district = mysqli_real_escape_string($con, $_POST['district']);
            $result = mysqli_query($con, "INSERT INTO `District Officer`(`District Officer ID`, `District`) VALUES('$userID', '$district')");
            if (!$result) {
                echo "Error: " . mysqli_error($con);
            }
        }
        if ($type == 'Field Officer') {
            $postal_code = mysqli_real_escape_string($con, $_POST['postal-code']);
            $dUserID = mysqli_real_escape_string($con, $_POST['dUserID']);
            mysqli_query($con, "INSERT INTO `Field Officer`(`Field Officer ID`, `District Officer ID`, `Postal Code`) VALUES('$userID', '$dUserID', '$postal_code')");
        }
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

        /* Custom CSS for dropdown menu */
        select.form-control {
            color: #000; /* Set text color to black */
        }
        select.form-control option {
            color: #000; /* Set option text color to black */
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
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="signup-form">
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
                                <input type="text" name= "contact" class="form-control" placeholder="Mobile No." required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="type" id = "type">
                                    <option value="" disabled selected>Select Employee Type</option>
                                    <option value="Technician">Technician</option>
                                    <option value="Agronomist">Agronomist</option>
                                    <option value="District Officer">District Officer</option>
                                    <option value="Field Officer">Field Officer</option>
                                </select>
                            </div>

                            <div class = "form-group" id="postal-code" style="display: none;">
                                <select class="form-control" name="postal-code" >
                                    <option value="" disabled selected>Select Postal Code</option>
                                    <option value= "1400">1400</option>
                                    <option value= "1500">1500</option>
                                    <option value= "1600">1600</option>
                                    <option value= "1700">1700</option>
                                    <option value= "1800">1800</option>
                                    <option value= "2000">2000</option>
                                    <option value= "2100">2100</option>
                                    <option value= "2200">2200</option>
                                    <option value= "2210">2210</option>
                                    <option value= "2220">2220</option>
                                    <option value= "2230">2230</option>
                                    <option value= "2240">2240</option>
                                    <option value= "2241">2241</option>
                                    <option value= "2260">2260</option>
                                    <option value= "2300">2300</option>
                                    <option value= "2400">2400</option>
                                    <option value= "3000">3000</option>
                                    <option value= "3100">3100</option>
                                    <option value= "3200">3200</option>
                                    <option value= "3210">3210</option>
                                    <option value= "3220">3220</option>
                                    <option value= "3240">3240</option>
                                    <option value= "3250">3250</option>
                                    <option value= "3260">3260</option>
                                    <option value= "3300">3300</option>
                                    <option value= "3500">3500</option>
                                    <option value= "3600">3600</option>
                                    <option value= "3700">3700</option>
                                    <option value= "3800">3800</option>
                                    <option value= "3900">3900</option>
                                    <option value= "4000">4000</option>
                                    <option value= "4400">4400</option>
                                    <option value= "4500">4500</option>
                                    <option value= "4600">4600</option>
                                    <option value= "4700">4700</option>
                                    <option value= "5100">5100</option>
                                    <option value= "5200">5200</option>
                                    <option value= "5300">5300</option>
                                    <option value= "5400">5400</option>
                                    <option value= "5450">5450</option>
                                    <option value= "5500">5500</option>
                                    <option value= "5600">5600</option>
                                    <option value= "5700">5700</option>
                                    <option value= "5800">5800</option>
                                    <option value= "5900">5900</option>
                                    <option value= "6000">6000</option>
                                    <option value= "6100">6100</option>
                                    <option value= "6200">6200</option>
                                    <option value= "6220">6220</option>
                                    <option value= "6300">6300</option>
                                    <option value= "6400">6400</option>
                                    <option value= "6500">6500</option>
                                    <option value= "6600">6600</option>
                                    <option value= "6700">6700</option>
                                    <option value= "7000">7000</option>
                                    <option value= "7100">7100</option>
                                    <option value= "7200">7200</option>
                                    <option value= "7300">7300</option>
                                    <option value= "7400">7400</option>
                                    <option value= "7500">7500</option>
                                    <option value= "7600">7600</option>
                                    <option value= "8200">8200</option>
                                    <option value= "8300">8300</option>
                                    <option value= "8400">8400</option>
                                    <option value= "8410">8410</option>
                                    <option value= "8420">8420</option>
                                    <option value= "8440">8440</option>
                                    <option value= "8500">8500</option>
                                    <option value= "8600">8600</option>
                                    <option value= "8700">8700</option>
                                    <option value= "9000">9000</option>
                                    <option value= "9100">9100</option>
                                    <option value= "9200">9200</option>
                                    <option value= "9300">9300</option>
                                    <option value= "9400">9400</option>
                                </select>
                            </div>

                            <div class = "form-group" id="district" style="display: none;">
                                <select class="form-control" name="district" >
                                    <option value="" disabled selected>Select District</option>
                                    <option value= "Bagerhat">Bagerhat</option>
                                    <option value= "Bandarban">Bandarban</option>
                                    <option value= "Barguna">Barguna</option>
                                    <option value= "Barishal">Barishal</option>
                                    <option value= "Bhola">Bhola</option>
                                    <option value= "Bogura">Bogura</option>
                                    <option value= "Brahmanbaria">Brahmanbaria</option>
                                    <option value= "Chandpur">Chandpur</option>
                                    <option value= "Chittagong">Chittagong</option>
                                    <option value= "Chuadanga">Chuadanga</option>
                                    <option value= "Comilla">Comilla</option>
                                    <option value= "CoxsBazar">CoxsBazar</option>
                                    <option value= "Dhaka">Dhaka</option>
                                    <option value= "Dinajpur">Dinajpur</option>
                                    <option value= "Faridpur">Faridpur</option>
                                    <option value= "Feni">Feni</option>
                                    <option value= "Gaibandha">Gaibandha</option>
                                    <option value= "Gazipur">Gazipur</option>
                                    <option value= "Gopalganj">Gopalganj</option>
                                    <option value= "Habiganj">Habiganj</option>
                                    <option value= "Jamalpur">Jamalpur</option>
                                    <option value= "Jessore">Jessore</option>
                                    <option value= "Jhalokati">Jhalokati</option>
                                    <option value= "Jhenaidah">Jhenaidah</option>
                                    <option value= "Joypurhat">Joypurhat</option>
                                    <option value= "Khagrachhari">Khagrachhari</option>
                                    <option value= "Khulna">Khulna</option>
                                    <option value= "Kishoreganj">Kishoreganj</option>
                                    <option value= "Kurigram">Kurigram</option>
                                    <option value= "Kushtia">Kushtia</option>
                                    <option value= "Lakshmipur">Lakshmipur</option>
                                    <option value= "Lalmonirhat">Lalmonirhat</option>
                                    <option value= "Madaripur">Madaripur</option>
                                    <option value= "Magura">Magura</option>
                                    <option value= "Manikganj">Manikganj</option>
                                    <option value= "Maulvibazar">Maulvibazar</option>
                                    <option value= "Meherpur">Meherpur</option>
                                    <option value= "Moulvibazar">Moulvibazar</option>
                                    <option value= "Munshiganj">Munshiganj</option>
                                    <option value= "Mymensingh">Mymensingh</option>
                                    <option value= "Naogaon">Naogaon</option>
                                    <option value= "Narail">Narail</option>
                                    <option value= "Narayanganj">Narayanganj</option>
                                    <option value= "Narsingdi">Narsingdi</option>
                                    <option value= "Netrokona">Netrokona</option>
                                    <option value= "Nilphamari">Nilphamari</option>
                                    <option value= "Noakhali">Noakhali</option>
                                    <option value= "Pabna">Pabna</option>
                                    <option value= "Panchagarh">Panchagarh</option>
                                    <option value= "Patuakhali">Patuakhali</option>
                                    <option value= "Pirojpur">Pirojpur</option>
                                    <option value= "Rajbari">Rajbari</option>
                                    <option value= "Rajshahi">Rajshahi</option>
                                    <option value= "Rangamati">Rangamati</option>
                                    <option value= "Rangpur">Rangpur</option>
                                    <option value= "Satkhira">Satkhira</option>
                                    <option value= "Shariatpur">Shariatpur</option>
                                    <option value= "Sherpur">Sherpur</option>
                                    <option value= "Sirajganj">Sirajganj</option>
                                    <option value= "Sunamganj">Sunamganj</option>
                                    <option value= "Sylhet">Sylhet</option>
                                    <option value= "Tangail">Tangail</option>
                                    <option value= "Thakurgaon">Thakurgaon</option>
                                    <option value= "Kurigram">Kurigram</option>
                                </select>
                            </div>

                            <script>
                                document.getElementById('type').addEventListener('change', function() {
                                    var type = this.value;
                                    var postal_code = document.getElementById('postal-code');
                                    var district = document.getElementById('district');

                                    if (type === 'Technician' || type === 'Agronomist' || type === 'Field Officer') {
                                        postal_code.style.display = 'block';
                                        district.style.display = 'none';
                                    } else {
                                        postal_code.style.display = 'none';
                                        district.style.display = 'block';
                                    }
                                });
                            </script>

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
