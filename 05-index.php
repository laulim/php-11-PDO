<?php 
$db = new PDO('mysql:host=localhost;dbname=mini-site', 'root', '');

$sql = "DELETE FROM users WHERE name = :name";
$stmt = $db->prepare($sql);

$username = "newFlash";

$stmt->bindValue(':name', $username);
$stmt->execute();

echo "<p> Было затронуто строк: " . $stmt->rowCount() . "</p>";



 ?>