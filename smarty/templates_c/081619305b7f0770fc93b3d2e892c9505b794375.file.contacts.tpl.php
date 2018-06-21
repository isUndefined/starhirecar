<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-11 23:01:25
         compiled from ".\smarty\templates\actions\ActionContacts\contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267555489ea7e537d18-70150329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '081619305b7f0770fc93b3d2e892c9505b794375' => 
    array (
      0 => '.\\smarty\\templates\\actions\\ActionContacts\\contacts.tpl',
      1 => 1418328071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267555489ea7e537d18-70150329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5489ea7e594832_03759821',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489ea7e594832_03759821')) {function content_5489ea7e594832_03759821($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["bShowCarsCategory"] = new Smarty_variable(true, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("../../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var now = new Date();
		
		var sec_key = btoa("1amSup3rH3r0C@R");
		$("#contact_form").prepend(
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
		<h2>Contact us</h2>
		<p class="simple-text sm">
			Whether you’re looking for answers, would like to solve a problem, or just want to let us know how we did, you’ll find many ways to contact us right here. We’ll help you resolve your issues quickly and easily, getting you back to more important things, like relaxing on your new sofa.
		</p>
		<br><br>
		<div class="row">
			<div class="col-md-8">
				<form class="form-horizontal" role="form" method="post" id="contact_form">
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-5">
						  <input type="text" class="form-control" id="inputName" name="contact_name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-5">
						  <input type="email" class="form-control" id="inputEmail3" name="contact_mail">
						</div>
					</div>
				  
					<div class="form-group">
						<label for="inputText" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-8">
						  <textarea class="form-control" rows="5" id="inputText" name="contact_message"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn" name="submit_contact_us">Send</button>
						</div>
					</div>
				</form>
			</div>
			
			<div class="col-md-4">
				<div class="guide-block">
					<h6>StarCarHire</h6>
					<address>
					  <span>Address</span><br>
					  Stefan cel Mare 162, of 52<br>
					  Republic of Moldova<br>
					  
					</address>
					<address>
						<span>Phone</span><br>
						+(373) 022 456-7890<br>
						+(373) 022 456-7890
					</address>
				</div>
			</div>
			
			<div class="col-md-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10878.897735275956!2d28.83405812802981!3d47.02601384562571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1418327039250" width="100%" height="270" frameborder="0" style="border:0"></iframe>
			</div>
		</div>
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
