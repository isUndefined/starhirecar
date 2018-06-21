{include file="../../header.tpl" title=foo}
	
		<div class="row">
			<div class="col-md-12"><!--
				<div id="slideOfferts" class="carousel">
					<div class="carousel-inner">
						<div class="active item" data-slide-number="0">
							<div class="content">
								<span>Rent exclusive car for your special occasion!</span>
								<img src="{$tpl_dir}/images/level1-sliver-cover.jpg"/>
							</div>
							<div class="footer">
								<span class="short-text">this beauty only</span>
							</div>
							<div class="price">
								$50 <span>day</span>
							</div>
						</div>	
						<div class="item" data-slide-number="1">
							<div class="content">
								<span>Rent exclusive car for your special occasion!</span>
								<img src="{$tpl_dir}/images/level1-sliver-cover.jpg"/>
							</div>
							<div class="footer">
								<span class="short-text">this beauty only</span>
							</div>
							<div class="price">
								$50 <span>day</span>
							</div>
						</div>
					</div>
					
					<a class="carousel-control left" href="#slideOfferts" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#slideOfferts" data-slide="next">&rsaquo;</a>
				</div>
				-->
				<div id="slideOfferts" class="carousel slide carousel-fade">
				
				  <div class="carousel-inner">
					<div class="active item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="{$tpl_dir}/images/level1-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$50 <span>day</span>
						</div>
						
					</div>
					<div class="item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="{$tpl_dir}/images/level2-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$150 <span>day</span>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<span>Rent exclusive car for your special occasion!</span>
							<img src="{$tpl_dir}/images/level3-sliver-cover.jpg"/>
						</div>
						<div class="footer">
							<span class="short-text">this beauty only</span>
						</div>
						<div class="price">
							$250 <span>day</span>
						</div>
					</div>
				  </div>
				 
				  <a class="carousel-control left" href="#slideOfferts" data-slide="prev"></a>
				  <a class="carousel-control right" href="#slideOfferts" data-slide="next"></a>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#slideOfferts').carousel({
					interval: 5000
				}).bind('slide.bs.carousel', function (e) {
					//$(this).find('.price').hide();
				}).bind('slid.bs.carousel', function (e) {
					//$(this).find('.price').fadeIn();
				});
				
			
			});
		</script>
		<div class="row">
			<div class="col-md-12">
				<h1>welcome</h1>
				
				<p class="simple-text">Welcome to Star Car Hire.  Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.</p>
			</div>
		</div>

{include file="../../footer.tpl"}