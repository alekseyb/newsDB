<html>
<head>
  <meta charset="utf-8" />
  <title>Список новостей</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Список новостей</h1>
  {foreach $list as $row}
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
    <a href="index.php?page=Полный+список+новостей&showid={$row['id']|escape}">{$row['title']|escape}</a> ({$row['date']|escape})
    <a href="index.php?page=Полный+список+новостей&remid={$row['id']|escape}">Удалить новость</a>
    <a href="index.php?page=Полный+список+новостей&regid={$row['id']|escape}">Редактировать</a></p>
  {/foreach}
  <br>
  <p><a href="index.php?page=Полный список новостей&shownews=1">Показать следующие 3 новости</a></p>
  <p><a href="index.php?page=Опубликовать новость&newnews=1">Опубликовать новость</a></p>
</body>
</html>
