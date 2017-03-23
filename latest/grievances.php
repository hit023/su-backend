<?php
    require('mysqli_connect.php');
    $errors = array();
    session_start();
    $desc = "";
    if(!empty($_SESSION["user"]))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(empty($_POST["desc"]))
            {
                $errors[] = "Enter desc. first.";
            }
            else
            {
                $desc = mysqli_real_escape_string($dbc,$_POST["desc"]);
            }
            if(empty($errors))
            {
                $tags = array();
                for($i = 0; $i < strlen($desc);)
                {
                    if($desc[$i]=='#')
                    {
                        ++$i;
                        $tag = "";
                        while($i < strlen($desc) && $desc[$i]!=' ')
                        {
                            $tag = $tag.(string)$desc[$i];
                            $desc[$i] = ' ';
                            ++$i;
                        }
                        array_push($tags,$tag);
                    }
                    else
                    {
                        ++$i;
                    }
                }
                $words1 = explode(" ",$desc);
                $desc = implode(" ",$words1);
                $words2 = explode(" #",$desc);
                $desc = implode(" ",$words2);
                $json_tags = json_encode($tags);
                $id = $_SESSION["user"];
                $query = "insert into grievances(descr,tags,user) values('$desc','$json_tags','$id')";
                $result = mysqli_query($dbc,$query);
                echo "Your grief has been recorded!";
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Description: <input type="text" name="desc"/>
            <br/>
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form>

    </body>
</html>
