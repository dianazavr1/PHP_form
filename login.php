<?php
session_start();
include 'postgress.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $dbconn->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: admin.php');
            exit;
        } else {
            echo "Неверное имя пользователя или пароль.";
        }
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <label>Имя пользователя: <input type="text" name="username" required></label><br>
    <label>Пароль: <input type="password" name="password" required></label><br>
    <button type="submit">Войти</button>
</form>
