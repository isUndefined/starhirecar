<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-11 21:46:45
         compiled from "W:\home\starhirecar\www\smarty\templates\system_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169515489e695ac3f05-93830439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a5325ae79545a785bb8be22eaf167f3b6f5882' => 
    array (
      0 => 'W:\\home\\starhirecar\\www\\smarty\\templates\\system_message.tpl',
      1 => 1418068351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169515489e695ac3f05-93830439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'noShowSystemMessage' => 0,
    'aMsgError' => 0,
    'aMsg' => 0,
    'aMsgNotice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489e695b47f42_26233374',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489e695b47f42_26233374')) {function content_5489e695b47f42_26233374($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['noShowSystemMessage']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['aMsgError']->value) {?>
		<ul class="system-message-error">
			<?php  $_smarty_tpl->tpl_vars['aMsg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aMsg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMsgError']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aMsg']->key => $_smarty_tpl->tpl_vars['aMsg']->value) {
$_smarty_tpl->tpl_vars['aMsg']->_loop = true;
?>
				<li>
					<?php if ($_smarty_tpl->tpl_vars['aMsg']->value['title']!='') {?>
						<strong><?php echo $_smarty_tpl->tpl_vars['aMsg']->value['title'];?>
</strong>:
					<?php }?>
					<?php echo $_smarty_tpl->tpl_vars['aMsg']->value['msg'];?>

				</li>
			<?php } ?>
		</ul>
	<?php }?>


	<?php if ($_smarty_tpl->tpl_vars['aMsgNotice']->value) {?>
		<ul class="system-message-notice">
			<?php  $_smarty_tpl->tpl_vars['aMsg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aMsg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aMsgNotice']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aMsg']->key => $_smarty_tpl->tpl_vars['aMsg']->value) {
$_smarty_tpl->tpl_vars['aMsg']->_loop = true;
?>
				<li>
					<?php if ($_smarty_tpl->tpl_vars['aMsg']->value['title']!='') {?>
						<strong><?php echo $_smarty_tpl->tpl_vars['aMsg']->value['title'];?>
</strong>:
					<?php }?>
					<?php echo $_smarty_tpl->tpl_vars['aMsg']->value['msg'];?>

				</li>
			<?php } ?>
		</ul>
	<?php }?>
<?php }?><?php }} ?>
