<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-25 14:13:57
         compiled from "W:\home\starhirecar\www\smarty\templates\header.light.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59445489e69668b178-91107759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ddae8cc3d5a6a096dc91b868c5a3d70db300f28' => 
    array (
      0 => 'W:\\home\\starhirecar\\www\\smarty\\templates\\header.light.tpl',
      1 => 1419506035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59445489e69668b178-91107759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489e6966fc463_59610843',
  'variables' => 
  array (
    'page_title' => 0,
    'tpl_dir' => 0,
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489e6966fc463_59610843')) {function content_5489e6966fc463_59610843($_smarty_tpl) {?><HTML>
<HEAD>
    <TITLE><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</TITLE>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/non-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/style.css" />
	
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/jquery-1.11.1.min.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/bootstrap.min.js" ><?php echo '</script'; ?>
>
	
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</HEAD>
<BODY bgcolor="#ffffff">
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="header">
				<div class="logo-block">
					<a href="/"><span>Star</span><strong>Car</strong>Hire</a>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/logo-stars.png" />
				</div>
				<div class="contacts">
					call us at
					<span>1-541-784-2444</span>
				</div>
				<ul class="main-nav">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars">car asortiment</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/faq">FAQ</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/offers">special offers</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/contacts">contacts</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/about">about us</a></li>
				</ul>
				<div class="mustang"></div>
			</div>
		</div>
		<?php }} ?>
