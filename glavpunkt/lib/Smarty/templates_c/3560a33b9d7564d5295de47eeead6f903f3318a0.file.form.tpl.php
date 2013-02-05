<?php /* Smarty version Smarty-3.1.11, created on 2012-12-12 16:04:00
         compiled from ".\templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1720550892beb2e0568-57238545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3560a33b9d7564d5295de47eeead6f903f3318a0' => 
    array (
      0 => '.\\templates\\form.tpl',
      1 => 1355317434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1720550892beb2e0568-57238545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50892bebf2a809_24172977',
  'variables' => 
  array (
    'formErrors' => 0,
    'error' => 0,
    'url' => 0,
    'title' => 0,
    'date' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50892bebf2a809_24172977')) {function content_50892bebf2a809_24172977($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Добавление/изменение новостей</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Добавление/изменение новостей</h1>
<form action="index.php?page=Опубликовать новость" method="post">
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formErrors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
<p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php } ?>
 <p class="brown">Ссылка на статью: <input type="text" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p class="blue">Заголовок статьи: <input type="text" name="title" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p id="c1">Дата новости: <input type="text" name="date" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['date']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p>Текст новости: <textarea rows="10" cols="45" name="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea></p>
 <p><input type="submit" name="submit1" value="Сохранить" /> 
	<input type="submit" name="submit2" value="Отменить" /></p>
</form>
</body>
</html>
<?php }} ?>