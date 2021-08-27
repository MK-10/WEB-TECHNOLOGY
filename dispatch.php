<doctype html!>
<html>
<head>
<title>dispatch</title>
<link rel="stylesheet" href="navi.css">
</head>

<body>
<div class="topnav">
	<a href="adminhome.php" font-family: CopperplateGothicBold;>Home</a>
	<a href="regisdetails.php" font-family: CopperplateGothicBold;>Register details</a>
	<a href="adminorder.php" font-family: CopperplateGothicBold;>order</a>
</div>
<br>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>dealer details</title>
<link rel="stylesheet" href="navi.css">
    </head>
    <body>
        <style>
		

            table{
                margin-left: auto; 
                margin-right: auto;
                border-collapse: collapse;
                position: relative;
                top:200px;
                font-size:20px;
            }
            table th,td{
                text-align: center;
                border: 3px solid blue;
                padding: 10px 15px;
            }
            table th{
                color:green;
            }
			h1{color : black;
			}
            h2{
				background: white;
				width : 200px;
                position: relative;
                top:100px;
			margin: 0px 100px 0 650px;
  padding-top: -60px;
				text-align: center;
            }
			.search {
  width: 100%;
  position: absolute;
  display: flex;
}

.searchTerm {
  width: 200%;
  border: 3px solid #00B4CC;
  border-right: 3px solid #00B4CC;
  padding: 5px;
  height: 40px;
  border-radius: 5px 5px 5px 5px;
  outline: solid #00B4CC;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}
input[type=text] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}input[type=number] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
.searchButton {
  width: 100px;
  height: 40px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  font-size: 20px;
}
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.container {
  padding: 30px;
padding-left : 50px;  
  background-color: lightblue;;
  height: 100px;
  float :center;
  width: auto;
  margin-top: 0;
  position: absolute;
margin-right: auto;
margin-bottom: 0;
margin-left: auto;
}
	.container1 {
		
		position: absolute;
  padding: 30px;
padding-left : 500px;  
  background-color: lightblue;;
  height: 600px;
  float :center;
  width: 70%;
  margin-top: 0;
  position: absolute;
margin-right: auto;
margin-bottom: 0;
margin-left: auto;
}	
footer{
    background: black scroll no-repeat center;
	padding_bottom : 100px;
    padding: 20px;
	height: 100px; 

    width:100%; 
    color: rgb(102, 123, 138);
    text-align: center;
}
/* Set a style for the submit button */
.registerbtn {
	
  background-color: black;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;

}

.registerbtn:hover {
  opacity: 1;
}

        </style>
        <header>
            <h1>GLOBAL PAINTS</h1>
            <br>
        </header>
		<section>
            <h2>Dispatch</h2>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<form method="POST">
            <div class="wrap">
   <div class="container">
      <label for="id"><b>ID</b></label>
    <input type="number" placeholder="Enter id" name="id" required>
	  <input type="submit" class="registerbtn" name="Search">
   </div>
</div>
			</form>

            <?php
               $conn= new mysqli('localhost','root','','construction');
               $flag=0;
               if(isset($_POST['Search'])){
                   $id=$_POST['id'];
                   $query="select * from adminorder where id='$id'";
                   $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                            $flag=1;
                            ?>
                            <form class="container1"  action="" method="POST">
                                <label>Id</label><br>
                                <input  type="number" name="id" value="<?php echo $row['id']?>"><br>
                                    <label>Name</label><br>
                                    <input type="text" name="name" value="<?php echo $row['name']?>"><br>
                                    <label>shopname</label><br>
                                    <input  type="text" name="shopname" value="<?php echo $row['shopname']?>"><br>
                                    <label>material</label><br>
                                    <input type="text"  name="mat" value="<?php echo $row['mat']?>"><br>
                                    <label>Quantity</label><br>
                                    <input  type="number"  name="quan" value="<?php echo $row['quan']?>"><br>
                                    <label>price</label><br>
                                    <input  type="number"  name="value" value="<?php echo $row['value']?>"><br>
                                   
                             
                                    <input type="submit" value="Dispatch" class="registerbtn" name="Dispatch">
                                </form>
                                <?php
                        }
                        if($flag==0){
                            ?>
                            <h2>No records found</h2>
                            <?php
                        }
               }
            ?>
             </section>
			 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <footer>
            <h4>For Admin</h4>
            <h4>To manage products</h4>
            <p>All rights reserved &copy; 2021</p>
        </footer>
    </body>
</html>
<?php
    $conn= new mysqli('localhost','root','','construction');
    if(isset($_POST['Dispatch'])){
        $query="delete from adminorder where id='$_POST[id]' ";
        $result=mysqli_query($conn,$query);

        if($result && headers_sent() === false){
            header('Location:adminorder.php');
        }
        else{
            echo '<script> alert("No") </script>';
        }

    }
?>