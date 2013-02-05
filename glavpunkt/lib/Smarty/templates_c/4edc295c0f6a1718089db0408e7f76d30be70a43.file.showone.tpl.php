<?php /* Smarty version Smarty-3.1.11, created on 2012-12-11 15:59:40
         compiled from ".\templates\showone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1754950c7165a4584a7-96953667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4edc295c0f6a1718089db0408e7f76d30be70a43' => 
    array (
      0 => '.\\templates\\showone.tpl',
      1 => 1355230722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1754950c7165a4584a7-96953667',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50c7165a561917_74844668',
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c7165a561917_74844668')) {function content_50c7165a561917_74844668($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Новость</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<a href="index.php?page=Полный список новостей">Перейти к полному списку новостей</a><br>
<h1>Новость</h1>
  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
    <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
<p>
    <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
  <?php } ?>
  <br>
  <p><a href="index.php?page=Полный+список+новостей&regid=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">Редактировать</a></p></p>
</body>
</html>
<?php }} ?>