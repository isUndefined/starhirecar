<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-13 23:45:27
         compiled from ".\smarty\templates\actions\ActionOffers\show_offer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26418549c0179f30003-55029810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f41f3d750e4d67610c22e7ab4acdc567b082824' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionOffers\\show_offer.tpl',
      1 => 1421181925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26418549c0179f30003-55029810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549c017a07d758_80582755',
  'variables' => 
  array (
    'aOffer' => 0,
    'filename' => 0,
    'fileDir' => 0,
    'sName' => 0,
    'aUser' => 0,
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549c017a07d758_80582755')) {function content_549c017a07d758_80582755($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
	<div class="col-xs-12 special-ofers-box-full">
		<h2>Special offers
		
		</h2>
		<div class="image-preview">
		<?php if ($_smarty_tpl->tpl_vars['aOffer']->value['image']) {?>
			<?php $_smarty_tpl->tpl_vars["filename"] = new Smarty_variable(explode("/",$_smarty_tpl->tpl_vars['aOffer']->value['image']), null, 0);?>
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
			<img src="<?php echo $_smarty_tpl->tpl_vars['fileDir']->value;?>
crop_<?php echo end($_smarty_tpl->tpl_vars['filename']->value);?>
" class="img-responsive">
		<?php }?>
			<h3 <?php if (!$_smarty_tpl->tpl_vars['aOffer']->value['image']) {?>class="no-preview"<?php }?>><?php echo $_smarty_tpl->tpl_vars['aOffer']->value['title'];?>
 
			<?php if ($_smarty_tpl->tpl_vars['aUser']->value) {?>
				<div class="drop-actions">
					<a href="#" class="drop-down"><span class="caret"></span></a>
					<div class="content">
						<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/offers/edit/<?php echo $_smarty_tpl->tpl_vars['aOffer']->value['id_offer'];?>
">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>
				<?php }?>
			</h3>
		</div>
		
		
		<div class="text">
			<?php echo nl2br($_smarty_tpl->tpl_vars['aOffer']->value['full_text']);?>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h2>other offers</h2>
		<div class="row">
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Nordics: save up to 30%</h4>
					<div class="img-thumb">
						<img src="/uploads/offers/thumb_3f5f4f7a0a.jpg" class="img-responsive">
					</div>
					<p>By making reservation on this website the discount will automatically calculate.</p>
					<a href="/offers/nordics-save-up-to-30.html" class="btn">View Offer Details</a>
				</div>
			</div>							
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Enjoy a complimentary upgrade</h4>
					<div class="img-thumb">
						<img src="/uploads/offers/thumb_aec9d3fe8c.jpg" class="img-responsive">
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<a href="/offers/enjoy-a-complimentary-upgrade.html" class="btn">View Offer Details</a>
				</div>
			</div>
		</div>
	</div>
</div>




<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
