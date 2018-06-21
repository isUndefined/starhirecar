{include file="../../header.tpl" title=foo}

<div class="row">
	
		{if $aCarGroup}
			{foreach from=$aCarGroup item="aGroup" key="k"}
			{assign var="carCategory" value="0"}
			<div class="cars-list row">
				<h1>{$k}</h1>
				{foreach from=$aGroup item="aCar"}
				{assign var="aCarExtra" value=unserialize($aCar.car_extra)}
				{assign var="aCarSlider" value=$aCarExtra.slider}
				<div class="col-md-6 car-box">	
					<div class="cover">
						<a href="{$web_path}/cars/{$aCar.category_link}/{$aCar.car_link}.html">
						{if $aCarSlider}
							{assign var="aCarsSliderImg" value=array_values($aCarSlider)}
							<img src="{$aCarsSliderImg.0}" />
						{else}
							<img src="{$tpl_dir}/images/no_cover.png" />
						{/if}
						<div class="hover"><i class="fa fa-search-plus"></i></div></a>
					</div>
					<div class="content">
						<h2><a href="{$web_path}/cars/{$aCar.category_link}/{$aCar.car_link}.html">{$aCar.car_title}</a></h2>
						<dl>
							<dt>Price per day:</dt>
							<dd><span>${$aCar.car_price}</span></dd>	
							{if $aCar.car_params}
							{assign var="carParams" value=unserialize($aCar.car_params)}
								{foreach from=$carParams item="sValue" key="sParam"}
								<dt>{$sParam}:</dt>
								<dd>{$sValue}</dd>		
								{/foreach}	
							{/if}
						</dl>
					</div>
				</div>
				{assign var="carCategory" value="{$aCar.car_category}"}
				{/foreach}
				
				{if $aCountCategoryCars.$carCategory and $aCountCategoryCars.$carCategory > 4}
					<div data-category="{$carCategory}" class="col-md-12 extend-list"><a href="#" data-start="2" onclick="extendCarsList(this, {$carCategory}); return false;">more cars</a></div>
				{/if}
			</div>
			{/foreach}
		{/if}
	
	
</div>

<script type="text/javascript">
	function extendCarsList(obj, iCategory){
		if(iCategory=="") return;
		iStart = $(obj).attr('data-start');
		$(obj).after('<a class="loading"></a>');

		$.ajax({
			type: "POST",
			url: "/cars/loadcarsfromcategory",
			dataType: "json",
			data: { category: iCategory, start: iStart},
			success: function(result){
				console.log(result, parseInt(iStart));
				$('div[data-category="'+iCategory+'"]').before(result.sText);
				if(result.bMore){
					$(obj).attr('data-start', parseInt(iStart)+1 );
				} else {
					$('div[data-category="'+iCategory+'"]').remove();
				}
				$('a.loading').remove();
			}
		});
	}
</script>

{include file="../../footer.tpl"}