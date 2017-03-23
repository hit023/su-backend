<?php
	require('mysqli_connect.php');
	echo "Populating database...";
	$pass = "password";
	$salt = "CrazyassLongSALTThatMakesYourUsersPasswordVeryLong123!!312567__asdSdas";
    $pass = hash('sha256', $salt.$pass);
    $id = "22" ;
    $user = "pres";
	$query = mysqli_query($dbc,"insert into logindata(username,pass,priv) values('$user','$pass',"."\"master\"".");");
?>