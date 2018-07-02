<?php 

$db = new PDO('mysql:host=localhost;dbname=mini-site', 'root', '');

// 1. Выборка без защиты от SQL инъекций
/*
$username = 'joker';
$password = '555';
$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
$result = $db->query($sql);

echo "<h2>Выборка записи без защиты от SQL инъекции: </h2>";
// print_r($result->fetch(PDO::FETCH_ASSOC));

if ($result->rowCount() == 1) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']} <br>";
	echo "Email пользователя: {$user['email']} <br>";
}
*/
// ============================================================






// 2. Выборка с защитой от SQL инъекций - В РУЧНОМ РЕЖИМЕ
/*
$username = 'joker';
$password = '555';

$username = $db->quote($username);
$username = strtr($username, array('_' => '_', '%' => '\%'));

$username = $db->quote($password);
$username = strtr($password, array('_' => '_', '%' => '\%'));

$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
$result = $db->query($sql);

echo "<h2>Выборка с защитой от SQL инъекций - В РУЧНОМ РЕЖИМЕ: </h2>";
// print_r($result->fetch(PDO::FETCH_ASSOC));
if ($result->rowCount() == 1) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']} <br>";
	echo "Email пользователя: {$user['email']} <br>";
}
*/
// ============================================================






// 3.1 Выборка с автоматическойзащитой от SQL инъекций
/*
$sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";
$stmt = $db->prepare($sql);

$username = 'joker';
$password = '555';


$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();

// Альтернативная запись
// $stmt->execute(array(':username' => $username, ':password' => $password));

$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);
$stmt->fetch();

echo "<h2>Выборка с автоматической защитой от SQL инъекции: </h2>";
echo "Имя пользователя: {$name} <br>";
echo "Email пользователя: {$email} <br>";
*/
// ============================================================






// 3.2 Выборка с автоматической защитой от SQL инъекций
$sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";
$stmt = $db->prepare($sql);

$username = 'joker';
$password = '555';

// $stmt->bindValue(1, $username);
// $stmt->bindValue(2, $password);
// $stmt->execute();

// Альтернативная запись
$stmt->execute(array($username, $password));

$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);
$stmt->fetch();

echo "<h2>Выборка с автоматической защитой от SQL инъекции: </h2>";
echo "Имя пользователя: {$name} <br>";
echo "Email пользователя: {$email} <br>";

// $string = "<script>hello</script>";
// $string = htmlentities($string);
// echo $string;
// $username = htmlentities($username);
// $password = htmlentities($password);

 ?>