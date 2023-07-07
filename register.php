<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $error = array();
    // $u = "SELECT email FROM details WHERE email = '$email'";
    // $uu = mysqli_query($con,$u);
    if(empty($name)){
        $error['rusername'] = "Username Is Required!!";
    }
    if(empty($email)){
        $error['remail'] = "Email Is Required!!";
    }
    if(empty($password)){
      $error['rpassword'] = "Password Is Required!!";
  }
if(count($error)==0){
    $sql="insert into `usermgmt`(username,email,password) values('$name','$email','$password')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo"data has been sucessfullly inserted.";
    }else{
        die(mysqli_error($con));
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER USER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-box">
        <h1 class="titlestyle1">REGSITER PAGE:</h1>
        <form method="post" enctype="multiple/form-data">
            <div class="form-field">
                <label for="fname">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" value=""/>
                <p class="require">
            <?php
            if(isset($error['rusername'])){
                echo $error['rusername'];
            }
            ?>
        </p>
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="off" value=""/>
                <p class="require">
            <?php
            if(isset($error['remail'])){
                echo $error['remail'];
            }
            ?>
        </p>
            </div>
        </p>
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" name="password" autocomplete="off" id="password" value=""/>
                <p class="require">
            <?php
            if(isset($error['rpassword'])){
                echo $error['rpassword'];
            }
            ?>
        </p>
            </div>
            <div class="form-footer">
                <button type="submit" name="submit">REGISTER</button>
                <div class="text-block">
                    Display register users!!!
                    <a href="./display.php" class="text-link" title="">Display!!</a>
                </div>
            </div>
    </div> 
</body>
</html>