<?php
/**
 * Вывод всех новостей на экран
 */
class listData {

/**
 * Функция по выводу данных на экран из базы
 */
function listData($DBH, $tableName, $smarty) {
  $rows = array();
  // выборка данных из таблицы
  $STH = $DBH->query("SELECT * FROM $tableName");  
  // устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);  
  // Вывод данных из таблицы на экран
  while($row = $STH->fetch()) {  
    $rows[] = $row;
	}
  
  //отключииться от базы
  $DBH = NULL;
  $smarty->assign("list", $rows);
  $smarty->display("list.tpl");
}
}
  
#$DBH->exec("DROP DATABASE `$dbName`;");
