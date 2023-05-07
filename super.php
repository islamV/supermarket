<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Supermarket Home Page</title>
  <link rel="stylesheet" href="super.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1>Supermarket Management</h1>
    <nav>
      <ul>
      <li><a href="logout.php">logout</a></li>
        <li><a href="super.php">Home</a></li> 
    </nav>
    
  </header>
  
  <section class="banner">
    <h2>Welcome Islam!</h2>
    </section>
   <section class="classification">
  <h2>Product Classification</h2>
  <ul>
    <li><a href="all.php?table=fruits&pagename=Fruits&css=f.css"">Fruits</a></li>
    <li><a href="all.php?table=vegetables&pagename=Vegetables&css=v.css">Vegetables</a></li>
    <li><a href="all.php?table=meats&pagename=Meats&home=meat.php&css=m.css">Meats</a></li>
    <li><a href="all.php?pagename=Cheese-Dairy&table=cheese_and_dairy&css=cd.css">Cheese&Dairy</a></li>
    <li><a href="all.php?table=dry_products&pagename=Dry products&css=D.css">Dry products</a></li>
  </ul>
</section>
</body>
</html>
