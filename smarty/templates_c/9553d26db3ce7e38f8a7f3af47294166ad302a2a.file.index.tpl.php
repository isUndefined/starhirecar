<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-24 00:09:09
         compiled from ".\smarty\templates\actions\ActionOfers\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238825499cd0b9c0eb3-93895736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9553d26db3ce7e38f8a7f3af47294166ad302a2a' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionOfers\\index.tpl',
      1 => 1419368945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238825499cd0b9c0eb3-93895736',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5499cd0b9fd895_34306716',
  'variables' => 
  array (
    'tpl_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5499cd0b9fd895_34306716')) {function content_5499cd0b9fd895_34306716($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
	<div class="col-xs-12">
		<h2>Special ofers</h2>
		
		<div class="row">
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Enjoy a complimentary upgrade</h4>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/ofers/of1.jpg" />
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<a href="#" class="btn">View Offer Details</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Complimentary third weekend day</h4>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/ofers/of2.jpg" />
					<p>Excepteur sint occaecat cupidatat non proident.</p>
					<a href="#" class="btn">View Offer Details</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Croatia: Carnival competition</h4>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/ofers/of3.jpg" />
					<p>Do you plan to visit Nordic countries this winter?</p>
					<a href="#" class="btn">View Offer Details</a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Nordics: save up to 30%</h4>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/ofers/of4.jpg" />
					<p>By making reservation on this website the discount will automatically calculate.</p>
					<a href="#" class="btn">View Offer Details</a>
				</div>
			</div>
				
		</div>
	</div>

</div>



<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
