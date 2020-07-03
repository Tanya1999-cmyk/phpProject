<?php
require_once('connection.php');
    if(isset($_POST['btn-save']))
    {
        $UserName=mysqli_real_escape_string($con,$_POST['username']);
        $Email=mysqli_real_escape_string($con,$_POST['email']);
        $Password=mysqli_real_escape_string($con,$_POST['password']);
        $Dob=mysqli_real_escape_string($con,$_POST['DOB']);
         
        if(empty($UserName)||empty($Email)||empty($Password)||empty($Dob))
        {
            echo 'please fill in the details';
            exit();
        }
        $Pass=md5($Password);
        $sql="insert into users (Uname,Email,Password,DOB) values('$UserName','$Email','$Pass','$Dob')";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo 'your record is registered';
        }
        else
        {
            echo 'check your query';
        }

    }
?>