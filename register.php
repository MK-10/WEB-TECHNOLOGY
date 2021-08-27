<?php
    $email=$_POST['email'];
    $name=$_POST['name'];
    $shopname=$_POST['shopname'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $db= new mysqli('localhost','root','','construction');
    if($db->connect_error){
        die('connection failed: '.$db->connect_error);
    }
    else{
        $stmt=$db->prepare("insert into register(email,name,shopname,address,contact) 
		values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$email,$name,$shopname,$address,$contact);
        $stmt->execute();
		echo "registration successfully.....";
        header('Location:navi.php');
        $stmt->close();
        $db->close();
    }
?>