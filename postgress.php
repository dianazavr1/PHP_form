<?php
$host = 'localhost';       // Адрес сервера PostgreSQL
$db = 'phpform';           // Имя базы данных
$user = 'postgres';        // Имя пользователя
$password = 'postgres';    // Пароль

try {
    $dsn = "pgsql:host=$host;dbname=$db";
    $dbconn = new PDO($dsn, $user, $password);

    // Настройка режима ошибок
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "подключено";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    exit; // Завершаем выполнение, если подключение не удалось
}
?>
