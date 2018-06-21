<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 20:02:58
         compiled from ".\smarty\templates\actions\ActionCars\ajax.load_cars.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53925496fa7e7547b1-74703915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e30b098310b0d32546126d4b2dd1f160cdc4ad3' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\ajax.load_cars.tpl',
      1 => 1419181375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53925496fa7e7547b1-74703915',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5496fa7e7b0388_52820051',
  'variables' => 
  array (
    'aGetCars' => 0,
    'aCar' => 0,
    'aCarExtra' => 0,
    'web_path' => 0,
    'aCategory' => 0,
    'aCarSlider' => 0,
    'aCarsSliderImg' => 0,
    'tpl_dir' => 0,
    'carParams' => 0,
    'sParam' => 0,
    'sValue' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496fa7e7b0388_52820051')) {function content_5496fa7e7b0388_52820051($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['aGetCars']->value) {?>
	<?php  $_smarty_tpl->tpl_vars["aCar"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aCar"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aGetCars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<?php } else { ?>
no data.
<?php }?><?php }} ?>
