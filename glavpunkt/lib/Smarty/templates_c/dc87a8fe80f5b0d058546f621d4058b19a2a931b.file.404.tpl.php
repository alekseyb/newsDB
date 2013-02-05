<?php /* Smarty version Smarty-3.1.11, created on 2012-12-12 15:55:13
         compiled from ".\templates\404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2730250c87e62030068-13201050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc87a8fe80f5b0d058546f621d4058b19a2a931b' => 
    array (
      0 => '.\\templates\\404.tpl',
      1 => 1355316910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2730250c87e62030068-13201050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50c87e620c1e79_60800323',
  'variables' => 
  array (
    'notUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c87e620c1e79_60800323')) {function content_50c87e620c1e79_60800323($_smarty_tpl) {?><html>
<head>
  <meta charset="utf-8" />
  <title>404 Not Found</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>404 Not Found</h1>
  <p>The requested URL <?php echo $_smarty_tpl->tpl_vars['notUrl']->value;?>
 was not found on this server.</p>
</body>
</html><?php }} ?>