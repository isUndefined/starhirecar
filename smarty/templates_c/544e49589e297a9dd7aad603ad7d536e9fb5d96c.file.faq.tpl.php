<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-17 23:41:13
         compiled from ".\smarty\templates\actions\ActionFaq\faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183925489ff42d6b374-60189566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '544e49589e297a9dd7aad603ad7d536e9fb5d96c' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionFaq\\faq.tpl',
      1 => 1418848870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183925489ff42d6b374-60189566',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489ff42dd3d32_99127593',
  'variables' => 
  array (
    'aFaqs' => 0,
    'aFaq' => 0,
    'aUser' => 0,
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489ff42dd3d32_99127593')) {function content_5489ff42dd3d32_99127593($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
>
	$(document).ready(function(){
		$('.faq-title, .faq-collapse').click(function(e){
			e.preventDefault();
			//$('.faq-list li.active').removeAttr('class');
			
			var self = $(this);
			var selfParent = self.parent();
			selfParent.find('.faq-answer').slideToggle(500);
			selfParent.toggleClass('active').toggleClass('show');

			if(selfParent.find('.faq-collapse').text()=="-"){
				selfParent.find('.faq-collapse').text('+');
			} else {
				selfParent.find('.faq-collapse').text('-');
			}
			
		});
		
		
		if(window.location.hash!=""){
			$('a[name="'+window.location.hash.slice(1)+'"]').prev().text('-').parent().addClass('show').addClass('active');
		}
	});
<?php echo '</script'; ?>
>	

<div class="row">
	<div class="col-md-12">
		<h2>F.A.Q.</h2>
		<ul class="faq-list">
		<?php if ($_smarty_tpl->tpl_vars['aFaqs']->value) {?>
			<?php  $_smarty_tpl->tpl_vars["aFaq"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aFaq"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aFaqs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aFaq"]->key => $_smarty_tpl->tpl_vars["aFaq"]->value) {
$_smarty_tpl->tpl_vars["aFaq"]->_loop = true;
?>
				<li>
					<span class="faq-collapse">+</span><a href="#q<?php echo $_smarty_tpl->tpl_vars['aFaq']->value['faq_id'];?>
" class="faq-title" name="q<?php echo $_smarty_tpl->tpl_vars['aFaq']->value['faq_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['aFaq']->value['question'];?>
</a>
					<?php if ($_smarty_tpl->tpl_vars['aUser']->value) {?>
					<div class="drop-actions">
						<a href="#" class="drop-down"><span class="caret"></span></a>
						<div class="content">
							<a href="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/faq/edit/<?php echo $_smarty_tpl->tpl_vars['aFaq']->value['faq_id'];?>
">Edit</a>
							<a href="#">Delete</a>
						</div>
					</div>
					<?php }?>
					<div class="faq-answer">
						<?php echo $_smarty_tpl->tpl_vars['aFaq']->value['answer'];?>

					</div>
				</li>
			<?php } ?>
		<?php }?>
		</ul>
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
