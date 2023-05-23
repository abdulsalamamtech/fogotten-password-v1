<?php

include("config.php");


// $name = "";
// $email = "";
// $password = "";
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = "INSERT INTO `my_users` (`name`, `email`, `password`) 
            VALUES('$name','$email','$password');";
    $result = mysqli_query($conn, $data);
    if(!$result){
        echo "Registeration failed: please try again later";
    }else{
        echo "Registration Successfull";
        echo '<div class="text-box">
                <span>Already have an account? <a href="login.php">Login</a></span>
            </div>';
    }

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="style.css"
      rel="stylesheet"
    />
    <title>Register Page</title>
  </head>
  <body>

      <!-- START OF CONTAINER -->
      <div class="container">
        <h1>Welcome To Amtech Digital Institute</h1>

        <!-- START OF FORM BOX -->
        <div class="form-box">
            <h2>Register Now!</h2>
            <form action="register.php" method="post">
                <label for="name">Full Name:</label><br>
                    <input type="text" name="name" placeholder="Enter your full name" id="name" required>
                <br>
                <label for="email">Email:</label><br>
                    <input type="text" name="email" placeholder="Enter your email" id="email" required>
                <br>
                <label for="password">password:</label><br>
                    <input type="password" name="password" placeholder="Enter your password" required>
                <br>
                <button type="submit" name="submit">Register</button>
                <div class="text-box">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
            </form>
        </div>
        <!-- END OF FORM BOX -->

    </div>
    <!-- START OF CONTAINER -->
  </body>
</html>