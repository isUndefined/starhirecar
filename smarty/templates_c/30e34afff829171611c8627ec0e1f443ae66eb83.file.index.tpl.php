<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 20:45:48
         compiled from ".\smarty\templates\actions\ActionCars\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237465489f83c241c05-30294206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30e34afff829171611c8627ec0e1f443ae66eb83' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\index.tpl',
      1 => 1419183946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237465489f83c241c05-30294206',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489f83c3026c1_19285733',
  'variables' => 
  array (
    'aCarGroup' => 0,
    'k' => 0,
    'aGroup' => 0,
    'aCar' => 0,
    'aCarExtra' => 0,
    'web_path' => 0,
    'aCarSlider' => 0,
    'aCarsSliderImg' => 0,
    'tpl_dir' => 0,
    'carParams' => 0,
    'sParam' => 0,
    'sValue' => 0,
    'carCategory' => 0,
    'aCountCategoryCars' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489f83c3026c1_19285733')) {function content_5489f83c3026c1_19285733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<div class="row">
	
		<?php if ($_smarty_tpl->tpl_vars['aCarGroup']->value) {?>
			<?php  $_smarty_tpl->tpl_vars["aGroup"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aGroup"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aCarGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aGroup"]->key => $_smarty_tpl->tpl_vars["aGroup"]->value) {
$_smarty_tpl->tpl_vars["aGroup"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["aGroup"]->key;
?>
			<?php $_smarty_tpl->tpl_vars["carCategory"] = new Smarty_variable("0", null, 0);?>
			<div class="cars-list row">
				<h1><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</h1>
				<?php  $_smarty_tpl->tpl_vars["aCar"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aCar"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aCar"]->key => $_smarty_tpl->tpl_vars["aCar"]->value) {
$_smarty_tpl->tpl_vars["aCar"]->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["aCarExtra"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_extra']), null, 0);?>
				<?php $_smarty_tpl->tpl_vars["aCarSlider"] = new Smarty_variable($_smarty_tpl->tpl_vars['aCarExtra']->value['slider'], null, 0);?>
				<div class="col-md-6 car-box">	
					<div class="cover">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/<?php echo $_smarty_tpl->tpl_vars['aCar']->value['category_link'];?>
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
/cars/<?php echo $_smarty_tpl->tpl_vars['aCar']->value['category_link'];?>
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
				<?php $_smarty_tpl->tpl_vars["carCategory"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['aCar']->value['car_category']), null, 0);?>
				<?php } ?>
				
				<?php if ($_smarty_tpl->tpl_vars['aCountCategoryCars']->value[$_smarty_tpl->tpl_vars['carCategory']->value]&&$_smarty_tpl->tpl_vars['aCountCategoryCars']->value[$_smarty_tpl->tpl_vars['carCategory']->value]>4) {?>
					<div data-category="<?php echo $_smarty_tpl->tpl_vars['carCategory']->value;?>
" class="col-md-12 extend-list"><a href="#" data-start="2" onclick="extendCarsList(this, <?php echo $_smarty_tpl->tpl_vars['carCategory']->value;?>
); return false;">more cars</a></div>
				<?php }?>
			</div>
			<?php } ?>
		<?php }?>
	
	
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	function extendCarsList(obj, iCategory){
		if(iCategory=="") return;
		iStart = $(obj).attr('data-start');
		$(obj).after('<a class="loading"></a>');

		$.ajax({
			type: "POST",
			url: "/cars/loadcarsfromcategory",
			dataType: "json",
			data: { category: iCategory, start: iStart},
			success: function(result){
				console.log(result, parseInt(iStart));
				$('div[data-category="'+iCategory+'"]').before(result.sText);
				if(result.bMore){
					$(obj).attr('data-start', parseInt(iStart)+1 );
				} else {
					$('div[data-category="'+iCategory+'"]').remove();
				}
				$('a.loading').remove();
			}
		});
	}
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
