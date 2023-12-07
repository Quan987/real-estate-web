<?php
    session_start();
    $_SESSION['user_auth'] = '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
  <title>Login</title>
</head>
<body>

  <div class="registration">
    <h2 class = "center">Login Here</h2>
	
    <form action="login_submit.php" method="post">
 
      <div class="input_area">
        <img src="img/email.png" alt="Email Icon" class="icon">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input_area">
        <img src="img/password.png" alt="Password Icon" class="icon">
        <input type="password" name="password" placeholder="Password" required>
      </div>
	  <div class = "login"> 
      <input type="submit" value = "Login">
	  </div>
    </form>
	<br> 
	<p class = "center"><a href="user_registration.php">Register</a></p>
  </div>

</body>
</html>
