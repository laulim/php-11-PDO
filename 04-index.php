<?php 
$db = new PDO('mysql:host=localhost;dbname=mini-site', 'root', '');

$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
$stmt = $db->prepare($sql);

$username = "newFlash";
$useremail = "000Flash@mail.ru";
$id = '11';

$stmt->bindValue(':name', $username);
$stmt->bindValue(':email', $useremail);
$stmt->bindValue(':id', $id);
$stmt->execute();

echo "<p> Было затронуто строк: " . $stmt->rowCount() . "</p>";

 ?>