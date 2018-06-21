{assign var="bShowCarsCategory" value=true}
{include file="../../header.tpl"}

<div class="row">
	<div class="col-xs-12 special-ofers-box-full">
		<h2>Special offers
		
		</h2>
		<div class="image-preview">
		{if $aOffer.image}
			{assign var="filename" value="/"|explode:$aOffer.image}
			{assign var="fileDir" value=""}
			{foreach from=$filename item="sName" name="image"}
				{if !$smarty.foreach.image.last}
					{assign var="fileDir" value="`$fileDir``$sName`/"}
				{/if}
			{/foreach}
			<img src="{$fileDir}crop_{end($filename)}" class="img-responsive">
		{/if}
			<h3 {if !$aOffer.image}class="no-preview"{/if}>{$aOffer.title} 
			{if $aUser}
				<div class="drop-actions">
					<a href="#" class="drop-down"><span class="caret"></span></a>
					<div class="content">
						<a href="{$web_path}/offers/edit/{$aOffer.id_offer}">Edit</a>
						<a href="#">Delete</a>
					</div>
				</div>
				{/if}
			</h3>
		</div>
		
		
		<div class="text">
			{$aOffer.full_text|nl2br}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h2>other offers</h2>
		<div class="row">
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Nordics: save up to 30%</h4>
					<div class="img-thumb">
						<img src="/uploads/offers/thumb_3f5f4f7a0a.jpg" class="img-responsive">
					</div>
					<p>By making reservation on this website the discount will automatically calculate.</p>
					<a href="/offers/nordics-save-up-to-30.html" class="btn">View Offer Details</a>
				</div>
			</div>							
			<div class="col-xs-6">
				<div class="special-ofers-box">
					<h4>Enjoy a complimentary upgrade</h4>
					<div class="img-thumb">
						<img src="/uploads/offers/thumb_aec9d3fe8c.jpg" class="img-responsive">
					</div>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<a href="/offers/enjoy-a-complimentary-upgrade.html" class="btn">View Offer Details</a>
				</div>
			</div>
		</div>
	</div>
</div>




{include file="../../footer.tpl"}