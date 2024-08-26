
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
    <a class="add" href="?p&&add">add new</a>
    <div class="table">
        <h2>product</h2>
        <table border="1">
            <tr>
                <th>N<sup>o</sup></th>
                <th>product name</th>
                <th colspan='2'>action</th>
            </tr>
            <?php $y=1; foreach($select as $x){?>
            <tr>
                <td><?=$y++?></td>
                <td><?=$x['pname']?></td>
                <td><a href="?p&&up=<?=$x['productid']?>"><button>update</button></a></td>
                <td><a onclick="return confirm('are you sure you want to delete <?=$x['pname']?> ')"  href="delete.php?delp=<?=$x['productid']?>"><button>delete</button></a></td>
                
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="<?=isset($_GET['add'])?'form':'h'?>">
        <form action="add.php" method="post">
            <a class="close" href='?p'>&times;</a>
            <h1><u>add product form</u></h1>

            <label for="">product name</label>
            <input type="text" name="pname" id="" pattern="[a-zA-Z]{3,20}" title="invalid product name" required>
            <input type="submit" value="add product" name="addp">
        </form>
    </div>
    <div class="<?=isset($_GET['up'])?'form':'h'?>">
        <?php
         $select = $conn->query("select*from product where productid= '{$_GET['up']}'");
         $x = mysqli_fetch_array($select);
        ?>
        <form action="add.php" method="post">
            <a class="close" href='?p'>&times;</a>
            <h1><u>update product</u></h1>
             <input type="hidden" name="id" value="<?=$x['productid']?>">
            <label for="">product name</label>
            <input type="text" name="pname" value="<?=$x['pname']?>" pattern="[a-zA-Z]{3,20}" title="invalid product name" required>
            <input type="submit" value="update product" name="updatep">
        </form>
    </div>
</body>
</html>