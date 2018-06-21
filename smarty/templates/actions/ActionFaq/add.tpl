{include file="../../header.tpl"}

<script type="text/javascript" src="{$web_path}/engine/js/base64.js"></script>

<script type="text/javascript">
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
</script>

<div class="row">
	<div class="col-md-12">
		<h1>Add answer and question</h1>
		<form method="POST" id="form_add_faq" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputQuestion" class="col-md-2 control-label">Question</label>
				<div class="col-md-5">
				  <input type="text" class="form-control" id="inputQuestion" name="question" value="{$smarty.post.question}">
				</div>
			</div>
			<div class="form-group">
				<label for="inputAnswer" class="col-md-2 control-label">Answer</label>
				<div class="col-md-8">
				  <textarea class="form-control" id="inputAnswer" name="answer" rows="5">{$smarty.post.answer}</textarea>
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

{include file="../../footer.tpl"}