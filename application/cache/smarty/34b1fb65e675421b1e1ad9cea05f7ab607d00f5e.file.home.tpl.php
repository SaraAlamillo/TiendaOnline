<?php /* Smarty version Smarty-3.1.16, created on 2015-02-18 01:20:27
         compiled from "application\views\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2602554d23d08d07750-50356795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34b1fb65e675421b1e1ad9cea05f7ab607d00f5e' => 
    array (
      0 => 'application\\views\\home.tpl',
      1 => 1424218826,
      2 => 'file',
    ),
    '2f8e48cf519b94f283095532e0b7015cfed14ff5' => 
    array (
      0 => 'application\\views\\master.tpl',
      1 => 1424195828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2602554d23d08d07750-50356795',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_54d23d08dd2989_81331522',
  'variables' => 
  array (
    'tituloPagina' => 0,
    'categorias' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d23d08dd2989_81331522')) {function content_54d23d08dd2989_81331522($_smarty_tpl) {?><!DOCTYPE html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
        <h1>Tienda Online</h1>
    
    
        <?php echo $_smarty_tpl->tpl_vars['categorias']->value;?>

    
    
    

    <table border="1">
	<tr>
	    <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['catActual']->value;?>
</td>
	</tr>
        <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
            <tr>
		<td><img src="<?php echo $_smarty_tpl->tpl_vars['imagenesDir']->value;?>
/productos/<?php echo $_smarty_tpl->tpl_vars['producto']->value->imagen;?>
" width="100px" /></td>
		<td>
		    <?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
 <br />
		    Precio: 
		    <?php if ($_smarty_tpl->tpl_vars['producto']->value->descuento!=0) {?>
		<strike><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</strike> <b><?php echo $_smarty_tpl->tpl_vars['producto']->value->descuento;?>
</b>
		<?php } else { ?>
		    <?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
 
		<?php }?>
	    €
	</td>
    </tr>
<?php } ?>
</table>



    <p>Sara Alamillo Arroyo</p>
    <p>Desarrollo Web en Entorno Servidor</p>
			
</body>
</html><?php }} ?>
