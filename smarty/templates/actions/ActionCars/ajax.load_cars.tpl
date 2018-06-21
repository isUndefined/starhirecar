{if $aGetCars}
	{foreach from=$aGetCars item="aCar"}
		{assign var="aCarExtra" value=unserialize($aCar.car_extra)}
		{assign var="aCarSlider" value=$aCarExtra.slider}
		<div class="col-md-6 car-box">	
			<div class="cover">
				<a href="{$web_path}/cars/{$aCategory.category_link}/{$aCar.car_link}.html">
				{if $aCarSlider}
					{assign var="aCarsSliderImg" value=array_values($aCarSlider)}
					<img src="{$aCarsSliderImg.0}" />
				{else}
					<img src="{$tpl_dir}/images/no_cover.png" />
				{/if}
				<div class="hover"><i class="fa fa-search-plus"></i></div></a>
			</div>
			<div class="content">
				<h2><a href="{$web_path}/cars/{$aCategory.category_link}/{$aCar.car_link}.html">{$aCar.car_title}</a></h2>
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
	{/foreach}
{else}
no data.
{/if}