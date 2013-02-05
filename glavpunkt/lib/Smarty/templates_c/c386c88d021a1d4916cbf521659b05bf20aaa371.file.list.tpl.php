<?php /* Smarty version Smarty-3.1.11, created on 2012-12-11 16:34:10
         compiled from ".\templates\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2964250892bee99bff3-05921060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c386c88d021a1d4916cbf521659b05bf20aaa371' => 
    array (
      0 => '.\\templates\\list.tpl',
      1 => 1355230712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2964250892bee99bff3-05921060',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50892beee5b963_03984180',
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50892beee5b963_03984180')) {function content_50892beee5b963_03984180($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Список новостей</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Список новостей</h1>
  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
    <a href="index.php?page=Полный+список+новостей&showid=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
)
    <a href="index.php?page=Полный+список+новостей&remid=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">Удалить новость</a>
    <a href="index.php?page=Полный+список+новостей&regid=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">Редактировать</a></p>
  <?php } ?>
  <br>
  <p><a href="index.php?page=Полный список новостей&shownews=1">Показать следующие 3 новости</a></p>
  <p><a href="index.php?page=Опубликовать новость&newnews=1">Опубликовать новость</a></p>
</body>
</html>
<?php }} ?>