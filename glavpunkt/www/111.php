<?php
class Coor {
// ������ (��������):
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
// ������� ������ ������ Coor:
#$object = new Coor;
// ������ ��� ��������� ����� ���������� ����� Setname():
#$object->Setname("Nick");
$id = "SESSION";
$_SESSION['id'] = $id;
if (isset($_SESSION['id'])) {
echo "HELO";
}

