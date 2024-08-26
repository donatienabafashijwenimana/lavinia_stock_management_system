<?php 
session_start();
include 'connect.php';
if(isset($_POST['login'])){
    $select = $conn->query("select * from user where uname='{$_POST['uname']}' and password='{$_POST['password']}'");
    if (mysqli_num_rows($select)>0) {
        $row = mysqli_fetch_array($select);
        $_SESSION['id']=$row['id'];
        $_SESSION['uname'] = $row['uname'];
        header("location:dashboard.php");
    }else{
        ?><script>
            alert('login failed')
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="header">lavina stock management system</div>
    
    <div class="form">
       <form action="#" method="post">
       <h1><u>login form</u></h1>
        <label for="">user name</label>
        <input type="text" name="uname" id="" pattern="[a-zA-Z ]{3,10}" title="invalid username">
        <label for="">password</label>
        <input type="password" name="password" id="" pattern=".{6}" title='invalid password length'>
        <input type="submit" value="login" name='login'>
        <a href="register.php">create account</a>
       </form>

    </div>
   <div class="footer"> lavina stock management system&copy;copyright</div>
</body>
</html>