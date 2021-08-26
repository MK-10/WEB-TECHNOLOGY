<?php
    $email=$_POST['email'];
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $repeatpass=$_POST['psw-repeat'];
    $conn= new mysqli('localhost','root','','construct');
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into signup(email,username,password,repeatpass)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$email,$username,$password,$repeatpass);
        $stmt->execute();
        echo "signup successfully.....";
        header('Location:login.html');
        $stmt->close();
        $conn->close();
    }
?>
