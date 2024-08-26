
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

    <div class="table">
        <h2><u>product out</u></h2>
        <table border="1">
            <tr>
                <th>N<sup>o</sup></th>
                <th>product name</th>
                <th>quantity</th>
                <th colspan='2'>action</th>
            </tr>
            <?php $y=1; foreach($select as $x){
                $selectoutt = $conn->query("select sum(quantity) from productout where pid ='{$x['productid']}'");
                $tout = mysqli_fetch_array($selectoutt);
                ?>
            <tr>
                <td><?=$y++?></td>
                <td><?=$x['pname']?></td>
                <td><?=$tout['sum(quantity)']-0?></td>
                <td><a href="?poutd=<?=$x['productid']?>"><button>manage</button></a></td>
                
            </tr>
            <?php }?>
        </table>
        </div>
   
</body>
</html>