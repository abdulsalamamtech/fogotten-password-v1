<?php


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
            <h2>Reset Your Password</h2>
            <p>NOTE : An email will be sent to you with instructions on how to reset your password</p>
            <form action="reset-request.php" method="post">
                <label for="email">Email:</label><br>
                    <input type="text" name="email"  placeholder="Enter your email" id="email" required>
                <br>
                <button type="submit" name="submit-reset-password">Reset Password</button>
                
            </form>
        </div>
        <!-- END OF FORM BOX -->

    </div>
    <!-- START OF CONTAINER -->
  </body>
</html>