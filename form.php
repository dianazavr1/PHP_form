<?php
include 'postgress.php';

if (!$dbconn) {
    echo "Ошибка: подключение к базе данных не установлено.";
    exit;
}
