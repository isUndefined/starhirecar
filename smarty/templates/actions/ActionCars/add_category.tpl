{include file="../../header.tpl" title=foo}

<script type="text/javascript" src="{$web_path}/engine/js/base64.js"></script>

<script type="text/javascript">
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
</script>

<div class="row">

	<div class="col-md-12">
		{if $action = "edit"}
		<h2>Edit car category #{$aCategory.category_name}</h2>
		{else}
		<h2>Add car category</h2>
		{/if}

		<form method="POST" id="form_add_category" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputTitle" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputTitle" name="category_name" value="{$smarty.post.category_name}">
				</div>
			</div>
	
			<div class="form-group">
				<label for="inputLink" class="col-md-2 control-label">Link</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputLink" name="category_link" value="{$smarty.post.category_link}"/>
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputText" class="col-md-2 control-label">Description</label>
				<div class="col-md-5">
				  <textarea class="form-control" id="inputText" name="category_text" rows="4">{$smarty.post.category_text}</textarea>
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

{include file="../../footer.tpl"}