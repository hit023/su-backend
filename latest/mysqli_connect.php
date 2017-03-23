<?php
define('DB_USER','root');
define('DB_PASSWORD','password');
define('DB_HOST','localhost');
define('DB_NAME','sutc');

$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not connect:'.mysqli_connect_error());

?>