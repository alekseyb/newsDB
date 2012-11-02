<html>
<head>
  <meta charset="utf-8" />
  <title>Добавление/изменение новостей</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Добавление/изменение новостей</h1>
<form action="index.php?page=форма добавления/редактирования новости" method="post">
{foreach $formErrors as $error}
<p class="error">{$error}</p>
{/foreach}
 <p class="brown">Ссылка на статью: <input type="text" name="url" value="{$url|escape}" /></p>
 <p class="blue">Заголовок статьи: <input type="text" name="title" value="{$title|escape}" /></p>
 <p id="c1">Дата новости: <input type="text" name="date" value="{$date|escape}" /></p>
 <p>Текст новости: <textarea rows="10" cols="45" name="text" value="{$text|escape}">{$text|escape}</textarea></p>
 <p><input type="submit" name="submit" value="Добавить" />
    <input type="submit" name="submit1" value="Изменить" /> 
	<input type="submit" name="submit2" value="Удалить" /></p>

<table border="1">
  <tr align="center" bgcolor="#BCBBAAEE">
     <td colspan="3" style="font-size: 100%; font-family: sans-serif">Url</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Заголовок</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Дата новости</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">Новость</td>
  </tr>
  {foreach $list as $row}
   <tr>
     <td colspan="3" style="font-size: 100%; font-family: sans-serif"><a href="{$row['url']|escape}">{$row['url']|escape}</a></td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['title']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['date']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif">{$row['body']|escape}</td>
	 <td colspan="3" style="font-size: 100%; font-family: sans-serif"><p><input type="submit" name="{$row['id']|escape}" value="Изменить" /></p></td>
  </tr>
  {/foreach}</td>
</table>
</form>
</body>
</html>
