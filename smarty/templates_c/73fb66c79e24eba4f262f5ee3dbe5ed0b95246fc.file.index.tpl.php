<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-11 21:46:46
         compiled from ".\smarty\templates\actions\ActionError\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142355489e6965eac01-73767204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73fb66c79e24eba4f262f5ee3dbe5ed0b95246fc' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionError\\index.tpl',
      1 => 1417364116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142355489e6965eac01-73767204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iError' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489e69667a4d5_42639885',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489e69667a4d5_42639885')) {function content_5489e69667a4d5_42639885($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.light.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="row">
		<div class="col-md-12 text-center page-error">
			<p class="error-code"><?php echo $_smarty_tpl->tpl_vars['iError']->value;?>
</p>
			<p class="error-text">error , page not found</p>
		</div>
	</div>
	
	
<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
