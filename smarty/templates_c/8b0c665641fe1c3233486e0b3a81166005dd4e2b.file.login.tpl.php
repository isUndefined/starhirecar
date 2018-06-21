<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-16 00:13:12
         compiled from ".\smarty\templates\actions\ActionLogin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4905548f4ed0436b30-87528186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b0c665641fe1c3233486e0b3a81166005dd4e2b' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionLogin\\login.tpl',
      1 => 1418677987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4905548f4ed0436b30-87528186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_548f4ed0516a34_02900123',
  'variables' => 
  array (
    'bIsAuthorized' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f4ed0516a34_02900123')) {function content_548f4ed0516a34_02900123($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
	<div class="col-md-12">
		<h1>Login page</h1>
		<?php if ($_smarty_tpl->tpl_vars['bIsAuthorized']->value) {?>
			<p class="simple-text">User already authorized</p>
		<?php } else { ?>
			<form method="POST" id="form_submit_login" class="form-horizontal">
				<div class="form-group">
					<label for="inputLogin" class="col-md-2 control-label">Login</label>
					<div class="col-md-4">
					  <input type="text" class="form-control" id="inputLogin" name="login">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-md-2 control-label">Password</label>
					<div class="col-md-4">
					  <input type="password" class="form-control" id="inputPassword" name="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
					  <button type="submit" class="btn" name="submit_login" value="Sign in">Sign in</button>
					</div>
				</div>
			</form>
		<?php }?>
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
