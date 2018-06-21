<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-23 23:10:24
         compiled from ".\smarty\templates\actions\ActionCars\cars_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:277785489f94f6ed658-66142158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd04cda002ebc195aa9c33442a259a7d61a8c2b5d' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\cars_type.tpl',
      1 => 1419365421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277785489f94f6ed658-66142158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489f94f7e55d8_60574998',
  'variables' => 
  array (
    'aCategory' => 0,
    'aUser' => 0,
    'web_path' => 0,
    'aCars' => 0,
    'aCar' => 0,
    'aCarExtra' => 0,
    'aCarSlider' => 0,
    'aCarsSliderImg' => 0,
    'tpl_dir' => 0,
    'carParams' => 0,
    'sParam' => 0,
    'sValue' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489f94f7e55d8_60574998')) {function content_5489f94f7e55d8_60574998($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<div class="row">
	<div class="cars-list">
		<h1><?php echo $_smarty_tpl->tpl_vars['aCategory']->value['category_name'];
if ($_smarty_tpl->tpl_vars['aUser']->value) {?>
		<div class="drop-actions">
			<a href="#" class="drop-down"><span class="caret"></span></a>
			<div class="content">
				<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/category/edit/<?php echo $_smarty_tpl->tpl_vars['aCategory']->value['id_category'];?>
">Edit</a>
				<a href="#">Delete</a>
			</div>
		</div>
		<?php }?></h1>
		
		<div class="col-md-12 simple-text">
			<?php echo nl2br($_smarty_tpl->tpl_vars['aCategory']->value['category_text']);?>

		</div>
		<?php if ($_smarty_tpl->tpl_vars['aCars']->value) {?>
		<?php  $_smarty_tpl->tpl_vars["aCar"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aCar"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aCar"]->key => $_smarty_tpl->tpl_vars["aCar"]->value) {
$_smarty_tpl->tpl_vars["aCar"]->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["aCarExtra"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_extra']), null, 0);?>
		<?php $_smarty_tpl->tpl_vars["aCarSlider"] = new Smarty_variable($_smarty_tpl->tpl_vars['aCarExtra']->value['slider'], null, 0);?>
		<div class="col-md-6 car-box">	
			<div class="cover">
				<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/<?php echo $_smarty_tpl->tpl_vars['aCategory']->value['category_link'];?>
/<?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_link'];?>
.html">
				<?php if ($_smarty_tpl->tpl_vars['aCarSlider']->value) {?>
					<?php $_smarty_tpl->tpl_vars["aCarsSliderImg"] = new Smarty_variable(array_values($_smarty_tpl->tpl_vars['aCarSlider']->value), null, 0);?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['aCarsSliderImg']->value[0];?>
" />
				<?php } else { ?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/no_cover.png" />
				<?php }?>
				<div class="hover"><i class="fa fa-search-plus"></i></div></a>
			</div>
			<div class="content">
				<h2><a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/<?php echo $_smarty_tpl->tpl_vars['aCategory']->value['category_link'];?>
/<?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_link'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_title'];?>
</a></h2>
				<dl>
					<dt>Price per day:</dt>
					<dd><span>$<?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_price'];?>
</span></dd>	
					<?php if ($_smarty_tpl->tpl_vars['aCar']->value['car_params']) {?>
					<?php $_smarty_tpl->tpl_vars["carParams"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_params']), null, 0);?>
						<?php  $_smarty_tpl->tpl_vars["sValue"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sValue"]->_loop = false;
 $_smarty_tpl->tpl_vars["sParam"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['carParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["sValue"]->key => $_smarty_tpl->tpl_vars["sValue"]->value) {
$_smarty_tpl->tpl_vars["sValue"]->_loop = true;
 $_smarty_tpl->tpl_vars["sParam"]->value = $_smarty_tpl->tpl_vars["sValue"]->key;
?>
						<dt><?php echo $_smarty_tpl->tpl_vars['sParam']->value;?>
:</dt>
						<dd><?php echo $_smarty_tpl->tpl_vars['sValue']->value;?>
</dd>		
						<?php } ?>	
					<?php }?>
				</dl>
			</div>
		</div>
		<?php } ?>
		<?php }?>
		
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
