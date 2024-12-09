<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $_SESSION['name'] = $name; // Сохраняем имя в сессию
    header("Location: welcome.php"); // Перенаправляем на ту же страницу, чтобы использовать сессию
    exit();
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    echo "<h1>Добро пожаловать, $name!</h1>";
} else {
    echo "<h1>Сначала заполните форму!</h1>";
}
