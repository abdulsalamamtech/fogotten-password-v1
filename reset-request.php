<?php

function brake(){
    echo "<br>";
}

$error = "";
$success = "";
$subject = "";
$message = "";


if(isset($_POST['submit-reset-password'])){

    include("config.php");

    $user_email = $_POST['email'];

    $data = "SELECT * FROM `my_users` WHERE email = '$user_email';";
    $result = mysqli_query($conn, $data);
    $row = mysqli_num_rows($result);
    if($row !== 1){
        echo "Reset Error: You dont have an account, you can register with us";
        echo '<div class="text-box">
                <script> window.location = "register.php"</script>
            </div>';
    }



    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/PUPLIC/forgotten_password/create-new-password.php?";
    $url .= "selector=". $selector;
    $url .= "&token=" . bin2hex($token);

    $url;
    brake();
    brake();

    // echo date_default_timezone_set("America/New_York");
    // brake();
    date_default_timezone_set("Africa/Lagos");
    $expires = time() + (60 * 2);
    


    $delete_user_token = "DELETE FROM `password_reset` WHERE `reset_email` = '$user_email';";
    mysqli_query($conn, $delete_user_token);

    $hash_token = password_hash($token, PASSWORD_DEFAULT);
    $insert_user_token = "INSERT INTO `password_reset` (reset_email, reset_selector, reset_token, expires)
                VALUES('$user_email', '$selector', '$hash_token', '$expires')";
    $result = mysqli_query($conn, $insert_user_token);
    if(!$result){

        $error = "<p>There was an error: please try again later</p>";
    }else{

        $headers = "From: amtechdigitalnetworks@gmail.com \r\n";
        $headers .= "Reply-To: amtechdigitalnetworks@gmail.com \r\n";
        $headers .= "Content-type: text/html \r\n";

        $to = $user_email;

        $subject = '<div class=""><h3>Reset Your Password For Amtech Digital Institute</h3>';
        $message = '<p>We recieve a password request from this from you, 
            Click the button to change your password or 
            copy and open the link on your browser.</p>';
        $message .= '<span><a href="'.$url.'"><button>Click To Change Your Password</button></a></span><hr>';
        $message .= '<span>Here is your password reset link: <a href="'.$url.'">' .$url. '</a></span><hr>';
        $message .= '</div>';

        // $send_mail = mail($to, $subject, $message, $headers);
        // if($send_mail){
        //     $success = "<span>Your mail was sent!</span>";
        // }else{
        //     $error .= "<span>Your mail was not send!</span>";
        // }
    }

}
else{
    echo '<div class="text-box">
            <script> window.location = "login.php"</script>
        </div>';
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
    <title>Reset Password Email</title>
  </head>
  <body>

      <!-- START OF CONTAINER -->
      <div class="container">
        <h1>Welcome To Amtech Digital Institute</h1>
        <h2>Reset Password Email</h2>

        <!-- START OF FORM BOX -->
        <div class="email-box">
            <div class="center">
                <span class="red"><?php echo $error; ?></span>
                <br>
                <span class="green"><?php echo $success; ?></span>
                <?php
                    echo $headers;
                    echo $subject;
                    $about_token =  "your token expires on: " . date("Y-m-d h:i:sa", $expires);
                    echo  $about_token;
                    brake();
                    echo $message;
                ?>
                
            </div>

        </div>
        <!-- END OF FORM BOX -->

    </div>
    <!-- START OF CONTAINER -->
  </body>
</html>