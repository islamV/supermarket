<?php
$host="localhost";
$username="root";
$password="";
$dbName="supermarket";

$fruits = "fruits";
$vegetables = "vegetables";
$dry_products = "dry_products";
$cheese_and_dairy = "cheese_and_dairy";
$meats = "meats";

try{
    $conn= new PDO("mysql:host=$host;dbname=$dbName",$username,$password);
  // echo "success";
}catch(Exception $e){
    echo $e->getMessage();
    exit();
}