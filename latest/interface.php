<?php
require ("../mysqli_connect.php");
require ('function_links.php');
switch ($_POST['functionname']){
  case 'show_cv':
    $cv=new CV_Functions();
    session_start();
    $cv->show_cv($dbc,$_SESSION['cv_username']);
    break;
  case 'search_cv':
    $cv=new CV_Functions();
    $cv->search_cv($dbc,$_POST['arguments']);
    break;
}


?>