<?php
    session_start();
	require('./db.php');

    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $db = getDB();
        $sql = "SELECT email from User WHERE email='$email'";
        $result = $db->query($sql);
        if(count($result) == 1)
        {
            $valid = verifyPass($pass, $email);
            if($valid)
            {
                $_SESSION['user_auth'] = $email;
            }
            else
            {
                $_SESSION['error'] = 'Invalid password';
            }
        }
        else
        {
            $_SESSION['error'] = 'Invalid email address';
        }
    }



    // If user does not exist, exit
    if (empty($_SESSION['user_auth'])) {
        header('Location: ./login_error.php');
        exit;
    } else {
        // Set location to go to if user exist
        header('Location: ./loggedIn.php');
        exit;
    }


?>