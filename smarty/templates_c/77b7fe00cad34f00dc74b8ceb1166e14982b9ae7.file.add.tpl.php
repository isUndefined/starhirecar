<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-15 23:25:58
         compiled from ".\smarty\templates\actions\ActionFaq\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21981548f2b2cab8f90-60467739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77b7fe00cad34f00dc74b8ceb1166e14982b9ae7' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionFaq\\add.tpl',
      1 => 1418675148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21981548f2b2cab8f90-60467739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_548f2b2ccb8159_59784095',
  'variables' => 
  array (
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f2b2ccb8159_59784095')) {function content_548f2b2ccb8159_59784095($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/engine/js/base64.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var now = new Date();
		
		var sec_key = btoa("1amSup3rH3r0C@R");
		$("#form_add_faq").prepend(
			$("<input>",{
				"type": "hidden",
				"name": "security_key",
				"value": sec_key
			})
		);
		
	});
<?php echo '</script'; ?>
>

<div class="row">
	<div class="col-md-12">
		<h1>Add answer and question</h1>
		<form method="POST" id="form_add_faq" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputQuestion" class="col-md-2 control-label">Question</label>
				<div class="col-md-5">
				  <input type="text" class="form-control" id="inputQuestion" name="question" value="<?php echo $_POST['question'];?>
">
				</div>
			</div>
			<div class="form-group">
				<label for="inputAnswer" class="col-md-2 control-label">Answer</label>
				<div class="col-md-8">
				  <textarea class="form-control" id="inputAnswer" name="answer" rows="5"><?php echo $_POST['answer'];?>
</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
				  <button type="submit" class="btn" name="submit_add_faq">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
