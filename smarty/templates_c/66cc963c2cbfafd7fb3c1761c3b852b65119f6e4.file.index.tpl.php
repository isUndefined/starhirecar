<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-27 23:10:43
         compiled from ".\smarty\templates\actions\ActionIndex\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90105489ea7b7f3ef6-05061862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66cc963c2cbfafd7fb3c1761c3b852b65119f6e4' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionIndex\\index.tpl',
      1 => 1419711042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90105489ea7b7f3ef6-05061862',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489ea7b8dd343_15391007',
  'variables' => 
  array (
    'tpl_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489ea7b8dd343_15391007')) {function content_5489ea7b8dd343_15391007($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>

	
		<div class="row">
			<div class="col-md-12"><!--
				<div id="slideOfferts" class="carousel">
					<div class="carousel-inner">
						<div class="active item" data-slide-number="0">
							<div class="content">
								<span>Rent exclusive car for your special occasion!</span>
								<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/level1-sliver-cover.jpg"/>
							</div>
							<div class="footer">
								<span class="short-text">this beauty only</span>
							</div>
							<div class="price">
								$50 <span>day</span>
							</div>
						</div>	
						<div class="item" data-slide-number="1">
							<div class="content">
								<span>Rent exclusive car for your special occasion!</span>
								<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/level1-sliver-cover.jpg"/>
							</div>
							<div class="footer">
								<span class="short-text">this beauty only</span>
							</div>
							<div class="price">
								$50 <span>day</span>
							</div>
						</div>
					</div>
					
					<a class="carousel-control left" href="#slideOfferts" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#slideOfferts" data-slide="next">&rsaquo;</a>
				</div>
				-->
				<div id="slideOfferts" class="carousel slide carousel-fade">
				
				  <div class="carousel-inner">
					<div class="active item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/level1-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$50 <span>day</span>
						</div>
						
					</div>
					<div class="item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/level2-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$150 <span>day</span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/images/level3-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$250 <span>day</span>
						</div>
					</div>
				  </div>
				 
				  <a class="carousel-control left" href="#slideOfferts" data-slide="prev"></a>
				  <a class="carousel-control right" href="#slideOfferts" data-slide="next"></a>
				</div>
			</div>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function(){
				$('#slideOfferts').carousel({
					interval: 5000
				}).bind('slide.bs.carousel', function (e) {
					//$(this).find('.price').hide();
				}).bind('slid.bs.carousel', function (e) {
					//$(this).find('.price').fadeIn();
				});
				
			
			});
		<?php echo '</script'; ?>
>
		<div class="row">
			<div class="col-md-12">
				<h1>welcome</h1>
				
				<p class="simple-text">Welcome to Star Car Hire.  Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.</p>
			</div>
		</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
