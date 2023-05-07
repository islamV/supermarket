<?php
session_start();
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <title>Supermarket database</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <center>
	 <div class="main">
     <h3>name : <?php echo $_SESSION['user']['name']; ?></h3>
  <h3>price : <?php echo $_SESSION['user']['price']; ?> </h3>
   <h3>amount : <?php echo $_SESSION['user']['amount']; ?> kg</h3>
    <h2> </h2>
    <br><br>
    <br><br>
    <a href="search.php">Search for another product</a>
    </div>
		</center>  
            
    <style>
      .main{
        font-family: 'Cairo', sans-serif;
        width: 500px;
        height: 500px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px #000;
        padding: 20px;
        margin-top: 100px;
      }
    </style>
</body>
</html>
