<?php 

$db = new PDO('mysql:host=localhost;dbname=filmoteka', 'root', '');

/*
$sql = "SELECT * FROM films";
$result = $db->query($sql);

echo "<h2>Вывод записей из результата по одной: </h2>";
// print_r( $result->fetch(PDO::FETCH_ASSOC));

while ($film = $result->fetch(PDO::FETCH_ASSOC)) {
	// print_r($film);
	echo "Название фильма: " . $film['title'] . "<br>";
	echo "Жанр фильма: " . $film['genre'] . "<br>";
	echo "<br>";
}
*/

//==================================================

/*
$sql = "SELECT * FROM films";
$result = $db->query($sql);
$films = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Выборка всех записей в массив и вывод на экран: </h2>";
foreach ($films as $film) {
	echo "Название фильма: " . $film['title'] . "<br>";
	echo "Жанр фильма: " . $film['genre'] . "<br>";
	echo "<br>";
}
*/

//==================================================


$sql = "SELECT * FROM films";
$result = $db->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('title', $title);
$result->bindColumn('genre', $genre);
$result->bindColumn('year', $year);

echo "<h2>Вывод записей с привязкой данных к переменным: </h2>";

while ($result->fetch(PDO::FETCH_ASSOC)) {
	echo "ID {$id} <br>";
	echo "Название: {$title} <br>";
	echo "Жанр: {$genre} <br>";
	echo "Год: {$year} <br>";
	echo "<br>";
}




 ?>