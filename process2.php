<?php
    require_once('connection.php');
    if(isset($_POST['btn-login']))
    {
        $UName=$_POST['username'];
        $Pass=$_POST['password'];   
        if(empty($UName) || empty($Pass))
        {
            echo 'please fill in the details';
        }
        else
        {
            $query="select * from users where Uname='$UName'";
            $result=mysqli_query($con,$query);
            if ($row=mysqli_fetch_assoc($result))
            {
                $db_password=$row['Password'];
                if(md5($Pass)==$db_password)
                {
                    echo "hello  ";
                    echo stripslashes($row['Uname']);
                    echo"<br/>your birthday is on ";
                    echo htmlspecialchars(stripslashes($row['DOB']));
                }
                else
                {
                    echo 'incorrect password';
                }
            }
             else
            {
                    echo 'please check your query';
            }
        }
            
        
    }
?>