<?php
    $email=$_POST['uname'];
    $password=$_POST['psw'];
    $conn= new mysqli('localhost','root','','construct');
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select * from admin where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0){
            $data=$stmt_result->fetch_assoc();
            if($data['pass']===$password){
                echo " logined successfully...";
                header('Location:adminhome.php');
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