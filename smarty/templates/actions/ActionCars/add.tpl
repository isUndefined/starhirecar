{include file="../../header.tpl"}

<script type="text/javascript" src="{$web_path}/engine/js/base64.js"></script>

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="{$tpl_dir}/css/uploader/jquery.fileupload.css">
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{$tpl_dir}/js/uploader/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{$tpl_dir}/js/uploader/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="{$tpl_dir}/js/uploader/jquery.fileupload.js"></script>


<script type="text/javascript">
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
</script>
</script>
<div class="row">
	<div class="col-md-12">
		<h1>Add car</h1>

		<form method="POST" id="form_add_car" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="id_car" value="{$smarty.post.id_car}" />
					<div class="form-group">
						<label for="inputTitle" class="col-md-2 control-label">Title</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputTitle" name="car_title" value="{$smarty.post.car_title}">
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputCateg" class="col-md-2 control-label">Category</label>
						<div class="col-md-4">
							<select name="car_category" class="form-control" id="inputCateg">
								<option value="">Select one</option>
								{if $aCategories}
									{foreach from=$aCategories item="aCategory"}
									<option value="{$aCategory.id_category}" {if $smarty.post.car_category==$aCategory.id_category}selected{/if}>{$aCategory.category_name}</option>
									{/foreach}
								{/if}
							</select>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputLink" class="col-md-2 control-label">Link</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputLink" name="car_link" value="{$smarty.post.car_link}"/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputPrice" class="col-md-2 control-label">Price per day</label>
						<div class="col-md-4">
						  <input type="text" class="form-control" id="inputPrice" name="car_price" value="{$smarty.post.car_price}"/>
						</div>
					</div>
				
					<div class="form-group">
						<label for="inputText" class="col-md-2 control-label">Description</label>
						<div class="col-md-5">
						  <textarea class="form-control" id="inputText" name="car_description" rows="4">{$smarty.post.car_description}</textarea>
						</div>
					</div>
						
					<div class="form-group">
						<label for="inputPrice" class="col-md-2 control-label">Technical parameters</label>
						<div class="col-md-5">
						  <div class="row">
							<div class="col-md-4">
								<label>Engine volume</label>
								<input type="text" class="form-control" name="car_params[engine]" value="{$smarty.post.car_params.engine}"/>
							</div>
							<div class="col-md-4">
								<label>Gear box</label>
								<select class="form-control" name="car_params[gear]">
									<option value="manual" {if $smarty.post.car_params.gear and $smarty.post.car_params.gear=="manual"}selected{/if}>manual</option>
									<option value="automat" {if $smarty.post.car_params.gear and $smarty.post.car_params.gear=="automat"}selected{/if}>automat</option>
								</select>
							</div>
							<div class="col-md-4">
								<label>Fuel</label>
								<select class="form-control" name="car_params[fuel]">
									<option value="diesel" {if $smarty.post.car_params.fuel and $smarty.post.car_params.fuel=="diesel"}selected{/if}>diesel</option>
									<option value="gasoline" {if $smarty.post.car_params.fuel and $smarty.post.car_params.fuel=="gasoline"}selected{/if}>gasoline</option>
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
							{if $smarty.post.car_images}
								{foreach from=$smarty.post.car_images item="sCarImg" key="k"}
									{assign var="filename" value="/"|explode:$sCarImg}
									{assign var="fileDir" value=""}
									<div class="car-thumb" id="{$k}">
										{foreach from=$filename item="sName" name="image"}
											{if !$smarty.foreach.image.last}
												{assign var="fileDir" value="`$fileDir``$sName`/"}
											{/if}
										{/foreach}
										<img src="{$fileDir}thumb_{end($filename)}" />
										<a href="#" class="action-remove"><i class="fa fa-remove"></i></a>
									</div>
								{/foreach}
							{/if}
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
				
			{if $smarty.post.car_images}
				{foreach from=$smarty.post.car_images item="sCarImg" key="k"}
					<input type="hidden" name="car_images[{$k}]" value="{$sCarImg}" />
				{/foreach}
			{/if}
		</form>	
					
			</div>
			
	</div>


{include file="../../footer.tpl"}