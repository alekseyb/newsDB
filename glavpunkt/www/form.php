<?php
/**
  * Работа с новостями. Включает в себя методы для создания, редактирования и удаления новостей.
  */
class EditNews {
  
  /**
  * Функция по вводу данных в форму
  * @param String $DBH подключение к базе 
  * @param array $dataform массив с данными
  * @param String $tableName имя таблицы в базе
  * @param string $smarty переменная шаблонизатора smarty
  */
  function formInput($DBH, $dataForm, $tableName, $smarty) {
    $urlSite = "http://".$_SERVER['HTTP_HOST']."/index.php?page=Полный список новостей";
    // массив с информацией об ошибке
    $formErrors = array();
    //вспомогательная переменная для вывода ошибки на экран
    $formError = NULL;
    $rows = array();
    $rowSelect = array();
    $formInput=1;
  
    /**
      // выборка данных из таблицы
      $STH = $DBH->query("SELECT * FROM $tableName");  
      // устанавливаем режим выборки
      $STH->setFetchMode(PDO::FETCH_ASSOC);  
      // Вывод данных из таблицы на экран
      while ($row = $STH->fetch()) {  
        $rows[] = $row;
      }

      foreach ($rows as $row) {
       if (isset($_POST[$row['id']])) {
         $id = $row['id'];
         $_SESSION['id'] = $id;
       }
      }
    */  
    
    if (isset($_SESSION['id1']) && $_SESSION['id1'] <> 0) {
      $id = $_SESSION['id1'];
      $_SESSION['id'] = $_SESSION['id1'];
       unset($_SESSION['id1']);
    }
    if (isset($id)) {
      $STH = $DBH->query("SELECT * FROM $tableName WHERE id = $id");
	  $STH->setFetchMode(PDO::FETCH_ASSOC);
	  while ($row = $STH->fetch()) {  
        $rowSelect[] = $row;
      }
	  foreach ($rowSelect as $row) {
	    $dataForm['url'] = $row['url'];
	    $dataForm['title'] = $row['title'];
	    $dataForm['date'] = $row['date'];
	    $dataForm['text'] = $row['body'];
	  }
    } elseif (isset($_POST['submit1']) && isset($_SESSION['id'])) {  //если нажата кнопка сохранить при редактировании новости
        $dataForm['url'] = $_POST['url'];
        $dataForm['title'] = $_POST['title'];
        $dataForm['date'] = $_POST['date'];
        $dataForm['text'] = $_POST['text'];
	    //условие по которому проверяется была ли нажата кнопка "Сохранить" в форме
        if ($_POST['submit1'] == 'Сохранить') {
	      if ($_SESSION['id'] == 0) {
	        $formError = 1;
            $formErrors[] = "Вы не выбрали новость для изменения";
	      // условие по которому проверяется были ли введены данные в поля имя и емэил
          } elseif ($_POST['url'] == "http://" OR $_POST['url'] == "" && empty($_POST['title'])) {
              $formError = 1;
              $formErrors[] = "Вы не заполнили ссылку на новость и заголовок";
	      // условие по которому определяется были ли внесены данные в поле имя
          } elseif ($_POST['url'] == "http://" OR $_POST['url'] == "") {
              $formError = 1;
              $formErrors[] = "Вы не заполнили ссылку на новость";
	      // условие по которому определяется были ли внесены данные в поле емэил
          } elseif (empty($_POST['title'])) {
              $formError = 1;
	          $formErrors[] = "Вы не заполнили заголовок";
          } elseif (!empty($_POST['url']) && !empty($_POST['title'])) {
              $formInput=0;
	          $this->modifyData ($DBH, $dataForm, $tableName);
            header('Location: '.$urlSite);
            session_destroy();
	      }
	    }
    } elseif (isset($_POST['submit2'])) { //если нажата кнопка отменить
        header('Location: '.$urlSite);
        session_destroy();
  /*
    if ($_SESSION['id'] == 0) {
	  $dataForm['url'] = "http://";
      $dataForm['title'] = "";
      $dataForm['date'] = date('Y\-m\-d');
      $dataForm['text'] = "";
	  $formError = 1;
      $formErrors[] = "Вы не выбрали новость для удаления";
	} else {
      $this->removeData($DBH, $tableName);
	  $formInput=0;
	  echo "Новость удалена";
	   session_destroy();  
	}
	*/
	
  	} elseif (isset($_POST['submit1']) && !isset($_SESSION['id'])) {  //если нажата кнопка сохранить при добавлении новой новости
        $dataForm['url'] = $_POST['url'];
        $dataForm['title'] = $_POST['title'];
        $dataForm['date'] = $_POST['date'];
        $dataForm['text'] = $_POST['text'];
	    //условие по которому проверяется была ли нажата кнопка "Отправить" в форме
        if ($_POST['submit1'] == 'Сохранить') {
          // условие по которому проверяется были ли введены данные в поля имя и емэил
          if ($_POST['url'] == "http://" OR $_POST['url'] == "" && empty($_POST['title'])) {
            $formError = 1;
            $formErrors[] = "Вы не заполнили ссылку на новость и заголовок";
	      // условие по которому определяется были ли внесены данные в поле имя
          } elseif ($_POST['url'] == "http://" OR $_POST['url'] == "") {
              $formError = 1;
              $formErrors[] = "Вы не заполнили ссылку на новость";
	      // условие по которому определяется были ли внесены данные в поле емэил
          } elseif (empty($_POST['title'])) {
              $formError = 1;
	          $formErrors[] = "Вы не заполнили заголовок";
          } elseif (!empty($_POST['url']) && !empty($_POST['title'])) {
              $formInput=0;
	          $this->addData($DBH, $dataForm, $tableName);
              header('Location: '.$urlSite);
              session_destroy();
	      }
        }
    } else {
        $dataForm['url'] = "http://";
        $dataForm['title'] = "";
        $dataForm['date'] = date('Y\-m\-d');
        $dataForm['text'] = "";
    }
    if ($formInput == 1) {
      extract($dataForm, EXTR_SKIP);
      $smarty->assign("formErrors", $formErrors);
	  $smarty->assign("url", $url);
      $smarty->assign("title", $title);
      $smarty->assign("date", $date);
      $smarty->assign("text", $text);
	  $smarty->assign("list", $rows);
	  $smarty->display("form.tpl");
    }
  }

