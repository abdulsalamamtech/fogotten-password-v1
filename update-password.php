<?php


if(isset($_POST['change-password'])){

    $selector = $_POST['selector'];
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if(empty($password) OR empty($confirm_password)){
        echo '<div class="text-box">
            <script> window.location = "login.php"</script>
            </div>';
    }else{
        if($password !== $confirm_password){
            echo '<div class="text-box">
            <script> window.location = "login.php"</script>
            </div>';
        }
    }


    date_default_timezone_set("Africa/Lagos");
    $current_time = time();

    include("config.php");
    $sql = "SELECT * FROM  `password_reset` WHERE `reset_selector` = '$selector' 
            AND `expires` >= '$current_time';";
    $result = mysqli_query($conn, $sql);
    if(!$result){

        echo "<p>There ewas an error: please try again later</p>";
    }else{
        $row = mysqli_fetch_assoc($result);

        $reset_email = isset($row['reset_email'])? $row['reset_email'] : "";
        $reset_selector = isset($row['reset_selector'])? $row['reset_selector'] : "";
        $reset_token = isset($row['reset_token'])? $row['reset_token'] : "";
        $reset_expires = isset($row['expires'])? $row['expires'] : "";

        $binary_token = hex2bin($token);
        $validate_token = password_verify($binary_token, $reset_token);
        if($validate_token === false){
            echo "Timeout: please try again later!";
        }else{
            if($validate_token === true){
                $update = "UPDATE `my_users` SET `password` = '$password' 
                            WHERE `email` = '$reset_email';";
                $result = mysqli_query($conn, $update);
                if(!$result){

                    echo "<p>There was an error updating your password: please try again later</p>";
                }else{

                    $delete_user_token = "DELETE FROM `password_reset` WHERE `reset_email` = '$reset_email';";
                    mysqli_query($conn, $delete_user_token);                

                    echo "Your Password Update is Successfull!";
                    echo '<div class="text-box">
                            <span>You can now login with your new password <a href="login.php">Login</a></span>
                        </div';
                }
            }
        }

    }



}else{
    echo '<div class="text-box">
            <script> window.location = "login.php"</script>
        </div>';
}



?>