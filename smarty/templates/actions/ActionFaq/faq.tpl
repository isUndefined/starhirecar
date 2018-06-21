{assign var="bShowCarsCategory" value=true}
{include file="../../header.tpl"}
<script>
	$(document).ready(function(){
		$('.faq-title, .faq-collapse').click(function(e){
			e.preventDefault();
			//$('.faq-list li.active').removeAttr('class');
			
			var self = $(this);
			var selfParent = self.parent();
			selfParent.find('.faq-answer').slideToggle(500);
			selfParent.toggleClass('active').toggleClass('show');

			if(selfParent.find('.faq-collapse').text()=="-"){
				selfParent.find('.faq-collapse').text('+');
			} else {
				selfParent.find('.faq-collapse').text('-');
			}
			
		});
		
		
		if(window.location.hash!=""){
			$('a[name="'+window.location.hash.slice(1)+'"]').prev().text('-').parent().addClass('show').addClass('active');
		}
	});
</script>	

<div class="row">
	<div class="col-md-12">
		<h2>F.A.Q.</h2>
		<ul class="faq-list">
		{if $aFaqs}
			{foreach from=$aFaqs item="aFaq"}
				<li>
					<span class="faq-collapse">+</span><a href="#q{$aFaq.faq_id}" class="faq-title" name="q{$aFaq.faq_id}">{$aFaq.question}</a>
					{if $aUser}
					<div class="drop-actions">
						<a href="#" class="drop-down"><span class="caret"></span></a>
						<div class="content">
							<a href="{$web_path}/faq/edit/{$aFaq.faq_id}">Edit</a>
							<a href="#">Delete</a>
						</div>
					</div>
					{/if}
					<div class="faq-answer">
						{$aFaq.answer}
					</div>
				</li>
			{/foreach}
		{/if}
		</ul>
	</div>
</div>


{include file="../../footer.tpl"}