  /**
   * Функция по добавлению записей в базу данных
   * @param String $DBH подключение к базе 
   * @param array $dataform массив с данными
   * @param String $tableName имя таблицы в базе
   *
   *
  */
  function addData($DBH, $dataForm, $tableName) {
    extract($dataForm, EXTR_SKIP);
    // операция вставки данных в таблицу(подготовка)
    $sql = "INSERT INTO $tableName (id, url, title, date, body, create_date, modify_date) 
                                VALUES (:id, :url, :title, :date, :body, NOW(), NOW())";
    //подготовка шаблона для вставки в таблицу
    $STH = $DBH->prepare($sql);
    // вставка данных в таблицу
    $STH->execute(array(':id'=>NULL,
                        ':url'=>$url,
                        ':title'=>$title,
                        ':date'=>$date,
                        ':body'=>$text));
    //отключииться от базы
    $DBH = NULL;
  }

  /**
   * Функция по внесению изменений в записи БД
   * @param String $DBH подключение к базе 
   * @param array $dataform массив с данными
   * @param String $tableName имя таблицы в базе
   */
  function modifyData ($DBH, $dataForm, $tableName) {
    $id = $_SESSION['id'];
    extract($dataForm, EXTR_SKIP);
    // операция вставки данных в таблицу(подготовка)
    $sql = "UPDATE $tableName SET url=:url, title=:title, date=:date, body=:body, modify_date=NOW() WHERE id = $id";
    //подготовка шаблона для вставки в таблицу
    $STH = $DBH->prepare($sql);
    // вставка данных в таблицу
    $STH->execute(array(':url'=>$url,
                        ':title'=>$title,
                        ':date'=>$date,
                        ':body'=>$text));
    //отключииться от базы
    $DBH = NULL;
    $_SESSION['id'] = NULL;
  }

  /**
   * Функция по удалению записи в таблице
   * @param String $DBH подключение к базе 
   * @param String $tableName имя таблицы в базе
   */
  function removeData ($DBH, $tableName) {
    $id = $_SESSION['id'];
    // операция удаления данных из таблицы(подготовка)
    $sql = "Delete From $tableName WHERE id = $id";
    //подготовка шаблона для удаления из таблицы
    $STH = $DBH->exec($sql);
    //отключииться от базы
    $DBH = NULL;
    $_SESSION['id'] = NULL;
  }
}