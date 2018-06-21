<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-13 22:04:03
         compiled from ".\smarty\templates\actions\ActionCars\add_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233355499bce2e156f3-32274378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '103fdabc484d20b71c901f8f9d6f3ce8305c83aa' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\add_category.tpl',
      1 => 1419507316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233355499bce2e156f3-32274378',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5499bce3003317_11993427',
  'variables' => 
  array (
    'web_path' => 0,
    'aCategory' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5499bce3003317_11993427')) {function content_5499bce3003317_11993427($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/engine/js/base64.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var now = new Date();
		
		var sec_key = btoa("1amSup3rH3r0C@R");
		$("#form_add_category").prepend(
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
		<?php if (!isset($_smarty_tpl->tpl_vars['action'])) $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['action']->value = "edit") {?>
		<h2>Edit car category #<?php echo $_smarty_tpl->tpl_vars['aCategory']->value['category_name'];?>
</h2>
		<?php } else { ?>
		<h2>Add car category</h2>
		<?php }?>

		<form method="POST" id="form_add_category" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputTitle" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputTitle" name="category_name" value="<?php echo $_POST['category_name'];?>
">
				</div>
			</div>
	
			<div class="form-group">
				<label for="inputLink" class="col-md-2 control-label">Link</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputLink" name="category_link" value="<?php echo $_POST['category_link'];?>
"/>
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputText" class="col-md-2 control-label">Description</label>
				<div class="col-md-5">
				  <textarea class="form-control" id="inputText" name="category_text" rows="4"><?php echo $_POST['category_text'];?>
</textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
				  <button type="submit" class="btn" name="submit_add_category">Submit</button>
				</div>
			</div>
		</form>
	</div>

	
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
