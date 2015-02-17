<?php /* Smarty version Smarty-3.1.16, created on 2015-02-17 18:29:15
         compiled from "application\views\master.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3068154e2fe9f7c9089-04047275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f8e48cf519b94f283095532e0b7015cfed14ff5' => 
    array (
      0 => 'application\\views\\master.tpl',
      1 => 1424194154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3068154e2fe9f7c9089-04047275',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_54e2fe9f882fc6_34826838',
  'variables' => 
  array (
    'tituloPagina' => 0,
    'categorias' => 0,
    'productos' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e2fe9f882fc6_34826838')) {function content_54e2fe9f882fc6_34826838($_smarty_tpl) {?><!DOCTYPE html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</title>
</head>
<body>
    
	<h1>Tienda Online</h1>
    
    
	<?php echo $_smarty_tpl->tpl_vars['categorias']->value;?>

    
    
	<ol>
	<?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
	    <li><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</li>
	<?php } ?>
	</ol>
    
    
	<p>Sara Alamillo Arroyo</p>
	<p>Desarrollo Web en Entorno Servidor</p>
    			
</body>
</html><?php }} ?>
