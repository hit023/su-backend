<?php
    require('mysqli_connect.php');
    $errors = array();
    $user ="";
    $pass= "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["username"]))
        {
            echo '<script> alert(\"Enter username\"); </script>';
        }
        else
        {
            $user = mysqli_real_escape_string($dbc,$_POST["username"]);    
        }
        if(empty($_POST["password"]) && !empty($_POST["username"]))
        {
            //echo 'Enter password';
            $user = mysqli_real_escape_string($dbc,$_POST["username"]);   
            $query = "select id from logindata where username = '$user' or id = '$user'";
            $result = mysqli_query($dbc,$query);
            $count = mysqli_num_rows($dbc,$result);
            if($count==0)
            {
                echo "<script>alert(\"No such user found!\");</script>";
            }
        }
        else
        {
            $pass = mysqli_real_escape_string($dbc,$_POST["password"]);    
        }
        if(empty($errors))
        {
            $salt = "CrazyassLongSALTThatMakesYourUsersPasswordVeryLong123!!312567__asdSdas";
            $pass = hash('sha256', $salt.$pass); 
            $query = "SELECT priv FROM logindata WHERE (username='$user' or id='$user') and pass='$pass'";
            $studentdata = mysqli_query($dbc,$query);

            $cnt = mysqli_num_rows($studentdata);
            $row = mysqli_fetch_assoc($studentdata);
            if($cnt>0)
            {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['priv'] = $row['priv'];
                header('Location: index.php');
            }
            else
            {
                echo "<script>alert(\"No such user found!\");</script>";
                //header('Location: studentlogin.php');
            }
        }
        else
        {
            foreach ($errors as $msg) 
            {
                echo $msg."<br>";
            }
        }
    }
    else
    {
        echo "Enter ID/Username and Pasword to sign-in!";
    }
?>
<!DOCTYPE html>
<html>
    <body align="center">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Username/ID: <input type="text" name="username"/>
            Password: <input type="password" name="password"/>
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form> 
    </body>
</html>