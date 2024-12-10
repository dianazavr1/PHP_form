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

<h1>Панель администратора</h1>
<table border="1">
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
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= $record['id'] ?>">
                    <select name="field">
                        <option value="imya">Имя</option>
                        <option value="familya">Фамилия</option>
                    </select>
                    <input type="text" name="value" required>
                    <button type="submit">Обновить</button>
                </form>
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $record['id'] ?>">
                    <button type="submit" style="background-color: red; color: white;">Удалить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="logout.php">Выйти</a>
