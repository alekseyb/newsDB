<html>
<head>
  <meta charset="utf-8" />
  <title>Новость</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<a href="index.php?page=Полный список новостей">Перейти к полному списку новостей</a><br>
<h1>Новость</h1>
  {foreach $list as $row}
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
    <p>{$row['title']|escape}</p>
    <p>{$row['date']|escape}<p>
    <p>{$row['body']|escape}</p>
  {/foreach}
  <br>
  <p><a href="index.php?page=Полный+список+новостей&regid={$row['id']|escape}">Редактировать</a></p></p>
</body>
</html>
