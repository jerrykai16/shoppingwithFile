<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品目錄</title>
    <style>
      table{
            margin-left:auto; 
            margin-right:auto;
            }
    </style>
</head>
<body>
    <?php
    session_start();
    $filename = "product.txt";
    $product = file($filename);
    $pId = $_SESSION["id"];
    
    
    $id = array();
    $name = array();
    $price = array();
    $img = array();
    $total = 0;

   foreach($product as $line){
      $productArr = explode(",",$line);
      $id[] = $productArr[0];
      $name[] = $productArr[1];
      $price[] = $productArr[2];
      $img[] = $productArr[3];
    }
    ?>

    <h1 style=text-align:center>感謝您的購買，商品清單如下:</h1>
    <table style=border:3px #cccccc solid; cellpadding=10 border=1>
    <?php
    for($i=0; $i<count($pId); $i++){
      for($j=0; $j<count($id); $j++){
        if($pId[$i] ==$id[$j]){
          echo
            "<tr>
              <td rowspan=3><img src=pics/$img[$j] width=250 height=375></td>
              <td>編號：$id[$j]</td>
            </tr>
            <tr>
              <td>名稱：$name[$j]</td>
            </tr>
            <tr>
              <td>價格：$price[$j]</td>
            </tr>
           ";
           $total += $price[$j];
        }
      }
    }
    echo"
    <tr>
      <td align=center colspan=2>
        總金額：$total
      </td>
    </tr>";
    $_SESSION["price"] = $total;
    ?>
    <tr>
      <td align=center colspan=2>
        <button> 
          <a href=buy.php>結帳</a>
        </button>
      </td>
    </tr>
    </table>
    <a href="clean.php">清空購物車</a>
</body>
</html>
