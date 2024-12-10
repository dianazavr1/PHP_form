<?php
session_start();
include 'postgress.php';

// Проверка роли пользователя
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Доступ запрещён.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action === 'update') {
        $field = $_POST['field'];
        $value = $_POST['value'];

        try {
            $stmt = $dbconn->prepare("UPDATE personal_data SET $field = :value WHERE id = :id");
            $stmt->bindValue(':value', $value);
            $stmt->bindValue(':id', $id);
            if ($stmt->execute()) {
                echo "Запись обновлена.";
            } else {
                echo "Ошибка обновления.";
            }
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    } elseif ($action === 'delete') {
        try {
            $stmt = $dbconn->prepare("DELETE FROM personal_data WHERE id = :id");
            $stmt->bindValue(':id', $id);
            if ($stmt->execute()) {
                echo "Запись удалена.";
            } else {
                echo "Ошибка удаления.";
            }
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}

// Получение записей из базы
try {
    $stmt = $dbconn->query("SELECT * FROM personal_data");
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        form {
            display: inline;
            margin-right: 10px;
        }

        select, input[type="text"], button {
            padding: 8px;
            font-size: 14px;
            margin-top: 5px;
        }

        select, input[type="text"] {
            width: 150px;
            margin-right: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 100px;
            margin: 0 auto;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Панель администратора</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= htmlspecialchars($record['id']) ?></td>
                <td><?= htmlspecialchars($record['imya']) ?></td>
                <td><?= htmlspecialchars($record['familya']) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $record['id'] ?>">
                        <select name="field">
                            <option value="imya">Имя</option>
                            <option value="familya">Фамилия</option>
                        </select>
                        <input type="text" name="value" required>
                        <button type="submit">Обновить</button>
                    </form>
                    <form method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $record['id'] ?>">
                        <button type="submit" class="delete-button">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="logout.php">Выйти</a>
</div>

</body>
</html>
