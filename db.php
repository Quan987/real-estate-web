<?php

function getHostUsername() {
    // codd, our deployment server, uses user names as credentials for mysql, and also as subfolder mounts for apache
    // However, php runs as the apache user, not the host's
    // Since each group member must deploy, this function attempts to get the username from the URL you visit.
    // Potentially dangerous (?)
    return substr(explode("/", $_SERVER["SCRIPT_NAME"])[1], 1);
}

function getDB() {
    // Use this to return a mysqli connection
    $name = getHostUsername();
    $host = "localhost";
    $user = $name;
    $pass = $name;
    $dbname = $name;

    return new mysqli($host, $user, $pass, $dbname);
}

function initTables() {
    // Creates the neccessary tables if they don't exist.
    $db = getDB();
    $db->query(
        "CREATE TABLE IF NOT EXISTS User(
            username VARCHAR(100) NOT NULL PRIMARY KEY,
            email TEXT NOT NULL,
            fname TEXT NOT NULL,
            lname TEXT,
            pass VARCHAR(72) NOT NULL,
            perm INT
            )"
    );

    $db->query(
        "CREATE TABLE IF NOT EXISTS Card(
            seller VARCHAR(100) NOT NULL,
            addr TEXT NOT NULL,
            age INT NOT NULL,
            price FLOAT NOT NULL,
            img TEXT NOT NULL,
            beds INT,
            baths FLOAT,
            garage INT,
            areaL INT,
            areaW INT,
            FOREIGN KEY(seller) REFERENCES User(username)
        )"
    );
    $db->close();
}


// call initTables(); on root
// TODO: CRUD for card, error handling, CRUD for user

function hashPass($password) {
    // accepts plaintext password, returns bcrypt hashed password
    return password_hash($password, PASSWORD_BCRYPT);
}
function verifyPass($password) {
    // accepts password, returns true if input and stored passwords match
    return password_verify($password, hashPass("examplePassword")); // TODO: retrieve from table
}

function createUser() {
    // Take from the superglobal $_POST and create a row in User for the entered information
    $db = getDB();
	$registerName =$_POST["username"];
	$registerEmail = $_POST["email"];
	$registerFirstName = $_POST["firstname"];
	$registerLastName = $_POST["lastname"];
	$registerPass = hashPass($_POST["password"]);
	$sql = "INSERT INTO User(username,email,fname,lname,pass,perm)VALUES('$registerName','$registerEmail','$registerFirstName','$registerLastName','$registerPass',1)";
	$db->query($sql);
}



?>