<?php
	require('./db.php');
	initTables();
	createUser();
	header('Location: ./login.php');
?>