<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-11 21:46:45
         compiled from ".\smarty\templates\actions\ActionAbout\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155695489e69591c667-40682400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c68668de011d7232f9d04bb8ac7a7ffe81ec2cf' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionAbout\\index.tpl',
      1 => 1418323057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155695489e69591c667-40682400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489e6959939f4_07051725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489e6959939f4_07051725')) {function content_5489e6959939f4_07051725($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="row">
	<div class="col-md-12">
		<h2>About us</h2>
		<p class="simple-text sm">
		Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.
		</p>
		<ul class="about-list">
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/about/user1.jpg" />
				<h6>Alexandr Petrovich</h6>
				<span>CEO</span>
			</li>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/about/user2.jpg" />
				<h6>Victor Genadievich</h6>
				<span>manager</span>
			</li>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/about/user3.jpg" />
				<h6>Larisa Ivanova</h6>
				<span>manager</span>
			</li>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/about/user4.jpg" />
				<h6>Shubelt Ibrahim</h6>
				<span>manager</span>
			</li>
		</ul>
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
