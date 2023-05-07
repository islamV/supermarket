<?php
include 'conn-db.php';
session_start();
$pagename= $_GET['pagename'];
$table = $_GET['table'];
$css =$_GET['css'];
$ID =$_GET['ID'];
$name =$_GET['ID'];
$sql = "SELECT * FROM `$table` WHERE `ID` = :ID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ID', $ID);
$stmt->execute();
$row = $stmt->fetch();
if(isset($_POST['submit'])){
    include 'conn-db.php';
    $name=$_POST['name'];
    $price=$_POST['price'];
    $amount=$_POST['amount'];
    $errors=[];
    if(empty($errors)){
      $stmt ="UPDATE `$table` SET `name` = '$name' , `price` =$price ,`amount`=$amount WHERE `$table`.`ID` =$ID";
      $conn->prepare($stmt)->execute();
      header('Location:all.php?table='.$table.'&pagename='.$pagename.'&css='.$css);
      exit;
  }
  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Supermarket database</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?=$css?>">
</head>
<body>
  <header>
    <h1><?=$pagename?></h1>
    <nav>
      <ul>
        <li><a href="all.php?table=<?=$table?>&pagename=<?=$pagename?>&css=<?=$css?>&ID=<?=$ID?>">ALL data</a></li>
       
      </ul>
    </nav>
  </header>
  <center>
<div  class="main">
<form method="POST" action="update.php?table=<?=$table?>&pagename=<?=$pagename?>&css=<?=$css?>&ID=<?=$ID?>">
<input type="hidden" name="table" value="<? $table?>">
<input type="hidden" name="ID" value="<?=$row['ID'] ?>">
<label for="name">Name:</label>
<input type="text" name="name" value="<?=$row['name']?>">
<label for="price">Price:</label>
<input type="number" name="price" value="<?=$row['price']?>">
<label for="amount">Amount:</label>
<input type="number" name="amount" value="<?=$row['amount']?>">
<input type="submit" name="submit" value="update">
    <br>
</form>
</div>
</center>
</body>

<style>
   
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  input {
    margin: 10px;
    text-align: center;
  }
  

    /* تحديد النمط الذي يتم تطبيقه على المدخلات */
    input {
        display: block;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 8px 16px;
        margin-bottom: 16px;
        font-size: 16px;
        font-family: Arial, sans-serif;
    }

    /* تنسيق الحقل الأخير */
    input:last-child {
        margin-bottom: 0;
    }

    /* تنسيق زر الإرسال */
    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
    }
    
  
  
</style>
</html>

?>
