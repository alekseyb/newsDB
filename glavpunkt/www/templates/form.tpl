<html>
<head>
  <meta charset="utf-8" />
  <title>Добавление/изменение новостей</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Добавление/изменение новостей</h1>
<form action="index.php?page=Опубликовать новость" method="post">
{foreach $formErrors as $error}
<p class="error">{$error}</p>
{/foreach}
 <p class="brown">Ссылка на статью: <input type="text" name="url" value="{$url|escape}" /></p>
 <p class="blue">Заголовок статьи: <input type="text" name="title" value="{$title|escape}" /></p>
 <p id="c1">Дата новости: <input type="text" name="date" value="{$date|escape}" /></p>
 <p>Текст новости: <textarea rows="10" cols="45" name="text" value="{$text|escape}">{$text|escape}</textarea></p>
 <p><input type="submit" name="submit1" value="Сохранить" /> 
	<input type="submit" name="submit2" value="Отменить" /></p>
</form>
</body>
</html>
