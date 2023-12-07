<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
  <script src = "validation.js"> </script> 
  <title>User Registration</title>
</head>
<body>

  <div class="registration">
    <h2>Sign Up</h2>
    <p>Please fill in this form to create an account!</p>
    
    <form action="registration_submit.php" method="post" onsubmit="return validate()">
	
		<div class="error" id="fnameErr"></div>
      <div class="input_area">
        <img src="img/name.png" alt="Name Icon" class="icon">
        <input id="firstname" type="text" name="firstname" placeholder="First Name" required>
		
      </div>
	  
      <div class="error" id="lnameErr"></div>
      <div class="input_area">
        <img src="img/name.png" alt="Name Icon" class="icon">
        
        <input id="lastname" type="text" name="lastname" placeholder="Last Name" required>
      </div>
	  
      <div class="error" id="emailErr"></div>
      <div class="input_area">
        <img src="img/email.png" alt="Email Icon" class="icon">
        
        <input id="email" type="email" name="email" placeholder="Email" required>
      </div>
      
	  <div class="error" id="usernameErr"></div>
      <div class="input_area">
        <img src="img/username.png" alt="User Icon" class="icon">
        
        <input id="username" type="text" name="username" placeholder="Username" required>
      </div>
      
	  <div class="error" id="passwordErr"></div>
      <div class="input_area">
        <img src="img/password.png" alt="Password Icon" class="icon">
        
        <input id="password" type="password" name="password" placeholder="Password" required>
      </div>
      
	  <div class="error" id="confirmErr"></div>
      <div class="input_area">
        <img src="img/confirm.png" alt=" Confirm Password Icon" class="icon">
        <input id="confirm" type="password" name="confirm" placeholder="Confirm Password" required>
      </div>
      
      <input type="submit" value="Sign Up">
    </form>
    <p class = "center"><a href="login.php">Go to Login</a></p>
  </div>

</body>
</html>
