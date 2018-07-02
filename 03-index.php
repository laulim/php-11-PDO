<?php 
$db = new PDO('mysql:host=localhost;dbname=mini-site', 'root', '');

// Готовим запрос в БД
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $db->prepare($sql);

$userName = "Flash";
$userEmail = "Flash@mail.ru";

$stmt->bindValue(':name', $userName);
$stmt->bindValue(':email', $userEmail);
$stmt->execute();

// $stmt->execute(array(':name' => $userName, ':email' => $userEmail));

echo "<p> Было затронуто строк: " . $stmt->rowCount() . "</p>";
echo "<p> ID вставленной записи: " . $db->lastInsertId() . "</p>";


 ?>