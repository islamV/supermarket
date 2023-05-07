<?php
session_start();
    include 'conn-db.php';
    $table = $_GET['table'];
 if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "DELETE FROM `$table` WHERE `name` = :name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
  }   