<?php
	require('mysqli_connect.php');
	session_start();
	if(!empty($_SESSION['user']))
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			if(empty($_POST["tag"]))
			{
				echo "Enter tag to be searched.";
			}
			else
			{
				$tag = $_POST["tag"];
				$query = "select descr,user,tags,idx from grievances";
				$result = mysqli_query($dbc,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					$array = json_decode($row['tags'],true);
					foreach ($array as $t) 
					{
						if(strpos($t,$tag) !== false) 
						{
	    					echo "Description: ".(string)$row["descr"]."<br/>By: ".(string)$row["user"]."<br/>Index: ".(string)$row["idx"]."<br/><br/>";
						}
					}
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Tag: <input type="text" name="tag"/>
            <br/>
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form>

    </body>
</html>