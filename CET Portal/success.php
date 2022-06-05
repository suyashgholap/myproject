<?php
    session_start();
    function customError() {
        header("Location: index.php");
    }
    set_error_handler("customError");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="style1.css">
    </head>
<body> 
    <div class="container">
        <div class="title">Credentials</div>
            <div class="content">
                <div class="user">
                    <br><br>
                    <p>Username&emsp;&emsp;-&emsp;&emsp;<?php echo $_SESSION['stud_username'] ?></p>
                    <br>
                    <p>Password&emsp;&emsp;-&emsp;&emsp;<?php echo $_SESSION['stud_password'] ?></p>
                    <br>
                    <p class="para">Credentials are sent via email on </p>
                    <p><?php echo $_SESSION['email'] ?></p>
                    <br>
                    <p class="para">Please save the Credentials before closing</p>
                </div>
            </div>
        </div>
    </div>
</body>
<!--Developed By - Suyash Gholap-->
</html>