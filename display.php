<?php
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>UPDATE AND DELETE SITE:</title>
</head>
<body>
<button type="submit"><a href="./register.php">Add User</a> </button>
    <table border="1" cellspacing="0">
        <thead>
            <tr style="font-weight: bold;">
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th> 
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `usermgmt`";
            $result1 = mysqli_query($con,$sql);
            if($result1){
               while($row = mysqli_fetch_assoc($result1)){
                $id = $row['id'];
                $name = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>
                <button class="update"><a href ="update.php?updateid='.$id.'">Update</a></button>
                <button class="delete"><a href ="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>';
               } 
            }?>
        </tbody>
    </table>
</body>
</html>