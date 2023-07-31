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
      $pId = $_SESSION["id"];
      $id = array();
      $name = array();
      $price = array();
      $img = array();
      $total = 0;

      $link = @mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'root',       // 使用者名稱 
        '',            // 密碼
        'shoppingwithfile');
    
      $sql = "SELECT * FROM `product`";
      $result=mysqli_query($link, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id[] = $row["id"];
        $name[] = $row["name"];
        $price[] = $row["price"];
        $img[] = $row["pic"];
      }
      mysqli_close($link);

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
