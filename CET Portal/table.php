<?php
    /*PLEASE SPECIFY ACCESS PERIMISSION BEFORE HOSTING PAGE*/
    session_start();
    require_once('config.php');
    if(isset($_POST['submit'])){  
        $username = $_POST['userx'];
        $password = $_POST['passx'];
        if($username=='suyash' && $password=='administrator'){      /*Change Username and Password for User Execution*/
            $start = 2001;         //Please set start
            $total = 2100;    //How many users wanted
            $pcm = "INSERT INTO pcm (User,Password,Status) VALUES (?,?,?)";
            $pcb = "INSERT INTO pcb (User,Password,Status) VALUES (?,?,?)";
            $intertpcm = $conn->prepare($pcm);
            $intertpcb = $conn->prepare($pcb);
            function getPass() {
                $numbers = '0123456789';
                $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $symbols = '!@#$';
                $final = substr(str_shuffle($letters),0, 4);
                $final = $final.substr(str_shuffle($symbols),0, 1);
                $final = $final.substr(str_shuffle($numbers),0, 3);
                return $final;   //8 -> Total character in Passwords
            }
            for ($ele = $start; $ele < $total+1; $ele++){
                $pass = getPass();
                $user = "pcm00" . $ele;
                $status = "No";
                $result = $intertpcm->execute([$user, $pass, $status]);
                }
            for ($ele = $start; $ele < $total+1; $ele++){
                $pass = getPass();
                $user = "pcb00" . $ele;
                $status = "No";
                $result = $intertpcb->execute([$user, $pass, $status]);
            }
            $username = '0';
            $password = '0';
        }
        else{
            echo '<script>alert(0)</script>';
        }
    }   
?>
<html>
    <head>
        <style>
            h1 {
                text-align: center;
            }
        </style>
        <link rel="stylesheet" href="styletable.css">
    </head>
    <body>
        <div class="login-form">
            <form method="POST">
                <h1>Admin Login</h1>
                <div class="content">
                        <div class="input-field">
                        <input type="text" name="userx" placeholder="Username" autocomplete="nope">
                    </div>
                    <div class="input-field">
                        <input type="password" name ="passx" placeholder="Password" autocomplete="new-password">
                    </div>
                </div>
                <div class="action">
                    <button><input type="submit" name="submit" value="Execute"></button>
                </div>
            </form>
        </div>
        <br><br>
    </body>
    <!--Developed By - Suyash Gholap-->
</html>
