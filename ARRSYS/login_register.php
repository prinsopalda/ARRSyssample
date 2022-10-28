<?php

@include 'config.php';
if(isset($_POST['submit'])){
    xtract($_POST);

        $name = mysqli_real_escape_string($conn,$_POST['fullname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $IDNumber = mysqli_real_escape_string($conn,$_POST['IDNumber']);
        $department_office = mysqli_real_escape_string($conn,$_POST['department_office']);
        $phonenumber = mysqli_real_escape_string($conn,$_POST['phonenumber']);

        $select = "SELECT * FROM userform WHERE email ='$email' && password = '$password'";

        $result = msqli_query($conn, $select);

        if(msqli_num_rows($result) > 0){
            $error[] = 'User Already exist!';
        }else{
          if($password != $cpassword){
            $error[] = 'Password not matched!';
          }else{
            $insert = "INSERT INTO userform (name, email, password, IDNumber, department_office, phonenumber, user_type) VALUES('$name', '$email', '$password', '$IDNumber', $department_office', '$phonenumber')";
            msqli_query($conn, $insert);
            header('location:login_register.php');
        }
        }

    };

?>




<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title> ARRSys</title>
    <link rel="stylesheet" href="css/login_register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/81f5b5eec4.js" crossorigin="anonymous"></script>
</head>
<body> 
    <div class="container">
      <div class="card">
        <div class="inner-box" id="card">
            <div class="card-front">
                <h2>LOG IN</h2>
                <form action="" method="post">
                    <input type="email" class="input-box" placeholder="Your email ID" required>
                    <input type="password" class="input-box" placeholder="Password" required>
                    <button type="submit" class="submit-btn"> Submit</button>
                    <input type="checkbox"> <span>Remember Me</span>
                </form>
                <button type="button" class="btn" onclick="openReg()"> I'm New Here</button>
                <a href="">Forgot Password</a>
            </div>
            <div class="card-back">
          <!----->  <h2>REGISTER</h2>
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };                           
                        };
                    ?>
                <form action="" method="post">
                    <input type="name" name="fullname" class="input-box" placeholder="Your Name" required>
                    <input type="email" name="email" class="input-box" placeholder="Your email" required>
                    <input type="password" name="password" class="input-box" placeholder="Your Password" required>
                    <input type="password" name="cpassword" class="input-box" placeholder="Confirm Password" required>
                    <input type="IDNumber" name="IDNumber" class="input-box" placeholder="ASCOT ID Number" required>
                    <input type="department_office" name="department_office" class="input-box" placeholder="Department_Office" required>
                    <input type="phonenumber" name="phonenumber" class="input-box" placeholder="Contact Number" required>
                        <select name="user_type">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>

                    <input type="submit" name="submit" class="submit-btn"></button>
                    
                <button type="button" class="btn" onclick="openLogin()"> I have an account</button>
                <a href="">Forgot Password</a>
                </div>
        </div>
      </div>
    </div>
    <script>
        var card = document.getElementById("card");

        function openReg(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }


    </script>
   </body>
   


<!-----FOOTER------>
<section class="footer">
    <h4> ABOUT US</h4>
    <p>Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</br> </p>

    <div class="icons">
        <i class="fa-brands fa-facebook-f"></i>
    </div>

</section>








    <!-------javascript for toggle menu------>
<script>
    var navLinks=document.getElementById("navLinks")

    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

</script>
    
    
    
</body>



</html>
