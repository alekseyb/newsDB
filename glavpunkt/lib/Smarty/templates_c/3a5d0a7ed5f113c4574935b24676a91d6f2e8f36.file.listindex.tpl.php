<?php /* Smarty version Smarty-3.1.11, created on 2012-12-12 15:36:20
         compiled from ".\templates\listindex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:817350bf3885927529-63421068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a5d0a7ed5f113c4574935b24676a91d6f2e8f36' => 
    array (
      0 => '.\\templates\\listindex.tpl',
      1 => 1355315754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '817350bf3885927529-63421068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50bf3885a65da6_15020451',
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bf3885a65da6_15020451')) {function content_50bf3885a65da6_15020451($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Последние новости</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Последние новости</h1>
  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
    <p colspan="3" style="font-size: 100%; font-family: sans-serif">
	  <a href="index.php?page=Полный+список+новостей&showid=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['date'], ENT_QUOTES, 'UTF-8', true);?>
)<br>
	  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['LEFT(body,160)'], ENT_QUOTES, 'UTF-8', true);?>
...</p>
  <?php } ?>
  <p><a href="index.php?page=Полный список новостей">Перейти к полному списку новостей</a></p>
  <p><a href="index.php?page=Опубликовать новость">Опубликовать новость</a></p>
</body>
</html>
<?php }} ?>