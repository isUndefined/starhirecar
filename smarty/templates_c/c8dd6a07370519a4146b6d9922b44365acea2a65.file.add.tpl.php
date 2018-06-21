<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-14 00:30:41
         compiled from ".\smarty\templates\actions\ActionOffers\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17213549bf0fe814660-20305224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8dd6a07370519a4146b6d9922b44365acea2a65' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionOffers\\add.tpl',
      1 => 1421184640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17213549bf0fe814660-20305224',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549bf0fe8e4060_53796419',
  'variables' => 
  array (
    'web_path' => 0,
    'tpl_dir' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549bf0fe8e4060_53796419')) {function content_549bf0fe8e4060_53796419($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/engine/js/base64.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/imperavi.css">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/imperavi.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var now = new Date();
		
		var sec_key = btoa("1amSup3rH3r0C@R");
		$("#form_add_offer").prepend(
			$("<input>",{
				"type": "hidden",
				"name": "security_key",
				"value": sec_key
			})
		);
		
		$('#offer_full_text').redactor({
			focus: true,
			formattingTags: ['h4', 'h5', 'h6'],
			buttons: ['formatting', '|', 'bold', 'italic', 'deleted', '|', 
			'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 
			'image', 'link', 'alignment', '|',
			'html'],
			emptyHtml: '',
			minHeight: 200,
		});
		
		$(document).on('click', '.action-remove', function (e) {
			e.preventDefault();
			
			// Window confirm
			if(!confirm('Are you sure?')) return false;
			
			var self = $(this);
			var img = '<?php echo $_POST['image'];?>
';
			$.ajax({
				type: "POST",
				url: "/image/removeimage",
				dataType: "json",
				data: { image: img, params: ['crop','thumb'] },
				success: function(msg){
					if(!msg.error){
						$('.img-thumb').remove();
					}
				}
			});
		
		});
	});
	
<?php echo '</script'; ?>
>
<div class="row">
	<div class="col-xs-12">
		<?php if ($_smarty_tpl->tpl_vars['action']->value=="edit") {?>
			<h2>Edit special offer #<?php echo $_POST['offer_name'];?>
</h2>
		<?php } else { ?>
			<h2>Add special offer</h2>
		<?php }?>
		
		<form method="POST" id="form_add_offer" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputTitle" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputTitle" name="offer_name" value="<?php echo $_POST['offer_name'];?>
">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Short text</label>
				<div class="col-md-7">
				  <textarea class="form-control" id="" name="offer_short_text" rows="3"><?php echo $_POST['offer_short_text'];?>
</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Full text</label>
				<div class="col-md-7">
				  <textarea class="form-control" id="offer_full_text" name="offer_full_text" rows="10" style="height: 200px"><?php echo nl2br($_POST['offer_full_text']);?>
</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Image preview</label>
				<div class="col-md-7">
					<?php if ($_POST['image']) {?>
					<p class="img-thumb">
						<img src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/<?php echo $_POST['image'];?>
" style=""/>
						<a href="#" class="action-remove"><i class="fa fa-remove"></i></a>						
						<input type="hidden" name="image_exist" value="true"/>
					</p>
					<p class="img-thumb-notie">If preview image not removed, new image could not be uploaded.</p>
					<?php }?>
					<input type="file" name="image_file" class="form-control"/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Add offer to slider
					</label>
				  </div>
				</div>
			</div>
			
			<input type="hidden" name="upload_dir" value="offers/" />
			<input type="hidden" name="personal_height" value="650" />
			<input type="hidden" name="personal_width" value="1140" />
			<input type="hidden" name="thumb_square_size" value="300" />
			<br/>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
				  <button type="submit" class="btn" name="submit_add_offer">Submit</button>
				</div>
			</div>
		</form>
	
	</div>

</div>



<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
