<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-12 23:41:24
         compiled from ".\smarty\templates\actions\ActionOffers\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11412549bf0fa25ed35-62662338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58561501cf52529c407cacc4945b7010599b8504' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionOffers\\index.tpl',
      1 => 1421095205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11412549bf0fa25ed35-62662338',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549bf0fa316e30_22346791',
  'variables' => 
  array (
    'aOffers' => 0,
    'aOffer' => 0,
    'filename' => 0,
    'fileDir' => 0,
    'sName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549bf0fa316e30_22346791')) {function content_549bf0fa316e30_22346791($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
	<div class="col-xs-12">
		<h2>Special offers</h2>
		
		<div class="row">
			<?php if ($_smarty_tpl->tpl_vars['aOffers']->value) {?>
				<?php  $_smarty_tpl->tpl_vars["aOffer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aOffer"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aOffers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aOffer"]->key => $_smarty_tpl->tpl_vars["aOffer"]->value) {
$_smarty_tpl->tpl_vars["aOffer"]->_loop = true;
?>
					<div class="col-xs-6">
						<div class="special-ofers-box">
							<h4><?php echo $_smarty_tpl->tpl_vars['aOffer']->value['title'];?>
</h4>
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
								<div class="img-thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['fileDir']->value;?>
thumb_<?php echo end($_smarty_tpl->tpl_vars['filename']->value);?>
" class="img-responsive">
								</div>
							<?php }?>
							<p><?php echo $_smarty_tpl->tpl_vars['aOffer']->value['short_text'];?>
</p>
							<a href="/offers/<?php echo $_smarty_tpl->tpl_vars['aOffer']->value['link'];?>
.html" class="btn">View Offer Details</a>
						</div>
					</div>
				<?php } ?>
			<?php } else { ?>
				List of offers empty.
			<?php }?>
			
		</div>
	</div>

</div>



<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
