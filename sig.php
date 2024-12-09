<?php
include 'postgress.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!$dbconn) {
            echo "Ошибка: подключение к базе данных не установлено.";
            exit;
        }

        $sql = "INSERT INTO personal_data (
                inn, familya, imya, otchestvo, data_rojdeniya, pol, 
                mr_oblast, mr_rayon, mr_selo, mr_ulitsa, mr_dom_no, bomj, 
                mj_oblast, mj_rayon, mj_selo, mj_ulitsa, mj_dom_no, natsionalnost, grazhdanstvo, 
                invalidnost, n_documentov, pasport_no, svidetelstvo_o_rojdenii, kirgen_chili, 
                okugan_tili, klass, klass_cetekchisi, baylaniw_telefonu, email) 
                VALUES (
                :inn, :familya, :imya, :otchestvo, :data_rojdeniya, :pol, 
                :mr_oblast, :mr_rayon, :mr_selo, :mr_ulitsa, :mr_dom_no, :bomj, 
                :mj_oblast, :mj_rayon, :mj_selo, :mj_ulitsa, :mj_dom_no, :natsionalnost, 
                :grazhdanstvo, :invalidnost, :n_documentov, :pasport_no, :svidetelstvo_o_rojdenii, 
                :kirgen_chili, :okugan_tili, :klass, :klass_cetekchisi, :baylaniw_telefonu, :email)";

        $stmt = $dbconn->prepare($sql);

        // Массив данных для вставки
        $data = [
            ':inn' => $_POST['inn'] ?? null,
            ':familya' => $_POST['familya'] ?? null,
            ':imya' => $_POST['imya'] ?? null,
            ':otchestvo' => $_POST['otchestvo'] ?? null,
            ':data_rojdeniya' => $_POST['data_rojdeniya'] ?? null,
            ':pol' => $_POST['pol'] ?? null,
            ':mr_oblast' => $_POST['mr_oblast'] ?? null,
            ':mr_rayon' => $_POST['mr_rayon'] ?? null,
            ':mr_selo' => $_POST['mr_selo'] ?? null,
            ':mr_ulitsa' => $_POST['mr_ulitsa'] ?? null,
            ':mr_dom_no' => $_POST['mr_dom_no'] ?? null,
            ':bomj' => $_POST['bomj'] ?? null,
            ':mj_oblast' => $_POST['mj_oblast'] ?? null,
            ':mj_rayon' => $_POST['mj_rayon'] ?? null,
            ':mj_selo' => $_POST['mj_selo'] ?? null,
            ':mj_ulitsa' => $_POST['mj_ulitsa'] ?? null,
            ':mj_dom_no' => $_POST['mj_dom_no'] ?? null,
            ':natsionalnost' => $_POST['natsionalnost'] ?? null,
            ':grazhdanstvo' => $_POST['grazhdanstvo'] ?? null,
            ':invalidnost' => $_POST['invalidnost'] ?? null,
            ':n_documentov' => $_POST['n_documentov'] ?? null,
            ':pasport_no' => $_POST['pasport_no'] ?? null,
            ':svidetelstvo_o_rojdenii' => $_POST['svidetelstvo_o_rojdenii'] ?? null,
            ':kirgen_chili' => $_POST['kirgen_chili'] ?? null,
            ':okugan_tili' => $_POST['okugan_tili'] ?? null,
            ':klass' => $_POST['klass'] ?? null,
            ':klass_cetekchisi' => $_POST['klass_cetekchisi'] ?? null,
            ':baylaniw_telefonu' => $_POST['baylaniw_telefonu'] ?? null,
            ':email' => $_POST['email'] ?? null,
        ];

        // Выполнение запроса
        if ($stmt->execute($data)) {
            echo "Данные успешно отправлены.";
        } else {
            echo "Ошибка при отправке данных.";
        }
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>
