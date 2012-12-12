<html>
<head>
  <meta charset="utf-8" />
  <title>Последние новости</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Последние новости</h1>
  {foreach $list as $row}
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
	  <a href="index.php?page=Полный+список+новостей&showid={$row['id']|escape}">{$row['title']|escape}</a> ({$row['date']|escape})<br>
	  {$row['LEFT(body,160)']|escape}...</p>
  {/foreach}
  <p><a href="index.php?page=Полный список новостей">Перейти к полному списку новостей</a></p>
  <p><a href="index.php?page=Опубликовать новость">Опубликовать новость</a></p>
</body>
</html>
