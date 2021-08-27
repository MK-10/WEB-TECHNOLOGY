<?php
    $name=$_POST['name'];
    $shopname=$_POST['shopname'];
    $mat=$_POST['mat'];
    $quan=$_POST['quan'];
    $db= new mysqli('localhost','root','','construction');
    if($db->connect_error){
        die('connection failed: '.$db->connect_error);
    }
    else{
        $sql=mysqli_query($db,"select rate from orders where mat = '$mat'");
		$valu = mysqli_fetch_array($sql);
		$value1 = $valu['rate'];
		$value=$value1 * $quan;
		print($value);
		$stmt=$db->prepare("insert into adminorder(name,shopname,mat,quan,value)
		values(?,?,?,?,?)");
		$stmt->bind_param("sssii",$name,$shopname,$mat,$quan,$value);
        $stmt->execute();
		header('Location:orders.php');
        $stmt->close();
        $db->close();
    }
?>