<?php
include"conn-db.php";
$pagename= $_GET['pagename'];
$table = $_GET['table'];
$css =$_GET['css'];
$sql = "SELECT * FROM `$table`";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
  if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    if (isset($_POST['delete'])) {
      $sql = "DELETE FROM `$table` WHERE `ID` = :ID";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':ID', $ID);
      $stmt->execute();
    } else if (isset($_POST['update'])) {
        header('Location: update.php?table='.$table. '&pagename=' . $pagename . '&css=' . $css . '&ID='. $ID . '&name=' . $name);
        exit;
    }
    header('Location: all.php?table='.$table. '&pagename=' . $pagename . '&css=' . $css);
    exit;
}
   
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>ALL data</title>
  <link rel="stylesheet" href="fdb.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1><?=$pagename ?></h1>
    <nav>
      <ul>
        <li><a href="super.php">Home</a></li>
        <li><a href="add-data.php?table=<?=$table?>&pagename=<?=$pagename?>&css=<?=$css?>">Add product</a></li>
      </ul>
    </nav>
  </header>
  <center><h2>جميع المنتجات</h2></center>
<div class="main">
	<table  >
		<thead >
      
  <tr>
  <th>#ID</th>
    <th>name </th>
    <th>price</th>
    <th>amount</th>
    <th></th>
    <th></th>
  </tr>
                   
		</thead>
		<tbody>
			<?php
			while ($row = $stmt->fetch()) {
				echo "<tr>";
				echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['price'] . "</td>";
				echo "<td>" . $row['amount'] . "</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
        echo "<input type='hidden' name='name' value='" . $row['name'] . "'>";
        echo "<button type='submit' name='delete'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
        echo "<input type='hidden' name='name' value='" . $row['name'] . "'>";
        echo "<button type='submit' name='update'>Update</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
        
               
				
			}
			?>
      
		</tbody>
	</table>
</div>
</body>
</html>

