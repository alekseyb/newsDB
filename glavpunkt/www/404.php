<?php
function pageNotFound($smarty) {
  $notUrl = $_SERVER['REQUEST_URI'];
  $smarty->assign("notUrl", $notUrl);
  $smarty->display("404.tpl");
}