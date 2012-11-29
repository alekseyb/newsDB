<?php
// Установки Smarty
require_once('..\lib\Smarty\libs\Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '.\templates';
$smarty->compile_dir = '..\lib\Smarty\templates_c';
$smarty->config_dir = '..\lib\Smarty\configs';
$smarty->cache_dir = '..\lib\Smarty\cache';

ini_set('display_errors', 1);
error_reporting(E_ALL);

//переменные для подключения и создания базы данных
$hostName = "localhost";        // имя сервера 
$userName = "root";             // пользователь базы данных MySQL  
$passWord = "";                 // пароль для доступа к серверу MySQL  
$dbName = "newsDB";               // название создаваемой базы данных 
$tableName = "News";			// имя таблицы в базе данных
// массив с данными из формы
$dataForm = array();
//вспомогательная переменная для проверки создана новая база или нет
$newBase = "";

//подключение к базе
$DBH = connectDB($hostName, $userName, $passWord, $dbName);
try {
  $DBH->query("use $dbName");
} catch(PDOException $e) {
  #var_dump($e);
  #echo $e->getCode();
  //если причина ошибки не в отсутствии базы, пробрасываем исключение дальше
  //SQLSTATE[42000] [1049] Unknown database 'newsDB'
  if ($e->getCode() != 42000) { 
    throw $e;
  }
  //создаем отсутствующую БД:
  createNewsDB($dbName, $DBH, $tableName);
}


if (!isset($_GET['page'])) {
  mainForm($smarty);
} elseif ($_GET['page'] == 'форма добавления/редактирования новости') {
      include 'form.php';
	  formInput($DBH, $dataForm, $tableName, $smarty);
} elseif ($_GET['page'] == 'Вывод списка новостей') {
      include 'list.php';
	 listData($DBH, $tableName, $smarty);
} else {
  //запрашиваемая страница не найдена:
  #include '404.php';
  #pageNotFound();
}

/**
 * Функция по выводу на экран шаблона с данными из базы
 */
function mainForm() {
  global $smarty;
  $smarty->display("main.tpl");
}

function connectDB($hostName, $userName, $passWord, $dbName) {
  $DBH = new PDO("mysql:host=$hostName", $userName, $passWord);
  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  return $DBH;
}

/**
 * Создание БД и таблицы новостей
 * @param $dbName название БД
 */
function createNewsDB($dbName, $DBH, $tableName) {
  $DBH->exec("CREATE DATABASE `$dbName`;
           USE `$dbName`;
           CREATE table $tableName (`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `url` CHAR(100), `title` CHAR(100),
           `date` DATE, `body` TEXT, `create_date` DATETIME, `modify_date` DATETIME);");
}

