{assign var="bShowCarsCategory" value=true}
{include file="../../header.tpl"}
<script type="text/javascript" src="{$web_path}/engine/js/base64.js"></script>

<link rel="stylesheet" href="{$tpl_dir}/css/imperavi.css">
<script src="{$tpl_dir}/js/imperavi.min.js"></script>

<script type="text/javascript">
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
			var img = '{$smarty.post.image}';
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
	
</script>
<div class="row">
	<div class="col-xs-12">
		{if $action=="edit"}
			<h2>Edit special offer #{$smarty.post.offer_name}</h2>
		{else}
			<h2>Add special offer</h2>
		{/if}
		
		<form method="POST" id="form_add_offer" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputTitle" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="inputTitle" name="offer_name" value="{$smarty.post.offer_name}">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Short text</label>
				<div class="col-md-7">
				  <textarea class="form-control" id="" name="offer_short_text" rows="3">{$smarty.post.offer_short_text}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Full text</label>
				<div class="col-md-7">
				  <textarea class="form-control" id="offer_full_text" name="offer_full_text" rows="10" style="height: 200px">{$smarty.post.offer_full_text|nl2br}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Image preview</label>
				<div class="col-md-7">
					{if $smarty.post.image}
					<p class="img-thumb">
						<img src="{$web_path}/{$smarty.post.image}" style=""/>
						<a href="#" class="action-remove"><i class="fa fa-remove"></i></a>						
						<input type="hidden" name="image_exist" value="true"/>
					</p>
					<p class="img-thumb-notie">If preview image not removed, new image could not be uploaded.</p>
					{/if}
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



{include file="../../footer.tpl"}