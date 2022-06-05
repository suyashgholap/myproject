<?php
  session_start();
  require_once('config.php');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
  <?php
    if(isset($_POST['submit'])){
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $email = htmlspecialchars($_POST['email']);
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $group = $_POST['groupname'];
      $_SESSION['email'] = $email;
      $emailcol = "'".$email."'";
      $email_check = "SELECT COUNT(*) FROM users WHERE `Email` = $emailcol";
      $res1 = $conn->query($email_check); //Check if Email already exists or not
      $row = mysqli_fetch_array($res1);
      if($row[0] == 0){
        $sql = "SELECT * FROM $group WHERE Status = 'No' LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $stud_username = $row["User"];
        $_SESSION['stud_username'] = $stud_username;
        $_SESSION['stud_password'] = $row["Password"];
        $id = $row["ID"];
        $update_sql = "UPDATE $group SET `Status` = 'Yes' WHERE ID = $id";
        $result = $conn->query($update_sql);
        $sql = "INSERT INTO users (Name,Email,Mobile,Address,Gender,Choice,Username) VALUES (?, ?,?,?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$fullname, $email, $phone, $address, $gender, $group, $stud_username]);
        header( 'Location: success.php' );
        //mail($mail,"Subject - cred", "Head");
      }
      else{
        echo "<script>alert('Entered Email already Exists !')</script>";
      } 
    }
  ?>  
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="POST" action="index.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" placeholder="Enter your name" title="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <textarea name="address" id="addrs" placeholder="Enter Full Address" title="Enter your full residential address" required></textarea>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" title="Enter your Email Address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required maxlength="10" pattern="\d{10}" title="Please enter 10 digit Mobile Number without Country Code">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" value="Male" name="gender" id="dot-1">
          <input type="radio" value="Female" name="gender" id="dot-2">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="group-class">
          <input type="radio" value="PCM" name="groupname" id="group-1">
          <input type="radio" value="PCB" name="groupname" id="group-2">
          <span class="gender-title">Select Group</span>
          <div class="category">
            <label for="group-1">
            <span class="dot one"></span>
            <span class="group">P C M</span>
          </label>
          <label for="group-2">
            <span class="dot two"></span>
            <span class="group">P C B</span>
          </label>
          </div>
        </div>
        <div class="button" data-toggle="modal" data-target="#myModal">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
<!--Developed By - Suyash Gholap-->
</html>