{assign var="bShowCarsCategory" value=true}
{include file="../../header.tpl"}

<div class="row">
	<div class="col-xs-12">
		<h2>Special offers</h2>
		
		<div class="row">
			{if $aOffers}
				{foreach from=$aOffers item="aOffer"}
					<div class="col-xs-6">
						<div class="special-ofers-box">
							<h4>{$aOffer.title}</h4>
							{if $aOffer.image}
								{assign var="filename" value="/"|explode:$aOffer.image}
								{assign var="fileDir" value=""}
								{foreach from=$filename item="sName" name="image"}
									{if !$smarty.foreach.image.last}
										{assign var="fileDir" value="`$fileDir``$sName`/"}
									{/if}
								{/foreach}
								<div class="img-thumb">
									<img src="{$fileDir}thumb_{end($filename)}" class="img-responsive">
								</div>
							{/if}
							<p>{$aOffer.short_text}</p>
							<a href="/offers/{$aOffer.link}.html" class="btn">View Offer Details</a>
						</div>
					</div>
				{/foreach}
			{else}
				List of offers empty.
			{/if}
			
		</div>
	</div>

</div>



{include file="../../footer.tpl"}