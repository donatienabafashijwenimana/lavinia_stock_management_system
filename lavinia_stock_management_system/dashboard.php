<?php
 session_start();
 if(!isset($_SESSION['id'])|| $_SESSION==null) header('location:login.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">lavina stock management system
        <small class="user">
        <a onclick="return confirm('are you sure you want to logout')"  href="logout.php">logout(<?=$_SESSION['uname']?>)</a>
</small>
    </div>
    <div class="body">
        <div class="left">
            <?php 
            if(isset($_GET['p'])) $p='p';
            elseif(isset($_GET['pin']))$p='in';
            elseif(isset($_GET['pout']))$p ='out';
            elseif(isset($_GET['pind']))$p='in';
            elseif(isset($_GET['poutd']))$p='out';
            elseif(isset($_GET['report']))$p='r';
            elseif(isset($_GET['reportout']))$p='ro';

            else $p='p';
            ?>
            <a class="<?=$p=='p'?'active':0?>" href="?p">product</a>
            <a class="<?=$p=='in'?'active':0?>"href="?pin">product in</a>
            <a class="<?=$p=='out'?'active':0?>"href="?pout">product out</a>
            <a class="<?=$p=='r'?'active':0?>"href="?report">report(product in)</a>
            <a class="<?=$p=='ro'?'active':0?>"href="?reportout">report(product out)</a>
            
        </div> 
        <div class="right">
            <?php 
            if(isset($_GET['p']))include 'product.php';
              elseif(isset($_GET['pin']))include 'productin.php';
              elseif(isset($_GET['pout']))include 'productout.php';
              elseif(isset($_GET['pind']))include 'productind.php';
              elseif(isset($_GET['poutd']))include 'productoutd.php';
              elseif(isset($_GET['report']))include 'report.php';
              elseif(isset($_GET['reportout']))include 'reportout.php';

              else include 'product.php';

            ?>
        </div>
    </div>
    <div class="footer">lavina stock management system&copy;copyright</div>
</body>
</html>