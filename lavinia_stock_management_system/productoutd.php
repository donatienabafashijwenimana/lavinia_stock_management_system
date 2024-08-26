
<?php
include 'connect.php';
$select = $conn->query("select*from product,productout where pid=productid and  productid='{$_GET['poutd']}'");
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
    <a href='?pout' class="close">&times</a>

        <h2><u>product out</u></h2>
        <?php if (mysqli_num_rows($select)>0){ ?>
        <table border="1">
            <tr>
                <th>N<sup>o</sup></th>
                <th>date</th>
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
                <td><?=$x['date']?></td>
                <td><?=$x['pname']?></td>
                <td><?=$x['quantity']?>kg</td>
                <td><a href="?poutd&&up=<?=$x['stid']?>"><button>update</button></a></td>
                <td><a onclick="return confirm('are you sure you want to delete record of <?=$x['quantity']?>kg')" href="delete.php?delpout=<?=$x['stid']?>"><button>delete</button></a></td>
                
            </tr>
            <?php }?>
        </table>
        <?php } else ?> <h1>!!no transction on this product</h1>
    </div>
    <div class="<?=isset($_GET['up'])?'form':'h'?>">
    <form action="add.php" method="post">
        <?php
        $select = $conn->query("select*from product,productout where pid=productid and  stid='{$_GET['up']}'");
        $x = mysqli_fetch_array($select);
        
        ?>
            <a class="close" href='?pout'>&times;</a>
            <h1><u>update product in</u></h1>
            <label for="">product</label>
            <select name="product" id="">
            <option value="<?=$x['productid']?>"><?=$x['pname']?></option>
              
            </select>
            <label for="">quantity</label>
            <input type="hidden" name="id" value="<?=$x['stid']?>">
            <input type="hidden" name="cqty" min='0' max='1000' value="<?=$x['quantity']?>">
            <input type="number" name="qty" min='0' max='1000' value="<?=$x['quantity']?>">
            <label for="">unit price</label>
            <input type="number" name="uprice" id=""  min='0' max='10000' required value="<?=$x['uprice']?>">
            <input type="submit" value="update product out" name="updateout" r>
        </form>
    </div>
    
</body>
</html>