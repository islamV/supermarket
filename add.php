<?php
session_start();
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="UTF-8">
  <title>Supermarket database</title>
  <link rel="stylesheet" href="add.css">  
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
  <center><h2>اضافة منتج</h2></center>
  <center>
	 <div class="main">
     <h3>name : <?php echo $_POST['name']; ?></h3>
  <h3>price : <?php echo $_POST['price']; ?> 💲</h3>
   <h3>amount : <?php echo $_POST['amount']; ?> kg</h3>
    <h2> ✅تم اضافة المنتج بنجاح </h2>
    <br><br>
    <br><br>
    </div>
		</center>  
            
</body>
</html>
<?php
session_destroy();
?>