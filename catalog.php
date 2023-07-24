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
    if(!isset($_SESSION["tel"]))
      $_SESSION["tel"] = $_POST["tel"];
    if(!isset($_SESSION["id"]))
      $_SESSION["id"] = array();  
    $idArr = array();

    $filename = "product.txt";
    $product = file($filename);
    
    $id = array();
    $name = array();
    $price = array();
    $img = array();

   foreach($product as $line){
      $productArr = explode(",",$line);
      $id[] = $productArr[0];
      $name[] = $productArr[1];
      $price[] = $productArr[2];
      $img[] = $productArr[3];
    }
    ?>

    <h1 style=text-align:center>商品目錄</h1>
    <table style=border:3px #cccccc solid; cellpadding=10 border=1>
    <?php
    for($i=0; $i<count($id); $i++){
      echo
        "<tr>
          <td rowspan=3><img src=pics/$img[$i] width=250 height=375></td>
          <td>編號：$id[$i]</td>
        </tr>
        <tr>
          <td>名稱：$name[$i]</td>
        </tr>
        <tr>
          <td>價格：$price[$i]</td>
        </tr>
        <tr>
        <td align=center colspan=2>
          <button> 
            <a href=savecar.php?id=$id[$i]>加入購物車</a>
          </button>
        </td>
        </tr>";
    }
    ?>
    <tr>
      <td align=center colspan=2>
        <button style=align:center>
          <a href="shopping-cart.php">去結帳</a>
        </button>
      </td>
    </tr>
    </table>

</body>
</html>