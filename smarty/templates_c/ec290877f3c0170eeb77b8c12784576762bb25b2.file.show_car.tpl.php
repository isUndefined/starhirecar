<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 20:49:53
         compiled from ".\smarty\templates\actions\ActionCars\show_car.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292715489fc5a315809-25811600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec290877f3c0170eeb77b8c12784576762bb25b2' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\show_car.tpl',
      1 => 1419184190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292715489fc5a315809-25811600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489fc5a420f62_53193928',
  'variables' => 
  array (
    'aCar' => 0,
    'carExtra' => 0,
    'sImage' => 0,
    'filename' => 0,
    'fileDir' => 0,
    'sName' => 0,
    'nr_img' => 0,
    'tpl_dir' => 0,
    'aUser' => 0,
    'web_path' => 0,
    'carParams' => 0,
    'sParam' => 0,
    'sValue' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489fc5a420f62_53193928')) {function content_5489fc5a420f62_53193928($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="row">
		<div class="col-md-12 car-profile">
			<h1><?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_title'];?>
</h1>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12" id="slider-cars-details">
							<div id="carousel-bounding-box">
								<div id="myCarousel" class="carousel slide">
									<!-- main slider carousel items -->
									<div class="carousel-inner">
									<?php if ($_smarty_tpl->tpl_vars['aCar']->value['car_extra']) {?>
										<?php $_smarty_tpl->tpl_vars["carExtra"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_extra']), null, 0);?>
										<?php if ($_smarty_tpl->tpl_vars['carExtra']->value['slider']) {?>
										<?php $_smarty_tpl->tpl_vars["nr_img"] = new Smarty_variable(0, null, 0);?>
											<?php  $_smarty_tpl->tpl_vars["sImage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sImage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carExtra']->value['slider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sImage"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["sImage"]->key => $_smarty_tpl->tpl_vars["sImage"]->value) {
$_smarty_tpl->tpl_vars["sImage"]->_loop = true;
 $_smarty_tpl->tpl_vars["sImage"]->index++;
 $_smarty_tpl->tpl_vars["sImage"]->first = $_smarty_tpl->tpl_vars["sImage"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["extra_slider"]['first'] = $_smarty_tpl->tpl_vars["sImage"]->first;
?>
												<?php $_smarty_tpl->tpl_vars["filename"] = new Smarty_variable(explode("/",$_smarty_tpl->tpl_vars['sImage']->value), null, 0);?>
												<?php $_smarty_tpl->tpl_vars["fileDir"] = new Smarty_variable('', null, 0);?>
												<?php  $_smarty_tpl->tpl_vars["sName"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sName"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filename']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sName"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["sName"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["sName"]->key => $_smarty_tpl->tpl_vars["sName"]->value) {
$_smarty_tpl->tpl_vars["sName"]->_loop = true;
 $_smarty_tpl->tpl_vars["sName"]->iteration++;
 $_smarty_tpl->tpl_vars["sName"]->last = $_smarty_tpl->tpl_vars["sName"]->iteration === $_smarty_tpl->tpl_vars["sName"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["image"]['last'] = $_smarty_tpl->tpl_vars["sName"]->last;
?>
													<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['image']['last']) {?>
														<?php $_smarty_tpl->tpl_vars["fileDir"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['fileDir']->value).((string)$_smarty_tpl->tpl_vars['sName']->value)."/", null, 0);?>
													<?php }?>
												<?php } ?>
												<div class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['extra_slider']['first']) {?>active <?php }?>item" data-slide-number="<?php echo $_smarty_tpl->tpl_vars['nr_img']->value;?>
">
													<img src="<?php echo $_smarty_tpl->tpl_vars['fileDir']->value;?>
crop_<?php echo end($_smarty_tpl->tpl_vars['filename']->value);?>
" class="img-responsive">
												</div>
											<?php $_smarty_tpl->tpl_vars['nr_img'] = new Smarty_variable($_smarty_tpl->tpl_vars['nr_img']->value+1, null, 0);?>
											<?php } ?>
										<?php } else { ?>
										<div class="active item" data-slide-number="0">
											<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/no_cover.png" class="img-responsive">
										</div>
										<?php }?>
									<?php } else { ?>
										<div class="active item" data-slide-number="0">
											<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/no_cover.png" class="img-responsive">
										</div>
									<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="slider-cars-thumbs">
							<!-- thumb navigation carousel items -->
							
						
							<ul class="list-inline">
								<?php if ($_smarty_tpl->tpl_vars['aCar']->value['car_extra']) {?>
									<?php $_smarty_tpl->tpl_vars["carExtra"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_extra']), null, 0);?>
									<?php if ($_smarty_tpl->tpl_vars['carExtra']->value['slider']) {?>
									<?php $_smarty_tpl->tpl_vars["nr_img"] = new Smarty_variable(0, null, 0);?>
										<?php  $_smarty_tpl->tpl_vars["sImage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sImage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carExtra']->value['slider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sImage"]->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["sImage"]->key => $_smarty_tpl->tpl_vars["sImage"]->value) {
$_smarty_tpl->tpl_vars["sImage"]->_loop = true;
 $_smarty_tpl->tpl_vars["sImage"]->index++;
 $_smarty_tpl->tpl_vars["sImage"]->first = $_smarty_tpl->tpl_vars["sImage"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["extra_slider"]['first'] = $_smarty_tpl->tpl_vars["sImage"]->first;
?>
											<?php $_smarty_tpl->tpl_vars["filename"] = new Smarty_variable(explode("/",$_smarty_tpl->tpl_vars['sImage']->value), null, 0);?>
											<?php $_smarty_tpl->tpl_vars["fileDir"] = new Smarty_variable('', null, 0);?>
											<?php  $_smarty_tpl->tpl_vars["sName"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sName"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filename']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sName"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["sName"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["sName"]->key => $_smarty_tpl->tpl_vars["sName"]->value) {
$_smarty_tpl->tpl_vars["sName"]->_loop = true;
 $_smarty_tpl->tpl_vars["sName"]->iteration++;
 $_smarty_tpl->tpl_vars["sName"]->last = $_smarty_tpl->tpl_vars["sName"]->iteration === $_smarty_tpl->tpl_vars["sName"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["image"]['last'] = $_smarty_tpl->tpl_vars["sName"]->last;
?>
												<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['image']['last']) {?>
													<?php $_smarty_tpl->tpl_vars["fileDir"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['fileDir']->value).((string)$_smarty_tpl->tpl_vars['sName']->value)."/", null, 0);?>
												<?php }?>
											<?php } ?>
											<li> 
												<a id="carousel-selector-<?php echo $_smarty_tpl->tpl_vars['nr_img']->value;?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['extra_slider']['first']) {?>class="selected"<?php }?>>
													<img src="<?php echo $_smarty_tpl->tpl_vars['fileDir']->value;?>
crop_<?php echo end($_smarty_tpl->tpl_vars['filename']->value);?>
" class="img-responsive">
												</a>
											</li>
										<?php $_smarty_tpl->tpl_vars['nr_img'] = new Smarty_variable($_smarty_tpl->tpl_vars['nr_img']->value+1, null, 0);?>
										<?php } ?>
									<?php }?>
								<?php } else { ?>
								
								<li> 
									<a id="carousel-selector-0" class="selected">
										<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/car-details-thumb-4.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-1">
										<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/car-details-thumb-1.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-2">
										<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/car-details-thumb-3.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-3">
										<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/car-details-thumb-2.jpg" class="img-responsive">
									</a>
								</li>
								<?php }?>
							</ul>
							
						</div>
					</div>
				</div>
				<?php echo '<script'; ?>
>
					$(document).ready(function(){
						$('#slider-cars-details #myCarousel').carousel({
							interval: false
						});
						
						// handles the carousel thumbnails
						$('[id^=carousel-selector-]').click( function(){
						  var id_selector = $(this).attr("id");
						  var id = id_selector.substr(id_selector.length -1);
						  id = parseInt(id);
						  $('#slider-cars-details #myCarousel').carousel(id);
						  $('[id^=carousel-selector-]').removeClass('selected');
						  $(this).addClass('selected');
						});

						// when the carousel slides, auto update
						$('#slider-cars-details #myCarousel').on('slid', function (e) {
						  var id = $('.item.active').data('slide-number');
						  id = parseInt(id);
						  $('[id^=carousel-selector-]').removeClass('selected');
						  $('[id=carousel-selector-'+id+']').addClass('selected');
						});
					});
				<?php echo '</script'; ?>
>
				<div class="col-md-6 car-caracteristics">
					<div class="price">
						$<?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_price'];?>
 <span>Price per day</span>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['aUser']->value) {?>
					<div class="drop-actions">
						<a href="#" class="drop-down"><span class="caret"></span></a>
						<div class="content">
							<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/cars/edit/<?php echo $_smarty_tpl->tpl_vars['aCar']->value['id_car'];?>
">Edit</a>
							<a href="#">Delete</a>
						</div>
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['aCar']->value['car_params']) {?>
					<?php $_smarty_tpl->tpl_vars["carParams"] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['aCar']->value['car_params']), null, 0);?>
					<dl>
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
					</dl>
					<?php }?>
					<div class="description">
						<?php echo $_smarty_tpl->tpl_vars['aCar']->value['car_text'];?>

					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="cars-list">
			<h1>others</h1>
			<div class="col-md-6 car-box">	
				<div class="cover">
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/cars_list/c1.jpg" />
				</div>
				<div class="content">
					<h2>BMW Z100</h2>
					<dl>
						<dt>Price per day:</dt>
						<dd><span>$127</span></dd>	
						
						<dt>Engine volume:</dt>
						<dd>1781</dd>	
						
						<dt>Gear box:</dt>
						<dd>manual</dd>	
						
						<dt>Fuel:</dt>
						<dd>petrol</dd>	
					</dl>
				</div>
			</div>
			<div class="col-md-6 car-box">	
				<div class="cover">
					<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/cars_list/c2.jpg" />
				</div>
				<div class="content">
					<h2>Opel Omega</h2>
					<dl>
						<dt>Price per day:</dt>
						<dd><span>$59</span></dd>	
						
						<dt>Engine volume:</dt>
						<dd>2420</dd>	
						
						<dt>Gear box:</dt>
						<dd>automat</dd>	
						
						<dt>Fuel:</dt>
						<dd>petrol</dd>	
					</dl>
				</div>
			</div>
		
		</div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
