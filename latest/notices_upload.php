<?php
	require('mysqli_connect.php');
	session_start();
	if(!empty($_SESSION['user']))
	{
		$errors=array();
		$descr = "";
		$title = "";
		$dt = date('Y-m-dTH:i');
		$venue = "";
		$send_mail=0;
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if(empty($_POST["descr"]))
	        {
	            $errors[] = 'Enter description';
	        }
	        else
	        {
	            $descr = mysqli_real_escape_string($dbc,$_POST["descr"]);    
	        }
	        if(empty($_POST["title"]))
	        {
	            $errors[] = 'Enter title';
	        }
	        else
	        {
	            $title = mysqli_real_escape_string($dbc,$_POST["title"]);    
	        }
	        if(empty($_POST["venue"])||empty($_POST["dt"]))
	        {
	            $errors[] = 'Enter venue/time';
	        }
	        else
	        {
	            $venue = mysqli_real_escape_string($dbc,$_POST["venue"]); 
	            $dt = mysqli_real_escape_string($dbc,$_POST["dt"]);   
	        }
	        if(empty($errors))
	        {
	        	$query = "insert into notices values('$descr','$title','$dt','$venue')";
	        	$result = mysqli_query($dbc,$query);
	        	echo "<script> alert(\"Your event has been recorded\") </script>";
	        	$send_mail = $_POST['radio'];
	        	if($send_mail==1)
	        	{
	        		
	        	}
	        }
	        else
	        {
	        	foreach ($errors as $msg) 
	            {
	                echo $msg . "<br>";
	            }
	        }
	    }
	}
	else
	{
		header('Location: studentlogin.php');
	}
?>

<!DOCTYPE html>
<html>
    <body align="center">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">
            Title: <input type="text" name="title"/><br/>
           	<textarea name="descr"> Description of the event... </textarea><br/>
            Date/Time: <input type="datetime-local" name="dt"><br/>
            Venue: <input type="text" name="venue"/><br/>
            Send Mail? <input type="radio" name="radio" value="1" />Yes
            <input type="radio" name="radio" value="0" />No
            <br/>
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>