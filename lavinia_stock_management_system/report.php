<?php 
include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="report">
        <form action="#" method="post">
            <input type="date" name="date">
            <input type="submit" value="generate" name="generate">
            <div class="add" onclick="pdf()">pdf</div>
        </form>
    </div>
    <div class="table">
        <?php if(isset($_POST['generate'])){
            $date = $_POST['date'];
           $select =$conn->query("select*,sum(quantity),sum(tprice) from productin,product where pid=productid and 
           date(date)='$date' group by pid");
           
           if (mysqli_num_rows($select)>0) {
            
           ?>
        <h4>Report on <?=$_POST['date']?> from stock in</h4>
        <table >
            <tr>
                <th>N<sup>o</sup></th>
                <th>product name</th>
                <th>quantity</th>
                <th>total price</th>
            </tr>
            <?php $y=1; foreach($select as $x){?>
            
            <tr>
                <td><?=$y++?></td>
                <td><?=$x['pname']?></td>
                <td><?=$x['sum(quantity)']?>kg</td>
                <td><?=$x['sum(tprice)']?>frw</td>
                
            </tr>
            <?php }?>
        </table>
        <?php }else{
            ?><h1>!! no result found</h1>
       <?php }
     }else{?><h1>!! select date to view report</h1><?php }?>
    </div>
</body>
<script src="html2.js"></script>
<script>
    function pdf(){
        let c = document.querySelector("table");
        html2pdf(c).save('report.pdf')
    }
</script>
</html>