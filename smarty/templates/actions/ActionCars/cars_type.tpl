{include file="../../header.tpl"}


<div class="row">
	<div class="cars-list">
		<h1>{$aCategory.category_name}{if $aUser}
		<div class="drop-actions">
			<a href="#" class="drop-down"><span class="caret"></span></a>
			<div class="content">
				<a href="{$web_path}/cars/category/edit/{$aCategory.id_category}">Edit</a>
				<a href="#">Delete</a>
			</div>
		</div>
		{/if}</h1>
		
		<div class="col-md-12 simple-text">
			{$aCategory.category_text|nl2br}
		</div>
		{if $aCars}
		{foreach from=$aCars item="aCar"}
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
		{/if}
		
	</div>
</div>


{include file="../../footer.tpl"}
