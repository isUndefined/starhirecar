<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 21:48:29
         compiled from ".\smarty\templates\actions\ActionCars\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28266548f51339187c3-23228200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd37536cf6e9e3e617a8c0cba5ba87c9caa4c4256' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionCars\\add.tpl',
      1 => 1419187708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28266548f51339187c3-23228200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_548f5133a8aec9_02815229',
  'variables' => 
  array (
    'web_path' => 0,
    'tpl_dir' => 0,
    'aCategories' => 0,
    'aCategory' => 0,
    'sCarImg' => 0,
    'k' => 0,
    'filename' => 0,
    'fileDir' => 0,
    'sName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f5133a8aec9_02815229')) {function content_548f5133a8aec9_02815229($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
/engine/js/base64.js"><?php echo '</script'; ?>
>

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/css/uploader/jquery.fileupload.css">
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/uploader/vendor/jquery.ui.widget.js"><?php echo '</script'; ?>
>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/uploader/jquery.iframe-transport.js"><?php echo '</script'; ?>
>
<!-- The basic File Upload plugin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['tpl_dir']->value;?>
/js/uploader/jquery.fileupload.js"><?php echo '</script'; ?>
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
		$(document).on('click', '.action-remove', function (e) {
			e.preventDefault();
			var self = $(this);
			var parentId = self.parent().attr('id');
			var img = $('input[name="car_images['+parentId+']"]').val();
			$.ajax({
				type: "POST",
				url: "/image/removeimage",
				dataType: "json",
				data: { image: img, params: ['crop','thumb'] },
				success: function(msg){
					if(!msg.error){
						self.parent().remove();
						$('input[name="car_images['+parentId+']"]').remove();
					}
				}
			});
		
		});

    // Change this to the location of your server-side upload handler:
    var url = '/image';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
			var uniqId = (new Date()).getTime();
			$('#files').append(
				$('<div/>',{
					'class': 'car-thumb',
					'id' : uniqId,
					html: '<img src="'+ data.result.img_thumb_src +'"/> <a href="#" class="action-remove"><i class="fa fa-remove"></i></a>'
				})
			);
			iCount = $('input[name^="car_images"]').length;
			$('#form_add_car').append('<input type="hidden" name="car_images['+ uniqId +']" value="'+ data.result.img_origin_src +'"/>')
			setTimeout(function() {
				$('#progress .progress-bar').css('width',0);
			}, 1500);
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
			
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
<?php echo '</script'; ?>
>
<?php echo '</script'; ?>
>
<div class="row">
	<div class="col-md-12">
		<h1>Add car</h1>

		<form method="POST" id="form_add_car" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="id_car" value="<?php echo $_POST['id_car'];?>
" />
					<div class="form-group">
						<label for="inputTitle" class="col-md-2 control-label">Title</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputTitle" name="car_title" value="<?php echo $_POST['car_title'];?>
">
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputCateg" class="col-md-2 control-label">Category</label>
						<div class="col-md-4">
							<select name="car_category" class="form-control" id="inputCateg">
								<option value="">Select one</option>
								<?php if ($_smarty_tpl->tpl_vars['aCategories']->value) {?>
									<?php  $_smarty_tpl->tpl_vars["aCategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aCategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aCategory"]->key => $_smarty_tpl->tpl_vars["aCategory"]->value) {
$_smarty_tpl->tpl_vars["aCategory"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['aCategory']->value['id_category'];?>
" <?php if ($_POST['car_category']==$_smarty_tpl->tpl_vars['aCategory']->value['id_category']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['aCategory']->value['category_name'];?>
</option>
									<?php } ?>
								<?php }?>
							</select>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputLink" class="col-md-2 control-label">Link</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputLink" name="car_link" value="<?php echo $_POST['car_link'];?>
"/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputPrice" class="col-md-2 control-label">Price per day</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputPrice" name="car_price" value="<?php echo $_POST['car_price'];?>
"/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputText" class="col-md-2 control-label">Description</label>
						<div class="col-md-5">
						  <textarea class="form-control" id="inputText" name="car_description" rows="4"><?php echo $_POST['car_description'];?>
</textarea>
						</div>
					</div>
						
					<div class="form-group">
						<label for="inputPrice" class="col-md-2 control-label">Technical parameters</label>
						<div class="col-md-5">
						  <div class="row">
							<div class="col-md-4">
								<label>Engine volume</label>
								<input type="text" class="form-control" name="car_params[engine]" value="<?php echo $_POST['car_params']['engine'];?>
"/>
							</div>
							<div class="col-md-4">
								<label>Gear box</label>
								<select class="form-control" name="car_params[gear]">
									<option value="manual" <?php if ($_POST['car_params']['gear']&&$_POST['car_params']['gear']=="manual") {?>selected<?php }?>>manual</option>
									<option value="automat" <?php if ($_POST['car_params']['gear']&&$_POST['car_params']['gear']=="automat") {?>selected<?php }?>>automat</option>
								</select>
							</div>
							<div class="col-md-4">
								<label>Fuel</label>
								<select class="form-control" name="car_params[fuel]">
									<option value="diesel" <?php if ($_POST['car_params']['fuel']&&$_POST['car_params']['fuel']=="diesel") {?>selected<?php }?>>diesel</option>
									<option value="gasoline" <?php if ($_POST['car_params']['fuel']&&$_POST['car_params']['fuel']=="gasoline") {?>selected<?php }?>>gasoline</option>
								</select>
							</div>
						   </div>
						  
						</div>
					</div>
				
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<span class="btn fileinput-button">
								<i class="glyphicon glyphicon-plus"></i>
								<span>Select file...</span>
								<!-- The file input field used as target for the file upload widget -->
								<input id="fileupload" type="file" name="image_file" accept="image/png,image/jpeg,image/jpg">
							</span>
						</div>
					</div>	
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-5">
							<!-- The global progress bar -->
							<div id="progress" class="progress">
								<div class="progress-bar progress-bar-success progress-bar-striped active"></div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-5" id="files">
							<!-- The global progress bar -->
							<?php if ($_POST['car_images']) {?>
								<?php  $_smarty_tpl->tpl_vars["sCarImg"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sCarImg"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_POST['car_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["sCarImg"]->key => $_smarty_tpl->tpl_vars["sCarImg"]->value) {
$_smarty_tpl->tpl_vars["sCarImg"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["sCarImg"]->key;
?>
									<?php $_smarty_tpl->tpl_vars["filename"] = new Smarty_variable(explode("/",$_smarty_tpl->tpl_vars['sCarImg']->value), null, 0);?>
									<?php $_smarty_tpl->tpl_vars["fileDir"] = new Smarty_variable('', null, 0);?>
									<div class="car-thumb" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
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
thumb_<?php echo end($_smarty_tpl->tpl_vars['filename']->value);?>
" />
										<a href="#" class="action-remove"><i class="fa fa-remove"></i></a>
									</div>
								<?php } ?>
							<?php }?>
						</div>
					</div>
					
					<input type="hidden" name="upload_dir" value="cars/" />
					<input type="hidden" name="personal_height" value="398" />
					<input type="hidden" name="personal_width" value="553" />
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
						  <button type="submit" class="btn" name="submit_add_car">Submit</button>
						</div>
					</div>
				
			<?php if ($_POST['car_images']) {?>
				<?php  $_smarty_tpl->tpl_vars["sCarImg"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sCarImg"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_POST['car_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["sCarImg"]->key => $_smarty_tpl->tpl_vars["sCarImg"]->value) {
$_smarty_tpl->tpl_vars["sCarImg"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["sCarImg"]->key;
?>
					<input type="hidden" name="car_images[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['sCarImg']->value;?>
" />
				<?php } ?>
			<?php }?>
		</form>	
					
			</div>
			
	</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
