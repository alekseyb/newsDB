<?php
/**
 * Вывод новостей на экран
 */
class ListData {
  private $DBH;
  public function __construct($DBH) {
    $this->DBH = $DBH;
  }
  /**
   * Функция по выводу данных на экран из базы
   * @param String $DBH подключение к базе 
   * @param array $dataform массив с данными
   * @param String $tableName имя таблицы в базе
   * @param string $smarty переменная шаблонизатора smarty
   * @return array список новостей (Выборка всех данных из таблицы БД с выводом 
   * на страницу строк с полями:title,date.)
   */
  public  function allData($dataForm, $tableName, $smarty) {
    if (isset($_GET['newnews'])) { //если нажата кнопка "Опубликовать новость"
      $NewsEdit1 = new EditNews($DBH);
      $NewsEdit1->formInput($dataForm, $tableName, $smarty);
    } elseif (isset($_GET['regid'])) {
        $_SESSION['id1'] = $_GET['regid'];
        $NewsEdit3 = new EditNews($this->DBH);
        $NewsEdit3->formInput($dataForm, $tableName, $smarty);
    } elseif (isset($_GET['showid'])) {
        $id = $_GET['showid'];
        $this->OneData($smarty, $tableName, $id);
    } elseif (isset($_GET['remid'])) {
        $_SESSION['id'] = $_GET['remid'];
        $NewsEdit4 = new EditNews($this->DBH);
        $NewsEdit4->removeData($tableName);
        $NumStr = $_SESSION['$NumStr'];
        $this->ShowData($smarty, $tableName, $NumStr);
    } elseif (isset($_GET['shownews'])) {  // если нажата кнопка "Показать следующие 3 новости"
        $NumStr = $_SESSION['$NumStr'];
        $NumStr = $NumStr + 3;
        $_SESSION['$NumStr'] = $NumStr;
        $this->ShowData($smarty, $tableName, $NumStr);
    } else {
        $NumStr = 3;
        $_SESSION['$NumStr'] = $NumStr;
        $this->ShowData($smarty, $tableName, $NumStr); 
    }
  }

  /**
   * Функция по выводу трех новостей на экран и ссылок на другие страницы
   * @param String $DBH подключение к базе 
   * @param String $tableName имя таблицы в базе
   * @param string $smarty переменная шаблонизатора smarty
   * @return array список новостей (Выборка последних трех строк из таблицы БД с выводом 
   * на страницу строк с полями:title,date.)
   */
  public function fewNews($tableName, $smarty) {
    $rows = array();
    // выборка данных из таблицы
    $STH = $this->DBH->query("SELECT id, title, date, LEFT(body,160) FROM $tableName ORDER BY id DESC LIMIT 3");  
    // устанавливаем режим выборки
    $STH->setFetchMode(PDO::FETCH_ASSOC);  
    // Вывод данных из таблицы на экран
    while($row = $STH->fetch()) {  
      $rows[] = $row;
    }
    //отключииться от базы
    $this->DBH = NULL;
    $smarty->assign("list", $rows);
    $smarty->display("listindex.tpl");
  }

  /**
   * Функция по выводу нескольких новостей на экран из базы
   * @param String $DBH подключение к базе 
   * @param string $smarty переменная шаблонизатора smarty
   * @param String $tableName имя таблицы в базе
   * @param String $NumStr переменная с количесвтом отображаемых новостей на экране
   * @return array список новостей (Выборка определенного количества данных из таблицы БД с выводом 
   * на страницу строк с полями:title,date.)
   */
  private function showData($smarty, $tableName, $NumStr) {
    $rows = array();
    // выборка данных из таблицы
    $STH = $this->DBH->query("SELECT * FROM $tableName LIMIT $NumStr");  
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
    $this->DBH = NULL;
    $smarty->assign("list", $rows);
    $smarty->display("list.tpl");
  }

  /**
   * Функция по выводу одной новости на экран из базы
   * @param String $DBH подключение к базе 
   * @param string $smarty переменная шаблонизатора smarty
   * @param String $tableName имя таблицы в базе
   * @param String $id переменная с номером новости
   * @return array новость (Выборка из таблицы БД одной определенной новости с выводом 
   * на страницу информации с полями:title,date,body.)
   */
  private function oneData($smarty, $tableName, $id) {
    $rows = array();
    $STH = $this->DBH->query("SELECT * FROM $tableName WHERE id = $id");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $STH->fetch()) {  
      $rowSelect[] = $row;
    }
	//отключииться от базы
  $this->DBH = NULL;
  $smarty->assign("list", $rowSelect);
  $smarty->display("showone.tpl");
  }
}  
#$DBH->exec("DROP DATABASE `$dbName`;");
