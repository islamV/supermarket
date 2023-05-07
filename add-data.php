<?php
session_start();
$pagename= $_GET['pagename'];
$table = $_GET['table'];
$css =$_GET['css'];
if(isset($_POST['submit'])){
    include 'conn-db.php';
    $name=$_POST['name'];
    $price=$_POST['price'];
    $amount=$_POST['amount'];

    $errors=[];
    // validate name
    if(empty($name)){
        $errors[]="يجب كتابة اسم المنتج";
    }
    if(empty($price)){
        $errors[]="يجب كتابة السعر";
    }
    if(empty($amount)){
        $errors[]="يجب كتابة الكمية";
    }
    
    $stm="SELECT `name` FROM `$table` WHERE `name` = :name";
    $q=$conn->prepare($stm);
    $q->bindValue(':name', $name);
    $q->execute();
    $data=$q->fetch();
   if($data && !empty($name)&& !empty($price)&& !empty($amount)){
     $errors[]="المنتج موجود بالفعل!";
     $_POST['name']='';
     $_POST['price']='';
     $_POST['amount']=''; 
   }
   if(empty($errors)){
    $stm="INSERT INTO `$table` (name,price,amount) VALUES ('$name','$price','$amount')";    
    $conn->prepare($stm)->execute();
    $_POST['name']='';
    $_POST['price']='';
    $_POST['amount']='';
    header('Location: all.php?table=' . $table . '&pagename=' . $pagename . '&css=' . $css);
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
        <li><a href="all.php?table=<?=$table?>&pagename=<?=$pagename?>&css=<?=$css?>">ALL data</a></li>
       
      </ul>
    </nav>
  </header>
  <center>
<div  class="main">
<form action="add-data.php?table=<?=$table?>&pagename=<?=$pagename?>&css=<?=$css?>" method="POST">

    <?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder="name of product"><br>
    <input type="text" value="<?php if(isset($_POST['price'])){echo $_POST['price'];} ?>" name="price" placeholder="price of product"><br>
    <input type="text" value="<?php if(isset($_POST['amount'])){echo $_POST['amount'];} ?>" name="amount" placeholder="amount of product"><br>
    <input type="submit" name="submit" value="Add">
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


