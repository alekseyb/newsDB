<?php
/**
 * Вывод новостей на экран
 */
class listData {

  /**
   * Функция по выводу данных на экран из базы
   * @param String $DBH подключение к базе 
   * @param array $dataform массив с данными
   * @param String $tableName имя таблицы в базе
   * @param string $smarty переменная шаблонизатора smarty
   */
  function AllData($DBH, $dataForm, $tableName, $smarty) {
    if (isset($_GET['newnews'])) { //если нажата кнопка "Опубликовать новость"
      $NewsEdit1 = new EditNews;
      $NewsEdit1->formInput($DBH, $dataForm, $tableName, $smarty);
    } elseif (isset($_GET['regid'])) {
        $_SESSION['id1'] = $_GET['regid'];
        $NewsEdit3 = new EditNews;
        $NewsEdit3->formInput($DBH, $dataForm, $tableName, $smarty);
    } elseif (isset($_GET['showid'])) {
        $id = $_GET['showid'];
        $this->OneData($DBH, $smarty, $tableName, $id);
    } elseif (isset($_GET['remid'])) {
        $_SESSION['id'] = $_GET['remid'];
        $NewsEdit4 = new EditNews;
        $NewsEdit4->removeData ($DBH, $tableName);
        $NumStr = $_SESSION['$NumStr'];
        $this->ShowData($DBH, $smarty, $tableName, $NumStr);
    } elseif (isset($_GET['shownews'])) {  // если нажата кнопка "Показать следующие 3 новости"
        $NumStr = $_SESSION['$NumStr'];
        $NumStr = $NumStr + 3;
        $_SESSION['$NumStr'] = $NumStr;
        $this->ShowData($DBH, $smarty, $tableName, $NumStr);
    } else {
        $NumStr = 3;
        $_SESSION['$NumStr'] = $NumStr;
        $this->ShowData($DBH, $smarty, $tableName, $NumStr); 
    }
  }

  /**
   * Функция по выводу трех новостей на экран и ссылок на другие страницы
   * @param String $DBH подключение к базе 
   * @param String $tableName имя таблицы в базе
   * @param string $smarty переменная шаблонизатора smarty
   */
  function FewNews($DBH, $tableName, $smarty) {
    $rows = array();
    // выборка данных из таблицы
    $STH = $DBH->query("SELECT id, title, date, LEFT(body,160) FROM $tableName ORDER BY id DESC LIMIT 3");  
    // устанавливаем режим выборки
    $STH->setFetchMode(PDO::FETCH_ASSOC);  
    // Вывод данных из таблицы на экран
    while($row = $STH->fetch()) {  
      $rows[] = $row;
    }
    //отключииться от базы
    $DBH = NULL;
    $smarty->assign("list", $rows);
    $smarty->display("listindex.tpl");
  }

  /**
   * Функция по выводу нескольких новостей на экран из базы
   * @param String $DBH подключение к базе 
   * @param string $smarty переменная шаблонизатора smarty
   * @param String $tableName имя таблицы в базе
   * @param String $NumStr переменная с количесвтом отображаемых новостей на экране
   */
  function ShowData($DBH, $smarty, $tableName, $NumStr) {
    $rows = array();
    // выборка данных из таблицы
    $STH = $DBH->query("SELECT * FROM $tableName LIMIT $NumStr");  
    // устанавливаем режим выборки
    $STH->setFetchMode(PDO::FETCH_ASSOC);  
    // Вывод данных из таблицы на экран
    while($row = $STH->fetch()) {  
      $rows[] = $row;
    }
    foreach ($rows as $row) {
      if (isset($_POST[$row['id']])) {
        $id = $row['id'];
        $_SESSION['id'] = $id;
      }
    }
    //отключииться от базы
    $DBH = NULL;
    $smarty->assign("list", $rows);
    $smarty->display("list.tpl");
  }

  /**
   * Функция по выводу одной новости на экран из базы
   * @param String $DBH подключение к базе 
   * @param string $smarty переменная шаблонизатора smarty
   * @param String $tableName имя таблицы в базе
   * @param String $id переменная с номером новости
   */
  function OneData($DBH, $smarty, $tableName, $id) {
    $rows = array();
    $STH = $DBH->query("SELECT * FROM $tableName WHERE id = $id");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $STH->fetch()) {  
      $rowSelect[] = $row;
    }
	//отключииться от базы
  $DBH = NULL;
  $smarty->assign("list", $rowSelect);
  $smarty->display("showone.tpl");
  }
}  
#$DBH->exec("DROP DATABASE `$dbName`;");
