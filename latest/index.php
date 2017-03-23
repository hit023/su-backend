<html>
	<body>
		<h1>Welcome!</h2>
		<a href="grievances.php">Grievances page</a>
		<br/><a href="display_grievances.php">View Grievances</a><br/>
		<?php
			session_start();
			if(!empty($_SESSION['user']))
			{
				if($_SESSION['priv']!="reg" && $_SESSION['priv']!="admin")
				{
					echo "<br><a href=\"notices_upload.php\">Upload Notice</a><br/>";		
				}
			}
			else
			{
				header('Location: studentlogin.php');
			}
		?>
	</body>
</html>