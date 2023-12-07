<?php 
    require('./db.php'); 
    session_start();
    //addToWishlist("2013street");
    foreach (getWishlistByEmail($_SESSION["user_auth"]) as $row) {
        print_r(getCardByAddr($row[1]));
    }
?>