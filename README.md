# Шпаргалка
Подключение к БД
```php
$db = new PDO('mysql:host=localhost;dbname=filmoteka', 'root', '');
```

Создание sql запроса с использованием плейсхолдеров для параметров
```php
$sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";
```

Создание sql запроса с использованием неопределенных параметров 
```php
$sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";
```

Подготовка запроса в БД с учетом предполагаемых параметров
```php
$stmt = $db->prepare($sql);
```

Подстановка данных в плейсхолдеры функцией bindValue() и выполнение функции execute(), которая запускает подготовленный запрос и автоматически защищает от SQL инъекций. Так же можно записать данные сразу в функцию с использованием ассоциативного массива
```php
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();
// $stmt->execute(array(':username' => $username, ':password' => $password));
```

То же самое с использованием неопределенных параметров
```php
$stmt->bindValue(1, $username);
$stmt->bindValue(2, $password);
$stmt->execute();
// $stmt->execute(array($username, $password));
```

Привязка переменных к заданным столбцам в результирующем наборе запроса и вывод строки 
```php
$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);
$stmt->fetch();
```

Функция htmlentities() преобразует все html знаки в строчные символы
```php
$string = "<script>hello</script>";
$string = htmlentities($string);
```
