<?php include 'postgress.php';?>
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrierter - Personal Data Collection</title>
  <style>
    body {
      font-family: "Helvetica Neue", sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      font-weight: 300;
      color: #222;
    }
    label {
      font-weight: 500;
      margin: 15px 0 5px;
      display: block;
      font-size: 14px;
      color: #555;
    }
    input, select {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
      background-color: #f9f9f9;
      transition: border 0.3s ease;
    }
    input:focus, select:focus {
      border-color: #007bff;
      background-color: #fff;
    }
    input[type="radio"], label.inline {
      display: inline;
      width: auto;
    }
    .form-group {
      margin-bottom: 20px;
    }
    button {
      display: block;
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #0056b3;
    }
    .form-group.inline {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .form-group.inline label {
      flex: 1;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Мектеп маалыматтар системасы</h1>
  <h2>ЛИЧНЫЕ ДАННЫЕ</h2>
<form action="Sig.php" method="POST">
    <label for="inn">ИНН</label>
    <input type="text" id="inn" name="inn">

    <label for="familya">Фамилия</label>
    <input type="text" id="familya" name="familya">

    <label for="imya">Имя</label>
    <input type="text" id="imya" name="imya">

    <label for="otchestvo">Отчество</label>
    <input type="text" id="otchestvo" name="otchestvo">

    <label for="data_rojdeniya">Дата Рождения</label>
    <input type="date" id="data_rojdeniya" name="data_rojdeniya">

    <label for="pol">Пол</label>
    <input type="text" id="pol" name="pol">

    <label for="mr_oblast">Место Рождения (Область)</label>
    <input type="text" id="mr_oblast" name="mr_oblast">

    <label for="mr_rayon">Место Рождения (Район)</label>
    <input type="text" id="mr_rayon" name="mr_rayon">

    <label for="mr_selo">Место Рождения (Село)</label>
    <input type="text" id="mr_selo" name="mr_selo">

    <label for="mr_ulitsa">Место Рождения (Улица)</label>
    <input type="text" id="mr_ulitsa" name="mr_ulitsa">

    <label for="mr_dom_no">Место Рождения (Дом)</label>
    <input type="text" id="mr_dom_no" name="mr_dom_no">

    <label for="bomj">Бомж</label>
    <input type="checkbox" id="bomj" name="bomj" value="yes">

    <label for="mj_oblast">Место Жительства (Область)</label>
    <input type="text" id="mj_oblast" name="mj_oblast">

    <label for="mj_rayon">Место Жительства (Район)</label>
    <input type="text" id="mj_rayon" name="mj_rayon">

    <label for="mj_selo">Место Жительства (Село)</label>
    <input type="text" id="mj_selo" name="mj_selo">

    <label for="mj_ulitsa">Место Жительства (Улица)</label>
    <input type="text" id="mj_ulitsa" name="mj_ulitsa">

    <label for="mj_dom_no">Место Жительства (Дом)</label>
    <input type="text" id="mj_dom_no" name="mj_dom_no">

    <label for="natsionalnost">Национальность</label>
    <input type="text" id="natsionalnost" name="natsionalnost">

    <label for="grazhdanstvo">Гражданство</label>
    <input type="text" id="grazhdanstvo" name="grazhdanstvo">

    <label for="invalidnost">Инвалидность</label>
    <input type="text" id="invalidnost" name="invalidnost">

    <label for="n_documentov">Номер Документов</label>
    <input type="text" id="n_documentov" name="n_documentov">

    <label for="pasport_no">Номер Паспорта</label>
    <input type="text" id="pasport_no" name="pasport_no">

    <label for="svidetelstvo_o_rojdenii">Свидетельство о Рождении</label>
    <input type="text" id="svidetelstvo_o_rojdenii" name="svidetelstvo_o_rojdenii">

    <label for="kirgen_chili">Дата Вступления</label>
    <input type="date" id="kirgen_chili" name="kirgen_chili">

    <label for="okugan_tili">Язык Обучения</label>
    <input type="text" id="okugan_tili" name="okugan_tili">

    <label for="klass">Класс</label>
    <input type="text" id="klass" name="klass">

    <label for="klass_cetekchisi">Классный Руководитель</label>
    <input type="text" id="klass_cetekchisi" name="klass_cetekchisi">

    <label for="baylaniw_telefonu">Телефон</label>
    <input type="text" id="baylaniw_telefonu" name="baylaniw_telefonu">

    <label for="email">Email</label>
    <input type="email" id="email" name="email">

    <button type="submit">Отправить</button>
</form>

</div>

</body>
</html>
'
?>