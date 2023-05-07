<?php
$pagename = $_GET['pagename'];
$css = $_GET['css'];
$home =$_GET['home'];
if($pagename=="fruits"){
        $pagename = "Fruits";
     }elseif ($pagename == "vegetables") {
        $pagename = "Vegetables";
     }
      elseif ($pagename == "meat") {
          $pagename = "Meats";
      }
      elseif ($pagename == "Cheese-dairy") {
          $pagename = "Cheese&Dairy";
      }
      elseif ($pagename == "Dry-products") {
          $pagename = "Dry products";
      }     
session_start();
if(isset($_POST['submit'])){
    include 'conn-db.php';
    $name=$_POST['name'];
    $errors=[];
    if(empty($name)){
        $errors[]="يجب كتابة اسم المنتج";
    }
    if(empty($errors)){
      
        $stm="SELECT * FROM `$pagename` WHERE `name` ='$name'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();
        if(!$data){
            $errors[] = "المنتج غير موجود";
          $_POST ['name']="";

        }else{
           
            $_SESSION['user']=[
                'name'=>$name,
                'price'=>$data['price'],
                'amount'=>$data['amount'],
            ];
            header('location:data.php');
        }
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
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= $css ?>">

</head>
<body>
  <header>
    <h1><?php echo $pagename?></h1>
    <nav>
      <ul>
        <li><a href="<?=$home?>">Home</a></li>

      </ul>
    </nav>
  </header>
  <CEnter>
<div  class="main">
<form action="search.php" method="POST">
    <?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder=" name">
    <input type="submit" name="submit" value="Search">
    
    <br><br>
    
</form>
</div>
</CEnter> 
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

