<?php 
include 'connect.php';
if (isset($_GET['delp'])) {
    $delete = $conn->query("delete from product where productid='{$_GET['delp']}'");
    if ($delete) {
        ?>
        <script>
            alert ('product deleted')
            window.location.href='dashboard.php?pout'
            
        </script>
        <?php
    }
}
if (isset($_GET['delpin'])) {
    // var_dump($_GET);die();
    $pid = $_GET['pid'];
    $qty =$_GET['qty'];
    $selectint = $conn->query("select sum(quantity) from productin where pid ='$pid'");
    $tin = mysqli_fetch_array($selectint);
    $selectoutt = $conn->query("select sum(quantity) from productout where pid ='$pid'");
    $tout = mysqli_fetch_array($selectoutt);

    if (($tin['sum(quantity)']-$qty)>=$tout['sum(quantity)']) {
    
    $delete = $conn->query("delete from productin where stid='{$_GET['delpin']}'");

    if ($delete) {
        ?>
        <script>
            alert ('product in deleted')
            window.location.href='dashboard.php?pout'
            
        </script>
        <?php
    }
}
else{
    ?>
    <script>
        alert ('productout not  deleted becouse this quantity was exported')
        window.history.back()
    </script>
    <?php
}
}
if (isset($_GET['delpout'])) {
    $delete = $conn->query("delete from productout where stid='{$_GET['delpout']}'");
    if ($delete) {
        ?>
        <script>
            alert ('product out deleted')
            window.location.href='dashboard.php?pout'
            
        </script>
        <?php
    
}
}