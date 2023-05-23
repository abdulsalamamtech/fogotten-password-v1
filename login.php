<?php

include("config.php");



// $name = "";
// $email = "";
// $password = "";
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = "SELECT * FROM `my_users` WHERE email = '$email' AND password = '$password';";
    $result = mysqli_query($conn, $data);
    $row = mysqli_num_rows($result);
    if($row !== 1){
        echo "Login Error: incorrect email or password";
    }else{
        echo "Login Sucessfull";
        echo '<div class="text-box">
                <script> window.location = "dashboard.php"</script>
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
    <title>Login Page</title>
  </head>
  <body>

      <!-- START OF CONTAINER -->
      <div class="container">
        <h1>Welcome To Amtech Digital Institute</h1>

        <!-- START OF FORM BOX -->
        <div class="form-box">
            <h2>Login To Dashboard</h2>
            <form action="login.php" method="post">
                <label for="email">Email:</label><br>
                    <input type="text" name="email"  placeholder="Enter your email" id="email" required>
                <br>
                <label for="email">password:</label><br>
                    <input type="password" name="password"  placeholder="Enter your password" required>
                <br>
                <button type="submit" name="submit">Login</button>
                <div class="text-box">
                    <span><a href="reset-password.php">Forgotten password?</a></span>
                    <br>
                    <span>Don't have an account? <a href="register.php">Register</a></span>
                </div>
            </form>
        </div>
        <!-- END OF FORM BOX -->

    </div>
    <!-- START OF CONTAINER -->
  </body>
</html>