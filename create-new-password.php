<?php

include("config.php");


// $name = "";
// $email = "";
// $password = "";
$error = "";
$success = "";
if(isset($_GET['selector']) AND isset($_GET['token'])){

    $selector = $_GET['selector'];
    $token = $_GET['token'];

    // $data = "INSERT INTO `my_users` (`name`, `email`, `password`) 
    //         VALUES('$name','$email','$password');";
    // $result = mysqli_query($conn, $data);
    // if(!$result){
    //     echo "Registeration failed: please try again later";
    // }else{
    //     echo "Registration Successfull";
    //     echo '<div class="text-box">
    //             <span>Already have an account? <a href="login.php">Login</a></span>
    //         </div>';
    // }

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
    <title>Create a new password Page</title>
  </head>
  <body>

    <!-- START OF CONTAINER -->
    <div class="container">
    <h1>Welcome To Amtech Digital Institute</h1>

    <!-- START OF FORM BOX -->
    <div class="form-box">
        <h2>Create a new password!</h2>

        <?php
        // CHECKING FOR THE REQUEST PARAMETER
        if(isset($_GET['selector']) AND isset($_GET['token'])){

        $selector = $_GET['selector'];
        $token = $_GET['token'];

        if(empty($selector) OR empty($token)){

            echo "Could not validate your request";
        }else{
            if(ctype_xdigit($selector) !== false AND ctype_xdigit($token) !== false ){
            
            // DISPLAY THE FORM FOR PASSWORD RESET
        ?>
        <form action="update-password.php" method="post">
            
            <span class="red"><?php echo $error; ?></span>
            <br>
            <span class="green"><?php echo $success; ?></span>

            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <label for="password">New Password:</label><br>
                <input type="password" name="password" placeholder="Enter new password" required>
            <br>
            <label for="confirm-password">Confirm New Password:</label><br>
                <input type="password" name="confirm-password" placeholder="Confirm new password" required>
            <br>
            <button type="submit" name="change-password">Change Password</button>
            
        </form>
        <?php

            }
        }
        }else{
            echo "Invalid token : Could not validate your request";
        }

        ?>

        
    </div>
    <!-- END OF FORM BOX -->

    </div>
    <!-- START OF CONTAINER -->
  </body>
</html>