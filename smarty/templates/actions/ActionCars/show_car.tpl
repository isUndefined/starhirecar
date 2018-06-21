{include file="../../header.tpl"}

	<div class="row">
		<div class="col-md-12 car-profile">
			<h1>{$aCar.car_title}</h1>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12" id="slider-cars-details">
							<div id="carousel-bounding-box">
								<div id="myCarousel" class="carousel slide">
									<!-- main slider carousel items -->
									<div class="carousel-inner">
									{if $aCar.car_extra}
										{assign var="carExtra" value=unserialize($aCar.car_extra)}
										{if $carExtra.slider}
										{assign var="nr_img" value=0}
											{foreach from=$carExtra.slider item="sImage" name="extra_slider"}
												{assign var="filename" value="/"|explode:$sImage}
												{assign var="fileDir" value=""}
												{foreach from=$filename item="sName" name="image"}
													{if !$smarty.foreach.image.last}
														{assign var="fileDir" value="`$fileDir``$sName`/"}
													{/if}
												{/foreach}
												<div class="{if $smarty.foreach.extra_slider.first}active {/if}item" data-slide-number="{$nr_img}">
													<img src="{$fileDir}crop_{end($filename)}" class="img-responsive">
												</div>
											{$nr_img = $nr_img+1}
											{/foreach}
										{else}
										<div class="active item" data-slide-number="0">
											<img src="{$tpl_dir}/images/no_cover.png" class="img-responsive">
										</div>
										{/if}
									{else}
										<div class="active item" data-slide-number="0">
											<img src="{$tpl_dir}/images/no_cover.png" class="img-responsive">
										</div>
									{/if}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="slider-cars-thumbs">
							<!-- thumb navigation carousel items -->
							
						
							<ul class="list-inline">
								{if $aCar.car_extra}
									{assign var="carExtra" value=unserialize($aCar.car_extra)}
									{if $carExtra.slider}
									{assign var="nr_img" value=0}
										{foreach from=$carExtra.slider item="sImage" name="extra_slider"}
											{assign var="filename" value="/"|explode:$sImage}
											{assign var="fileDir" value=""}
											{foreach from=$filename item="sName" name="image"}
												{if !$smarty.foreach.image.last}
													{assign var="fileDir" value="`$fileDir``$sName`/"}
												{/if}
											{/foreach}
											<li> 
												<a id="carousel-selector-{$nr_img}" {if $smarty.foreach.extra_slider.first}class="selected"{/if}>
													<img src="{$fileDir}crop_{end($filename)}" class="img-responsive">
												</a>
											</li>
										{$nr_img = $nr_img+1}
										{/foreach}
									{/if}
								{else}
								
								<li> 
									<a id="carousel-selector-0" class="selected">
										<img src="{$tpl_dir}/images/car-details-thumb-4.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-1">
										<img src="{$tpl_dir}/images/car-details-thumb-1.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-2">
										<img src="{$tpl_dir}/images/car-details-thumb-3.jpg" class="img-responsive">
									</a>
								</li>
								<li> 
									<a id="carousel-selector-3">
										<img src="{$tpl_dir}/images/car-details-thumb-2.jpg" class="img-responsive">
									</a>
								</li>
								{/if}
							</ul>
							
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function(){
						$('#slider-cars-details #myCarousel').carousel({
							interval: false
						});
						
						// handles the carousel thumbnails
						$('[id^=carousel-selector-]').click( function(){
						  var id_selector = $(this).attr("id");
						  var id = id_selector.substr(id_selector.length -1);
						  id = parseInt(id);
						  $('#slider-cars-details #myCarousel').carousel(id);
						  $('[id^=carousel-selector-]').removeClass('selected');
						  $(this).addClass('selected');
						});

						// when the carousel slides, auto update
						$('#slider-cars-details #myCarousel').on('slid', function (e) {
						  var id = $('.item.active').data('slide-number');
						  id = parseInt(id);
						  $('[id^=carousel-selector-]').removeClass('selected');
						  $('[id=carousel-selector-'+id+']').addClass('selected');
						});
					});
				</script>
				<div class="col-md-6 car-caracteristics">
					<div class="price">
						${$aCar.car_price} <span>Price per day</span>
					</div>
					{if $aUser}
					<div class="drop-actions">
						<a href="#" class="drop-down"><span class="caret"></span></a>
						<div class="content">
							<a href="{$web_path}/cars/edit/{$aCar.id_car}">Edit</a>
							<a href="#">Delete</a>
						</div>
					</div>
					{/if}
					{if $aCar.car_params}
					{assign var="carParams" value=unserialize($aCar.car_params)}
					<dl>
						{foreach from=$carParams item="sValue" key="sParam"}
						<dt>{$sParam}:</dt>
						<dd>{$sValue}</dd>		
						{/foreach}					
					</dl>
					{/if}
					<div class="description">
						{$aCar.car_text}
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="cars-list">
			<h1>others</h1>
			<div class="col-md-6 car-box">	
				<div class="cover">
					<img src="{$tpl_dir}/images/cars_list/c1.jpg" />
				</div>
				<div class="content">
					<h2>BMW Z100</h2>
					<dl>
						<dt>Price per day:</dt>
						<dd><span>$127</span></dd>	
						
						<dt>Engine volume:</dt>
						<dd>1781</dd>	
						
						<dt>Gear box:</dt>
						<dd>manual</dd>	
						
						<dt>Fuel:</dt>
						<dd>petrol</dd>	
					</dl>
				</div>
			</div>
			<div class="col-md-6 car-box">	
				<div class="cover">
					<img src="{$tpl_dir}/images/cars_list/c2.jpg" />
				</div>
				<div class="content">
					<h2>Opel Omega</h2>
					<dl>
						<dt>Price per day:</dt>
						<dd><span>$59</span></dd>	
						
						<dt>Engine volume:</dt>
						<dd>2420</dd>	
						
						<dt>Gear box:</dt>
						<dd>automat</dd>	
						
						<dt>Fuel:</dt>
						<dd>petrol</dd>	
					</dl>
				</div>
			</div>
		
		</div>
	</div>

{include file="../../footer.tpl"}