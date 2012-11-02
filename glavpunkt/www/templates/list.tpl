<html>
<head>
  <meta charset="utf-8" />
  <title>Просмотр данных</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Просмотр данных</h1>
<table border="1">
  <tr align="center" bgcolor="#BCBBAAEE">
     <td colspan="3" style="font-size: 100%; font-family: sans-serif">Url</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Заголовок</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Дата новости</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Новость</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Дата добавления новости</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Дата последнего изменения новости</td>
  </tr>
  {foreach $list as $row}
   <tr>
     <td colspan="3" style="font-size: 100%; font-family: sans-serif"><a href="{$row['url']|escape}">{$row['url']|escape}</a></td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['title']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['date']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['body']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['create_date']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['modify_date']|escape}</td>
  </tr>
  {/foreach}</td>
</table>
</body>
</html>
