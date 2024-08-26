
<?php
include 'connect.php';
$select = $conn->query("select*from product");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <a class="add" href="?pin&&addin">product in</a>
    <a class="add" href="?pin&&addout">product out</a>

    <div class="table">
        <h2>product in</h2>
        <table border="1">
            <tr>
                <th>N<sup>o</sup></th>
                <th>product name</th>
                <th>quantity</th>
                <th colspan='2'>action</th>
            </tr>
            <?php $y=1; foreach($select as $x){
                
                $selectint = $conn->query("select sum(quantity) from productin where pid ='{$x['productid']}'");
                $tin = mysqli_fetch_array($selectint);
                $selectoutt = $conn->query("select sum(quantity) from productout where pid ='{$x['productid']}'");
                $tout = mysqli_fetch_array($selectoutt);
                ?>
            <tr>
                <td><?=$y++?></td>
                <td><?=$x['pname']?></td>
                <td><?=$tin['sum(quantity)']-$tout['sum(quantity)']?></td>
                <td><a href="?pind=<?=$x['productid']?>"><button>manage</button></a></td>
                
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="<?=isset($_GET['addin'])?'form':'h'?>">
        <form action="add.php" method="post">
            <a class="close" href='?pin'>&times;</a>
            <h1><u>add product in</u></h1>
            <label for="">product</label>
            <select name="product" id="">
                <?php
                $selectp = $conn->query("select*from product");
                foreach($selectp as $p){
                ?>
                <option value="<?=$p['productid']?>"><?=$p['pname']?></option>
                <?php }?>
            </select>
            <label for="">quantity</label>
            <input type="number" name="qty" min='0' max='1000'>
            <label for="">unit price</label>
            <input type="number" name="uprice" id=""  min='0' max='10000' required>
            <input type="submit" value="add product in" name="addpin" required>
        </form>
    </div>

    <div class="<?=isset($_GET['addout'])?'form':'h'?>">
    <form action="add.php" method="post">
            <a class="close" href='?pin'>&times;</a>
            <h1><u>add product out</u></h1>
            <label for="">product</label>
            <select name="product" id="">
                <?php
                $selectp = $conn->query("select*from product");
                foreach($selectp as $p){
                ?>
                <option value="<?=$p['productid']?>"><?=$p['pname']?></option>
                <?php }?>
            </select>
            <label for="">quantity</label>
            
            <input type="number" name="qty" min='0' max='1000'>
            <label for="">unit price</label>
            <input type="number" name="uprice" id=""  min='0' max='10000' required>
            <input type="submit" value="add product out" name="addpout" required>
        </form>
    </div>
</body>
</html>