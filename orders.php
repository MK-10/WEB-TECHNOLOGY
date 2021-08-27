<?php
    $conn= new mysqli('localhost','root','','construction');
    $query="select * from orders";
    $result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>order</title>
        <link rel="stylesheet" href="navi.css">
    </head>
    <body id="reg1">
	<div class="topnav">
	<a href="home.php" font-family: CopperplateGothicBold;>Home</a>
	<a href="#1" font-family: CopperplateGothicBold;>About</a>
	<a href="#2" font-family: CopperplateGothicBold;>contact us</a>
	<a href="register.html" font-family: CopperplateGothicBold;>Register</a>
	<a href="order.html" font-family: CopperplateGothicBold;>order</a>
</div>
<br>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: blue;
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
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 30px;
padding-left : 50px;  
  background-color: lightblue;;
  height: 700px;
  float :center;
  width: 700px;
  margin-top: 0;
margin-right: auto;
margin-bottom: 0;
margin-left: auto;
}

/* Full-width input fields */
input[type=text] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=number] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}
input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
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
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="order.php" method="post">
  <div class="container">
    <h1>order</h1>
    <hr>

    <label for="name"><b>Dealer Name</b></label><br>
    <input type="text" placeholder="Enter Name" name="name" required>
<br>
    <label for="shopname"><b>Shop Name</b></label><br>
    <input type="text" placeholder="Enter Shope name" name="shopname" required>
	<br>
<label for="mat"><b>Material</b></label><br>
    <input type="text" placeholder="Enter material" name="mat" required>
<br>
    <label for="quan"><b>Quantity</b></label><br>
    <input type="number" placeholder="Enter number" name="quan" required>
<hr>

    <button type="submit" class="registerbtn">Order</button>
  </div>
 
</form>
<section id="dealer">
            <h2>materials</h2>
            <table style="background-color:#FFFFE0;">
                <tr>
				<th>id</th>
                    <th>Material</th>
                    <th>Price</th>
                </tr>
                    <?php
                    while($rows=mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['mat'] ?></td>
                        <td><?php echo $rows['rate'] ?></td>
                    </tr>
                        <?php
                    }
                    ?>    
            </table>

        </section>
</body>
</html>