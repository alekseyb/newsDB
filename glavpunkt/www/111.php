<?php
class Coor {
// данные (свойства):
var $name;

function Getname() {
 echo $this->name;
 }
 
 function Setname($name) {
 $this->name = $name;
 $this->Getname();
 }

}
session_start();
// Создаем объект класса Coor:
#$object = new Coor;
// Теперь для изменения имени используем метод Setname():
#$object->Setname("Nick");
$id = "SESSION";
$_SESSION['id'] = $id;
if (isset($_SESSION['id'])) {
echo "HELO";
}

