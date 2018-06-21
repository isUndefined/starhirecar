<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-25 14:07:24
         compiled from ".\smarty\templates\actions\ActionOfers\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32299549bea84215269-57717327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b050d2ff61b214ec64e20f717d03e2b5e23c9a10' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionOfers\\add.tpl',
      1 => 1419505643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32299549bea84215269-57717327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549bea842d6059_08500704',
  'variables' => 
  array (
    'web_path' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549bea842d6059_08500704')) {function content_549bea842d6059_08500704($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/engine/js/base64.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var now = new Date();
		
		var sec_key = btoa("1amSup3rH3r0C@R");
		$("#form_add_car").prepend(
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
	<div class="col-xs-12">
		<h2>Add special ofert</h2>
		
		<form method="POST" id="form_add_car" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputTitle" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputTitle" name="ofert_name" value="<?php echo $_POST['ofert_name'];?>
">
				</div>
			</div>
			<div class="form-group">
				<label for="inputLink" class="col-md-2 control-label">Link</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputLink" name="ofert_link" value="<?php echo $_POST['ofert_link'];?>
">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Short text</label>
				<div class="col-md-5">
				  <textarea class="form-control" id="" name="ofert_short_text" rows="3"><?php echo $_POST['ofert_short_text'];?>
</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Full text</label>
				<div class="col-md-5">
				  <textarea class="form-control" id="" name="ofert_full_text" rows="6"><?php echo $_POST['ofert_full_text'];?>
</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Image preview</label>
				<div class="col-md-5">
					<input type="file" name="ofert_preview" class="form-control"/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
				  <button type="submit" class="btn" name="submit_add_ofert">Submit</button>
				</div>
			</div>
		</form>
	
	</div>

</div>



<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
