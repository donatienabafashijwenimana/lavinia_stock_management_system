<?php

include 'connect.php';
if(isset($_POST['addp'])){
    $p = $_POST['pname'];
    $select = $conn->query("select* from product where pname='$p'");
    if (mysqli_num_rows($select)<=0) {
        $insert = $conn->query("insert into product values (null,'$p')");
        if ($insert) {
            ?>
            <script>
                alert ('product recorded')
                window.location.href='dashboard.php?p'
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert ('product exist')
            window.history.back()
        </script>
        <?php
    }
}
if(isset($_POST['updatep'])){
    $p = $_POST['pname'];
    $id=$_POST['id'];
    $select = $conn->query("select* from product where pname='$p' and productid<>'$id'");
    if (mysqli_num_rows($select)<=0) {
        // var_dump($_POST);die();
        $insert = $conn->query("update product set pname='$p' where productid='$id'");
        if ($insert) {
            ?>
            <script>
                alert ('product updated')
                window.location.href='dashboard.php?p'
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert ('product not updated becouse product must be unique')
            window.history.back()
        </script>
        <?php
    }
}

if(isset($_POST['addpin'])){
    $pid=$_POST['product'];
    $qty = $_POST['qty'];
    $uprice= $_POST['uprice'];
    $tprice = $qty*$uprice;
    $insert = $conn->query("insert into productin values(null,null,'$pid','$qty','$uprice','$tprice')");
    if ($insert) {
        ?>
        <script>
            alert ('product in added')
            window.location.href='dashboard.php?pin'
        </script>
        <?php
    }else {
        ?>
        <script>
            alert ('product in not added')
            window.history.back()
        </script>
        <?php
    }
}
if(isset($_POST['addpout'])){
    $pid=$_POST['product'];
    $qty = $_POST['qty'];
    $uprice= $_POST['uprice'];
    $tprice = $qty*$uprice;

    $selectint = $conn->query("select sum(quantity) from productin where pid ='$pid'");
    $tin = mysqli_fetch_array($selectint);

    $selectoutt = $conn->query("select sum(quantity) from productout where pid ='$pid'");
    $tout = mysqli_fetch_array($selectoutt);

    $rem = $tin['sum(quantity)']-$tout['sum(quantity)'];
    // echo $tout['sum(quantity)'];die();

    if (($rem>=$qty)) {
        $insert = $conn->query("insert into productout values(null,null,'$pid','$qty','$uprice','$tprice')");
        if ($insert) {
            ?>
            <script>
                alert ('product out added')
                window.location.href='dashboard.php?pin'
            </script>
            <?php
        }
    }else {
        ?>
            <script>
                alert ('productout not  added becouse no enough quantity')
                window.history.back()
            </script>
            <?php
    }
  
}

if(isset($_POST['updatein'])){
    $pid=$_POST['product'];
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $uprice= $_POST['uprice'];
    $cqty = $_POST['cqty'];
    $tprice = $qty*$uprice;
    $selectint = $conn->query("select sum(quantity) from productin where pid ='$pid'");
    $tin = mysqli_fetch_array($selectint);
    $selectoutt = $conn->query("select sum(quantity) from productout where pid ='$pid'");
    $tout = mysqli_fetch_array($selectoutt);
    $rem = $tin['sum(quantity)']-$tout['sum(quantity)'];
    if(($tin['sum(quantity)']-$cqty+$qty)>=$tout['sum(quantity)']){
        $insert = $conn->query("update productin set quantity='$qty',uprice='$uprice',tprice='$tprice' where stid='$id'");
        if ($insert) {
            ?>
            <script>
                alert ('product in  updated')
                window.location.href='dashboard.php?pin'
            </script>
            <?php
        }else {
           
        }
    }else{
        ?>
        <script>
            alert ('productout not  updated becouse this quantity was exported')
            window.history.back()
        </script>
        <?php
    }
}
if(isset($_POST['updateout'])){
    $pid=$_POST['product'];
    $id = $_POST['id'];
    echo $qty = $_POST['qty'];
    $uprice= $_POST['uprice'];
    echo $cqty = $_POST['cqty'];
    $tprice = $qty*$uprice;
    $selectint = $conn->query("select sum(quantity) from productin where pid ='$pid'");
    $tin = mysqli_fetch_array($selectint);
    $selectoutt = $conn->query("select sum(quantity) from productout where pid ='$pid'");
    $tout = mysqli_fetch_array($selectoutt);
    $rem = $tin['sum(quantity)']-$tout['sum(quantity)'];
    if($cqty>=$qty){
        $insert = $conn->query("update productout set quantity='$qty',uprice='$uprice',tprice='$tprice' where stid='$id'");
        if ($insert) {
            ?>
            <script>
                alert ('product updated')
                window.location.href='dashboard.php?pout'
            </script>
            <?php
        }else {
           
        }
    }else{
        ?>
        <script>
            alert ('if you want to update product out by add !! please reexport product')
            window.history.back()
        </script>
        <?php
    }
}
?>