<?php
    $conn= new mysqli('localhost','root','','construct');
    $query="select * from register";
    $result=mysqli_query($conn,$query);
?>
<doctype html!>
<html>
<head>
<link rel="stylesheet" href="navi.css">
</head>

<body>
<div class="topnav">
	<a href="adminhome.php" font-family: CopperplateGothicBold;>Home</a>
	<a href="regisdetails.php" font-family: CopperplateGothicBold;>Register details</a>
	<a href="order.php" font-family: CopperplateGothicBold;>order</a>
</div>
<br>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>dealer details</title>
        <link rel="stylesheet">
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
            h2{
                position: relative;
                top:100px;
				text-align: center
            }
			h1{text-align: center
			}#dealer{
    background: lightgreen  scroll no-repeat;
    background-size: cover;
	height : 1000;
	width : cover;
}
footer{
    background: white scroll no-repeat center;
    padding: 20px;
	height: 100px; 
    width:100%; 
    color: rgb(102, 123, 138);
    text-align: center;
}
        </style>
        <header>
            <h1 center>GLOBAL PAINTS</h1>
            <br>
        </header>
        <section id="dealer">
            <h2>Dealer Details</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Shop Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
                    <?php
                    while($rows=mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['shopname'] ?></td>
                        <td><?php echo $rows['address'] ?></td>
                        <td><?php echo $rows['contact'] ?></td>
                    </tr>
                        <?php
                    }
                    ?>    
            </table>

        </section>
		<br><br><br><br>
        <footer>
<h4>FOR ADMIN</h4>
<h4>To manage product</h4>
<p>All rights reserved &copy; 2021</p>
</footer>
    </body>
</html>