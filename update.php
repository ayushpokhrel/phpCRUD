<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql ="Select * from `usermgmt` where id=$id";
$result2 = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result2);
$name1 = $row['username'];
$email1 = $row['email'];
$password1 = $row['password'];

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = array();
    if(empty($name)){
        $error['rusername'] = "Username Requires";
    }
    if(empty($email)){
        $error['remail'] = "Email Requires";
    }
    if(empty($password)){
        $error['rpassword'] = "Password Requires";
    }
    if(count($error) == 0){
        $sql = "update `usermgmt` set id=$id, username = '$name', email = '$email', password = '$password'where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:display.php'); 
    }
    else {
        die(mysqli_error($con));
         }
    }   
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>UPDATE</title>
</head>
<body>
    <div class="container">
    <form method="post">
        <label>USERNAME:</label>
        <input type="text" id="username" name="username" placeholder="ENTER YOUR USERNAME" autocomplete="off" value=<?php echo $name1;?>>
        <p class="require">
            <?php
            if(isset($error['rusername'])){
                echo $error['rusername'];
            }
            ?>
        </p>
        <label>EMAIL:</label>
        <input type="email" id="email" name="email" placeholder="ENTER YOUR EMAIL" autocomplete="off" value=<?php echo $email1;?>>
        <p class="require">
            <?php
            if(isset($error['remail'])){
                echo $error['remail'];
            }
            ?>
        </p>
        <label>PASSWORD:</label>
        <input type="password" id="password" name="password" placeholder="ENTER YOUR PASSWORD" autocomplete="off" value=<?php echo $password1;?>>
        <p class="require">
            <?php
            if(isset($error['rpassword'])){
                echo $error['rpassword'];
            }
            ?>
        </p>
        <button  type="submit" id="submit" name="submit" >UPDATE</button>
    </form>
        </div>
</body>
</html>