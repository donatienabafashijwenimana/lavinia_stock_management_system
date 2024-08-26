<?php
include 'connect.php';
if(isset($_POST['register'])){
    $select = $conn->query("select * from user where uname='{$_POST['uname']}'");
    if (mysqli_num_rows($select)>0) {
        ?>
        <script>
            alert("user name exist")
        </script>
        <?php
    }else{
    $insert = $conn->query("insert into user values (null,'{$_POST['uname']}','{$_POST['password']}')");
    if ($insert) {
        ?><script>
            alert("create account succed")
            window.location.href='login.php'
        </script>
        <?php
    }
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
     <h1><u>registration form</u></h1>
        <label for="">user name</label>
        <input type="text" name="uname" id="" pattern="[a-zA-Z ]{3,10}" title="invalid username">
        <label for="">password</label>
        <input type="password" name="password" id="" pattern=".{6}" title='invalid password length'>
        <input type="submit" value="login" name='register'>
        <a href="login.php">login</a>
     </form>

    </div>
   <div class="footer"> lavina stock management system&copy;copyright</div>

</body>
</html>