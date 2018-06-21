<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-13 22:03:18
         compiled from "W:\home\starhirecar\www\smarty\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172065489e69599f0d6-76111721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f744149d992d16cc28bc913a77dc3c11c052ba69' => 
    array (
      0 => 'W:\\home\\starhirecar\\www\\smarty\\templates\\header.tpl',
      1 => 1421175798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172065489e69599f0d6-76111721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489e695ab8ec9_94683183',
  'variables' => 
  array (
    'page_title' => 0,
    'tpl_dir' => 0,
    'aUser' => 0,
    'web_path' => 0,
    'bShowCarsCategory' => 0,
    'selectedCarType' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489e695ab8ec9_94683183')) {function content_5489e695ab8ec9_94683183($_smarty_tpl) {?><HTML>
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
/css/font-awesome.css" />
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
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/alert.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/button.js" ><?php echo '</script'; ?>
>
	<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/carousel.js" ><?php echo '</script'; ?>
>-->
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/collapse.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/dropdown.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/modal.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/popover.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/scrollspy.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/tab.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/tooltip.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/libs/transition.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/template.js" ><?php echo '</script'; ?>
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
		<?php if ($_smarty_tpl->tpl_vars['aUser']->value) {?>
		<div class="control-userpanel">
			<a href="#" class="lever"><i class="fa fa-gear"></i></a>
			<div class="menu">
				<p>Hello, admin!</p>
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/add">Add car</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/offers/add">Add offer</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/faq/add">Add FAQ</a></li>
				</ul>
			</div>
		</div>
		<?php }?>
		<div class="row">
			<div class="col-xs-12" id="header">
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
		<?php if (!$_smarty_tpl->tpl_vars['bShowCarsCategory']->value) {?>
		<div class="row">
			<div class="col-xs-3">
				<div class="carsTypeList <?php if (isset($_smarty_tpl->tpl_vars['selectedCarType']->value)&&$_smarty_tpl->tpl_vars['selectedCarType']->value=='sport') {?>active<?php }?>">
					<div class="header-block">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/sport">Sports</a>
					</div>
					<div class="list-image">
						<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/list-cars-sport.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList <?php if (isset($_smarty_tpl->tpl_vars['selectedCarType']->value)&&$_smarty_tpl->tpl_vars['selectedCarType']->value=='luxury') {?>active<?php }?>">
					<div class="header-block">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/luxury">Luxury</a>
					</div>
					<div class="list-image">
						<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/list-cars-luxury.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList <?php if (isset($_smarty_tpl->tpl_vars['selectedCarType']->value)&&$_smarty_tpl->tpl_vars['selectedCarType']->value=='multi-purpose-vehicle') {?>active<?php }?>">
					<div class="header-block">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/multi-purpose-vehicle">Multi-purpose vehicle</a>
					</div>
					<div class="list-image">
						<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/list-cars-multi.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList <?php if (isset($_smarty_tpl->tpl_vars['selectedCarType']->value)&&$_smarty_tpl->tpl_vars['selectedCarType']->value=='city-car') {?>active<?php }?>">
					<div class="header-block">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/city-car">City car</a>
					</div>
					<div class="list-image">
						<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/list-cars-city.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
		<?php $_smarty_tpl->tpl_vars["noShowSystemMessage"] = new Smarty_variable(false, null, 0);?>
	
		<?php echo $_smarty_tpl->getSubTemplate ("./system_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
