<?php
    session_start();
    $_SESSION['error'] = '';
	require('./db.php');
    initTables();
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $db = getDB();
        $sql = "SELECT email FROM User WHERE email=?";
        $statement = $db->prepare($sql);
        $statement->bind_param("s", $email);
        $statement->execute();
        $intermediate = $statement->get_result();
        $result = $intermediate->fetch_assoc();
        $db->close();
        if(!$result)
        {
            $_SESSION['error'] = 'Invalid email address';
            
        }
        else
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
    }



    // If user does not exist, exit
    if (empty($_SESSION['user_auth'])) {
        header('Location: ./login_error.php');
        exit;
    } else {
        // Set location to go to if user exist
        header('Location: ./buyer.php');
        exit;
    }


?>