
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="loginan.css">
</head>
<body>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      
      <img src="profile.png" alt="PMS" class="PMS">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
	  <br>
      <input type="text" placeholder="Enter Username" name="uname" required>
<br>
      <label for="psw"><b>Password</b></label>
	  <br>
      <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Admin? <a href="adminlogin.html">Login here!</a></span>
	  <p></p>
	  <span class="psw">No account? <a href="signs.html">Sign up!</a></span>
    </div>
  </form>
</div>
</body>
</html>

<?php
    $email=$_POST['uname'];
    $password=$_POST['psw'];
    $conn= new mysqli('localhost','root','','construct');
	$_SESSION['user']=$email;
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select * from signup where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0){
            $data=$stmt_result->fetch_assoc();
            if($data['password']===$password){
                echo " logined successfully...";
                header('Location:home.php');
            }
            else{
                echo "Invalid username or password";
                ?>
                <script>
                    email.style.border="3px solid red";
                    pass.style.border="3px solid red";
                </script>
                <?php
            }
        }
        else{
            echo "Ivalid username or password";
            ?>
                <script>
                    email.style.border="3px solid red";
                    pass.style.border="3px solid red";
                </script>
                <?php
        }
        $stmt->close();
        $conn->close();
    }
?>