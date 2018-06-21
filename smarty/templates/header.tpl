<HTML>
<HEAD>
    <TITLE>{$page_title}</TITLE>
	
	<link rel="stylesheet" type="text/css" href="{$tpl_dir}/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="{$tpl_dir}/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="{$tpl_dir}/css/non-responsive.css" />
	<link rel="stylesheet" type="text/css" href="{$tpl_dir}/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="{$tpl_dir}/css/style.css" />
	
	<script type="text/javascript" src="{$tpl_dir}/js/jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/alert.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/button.js" ></script>
	<!--<script type="text/javascript" src="{$tpl_dir}/js/libs/carousel.js" ></script>-->
	<script type="text/javascript" src="{$tpl_dir}/js/libs/collapse.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/dropdown.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/modal.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/popover.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/scrollspy.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/tab.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/tooltip.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/libs/transition.js" ></script>
	<script type="text/javascript" src="{$tpl_dir}/js/template.js" ></script>
	
	
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</HEAD>
<BODY bgcolor="#ffffff">
	<div class="container">
		{if $aUser}
		<div class="control-userpanel">
			<a href="#" class="lever"><i class="fa fa-gear"></i></a>
			<div class="menu">
				<p>Hello, admin!</p>
				<ul>
					<li><a href="{$web_path}/cars/add">Add car</a></li>
					<li><a href="{$web_path}/offers/add">Add offer</a></li>
					<li><a href="{$web_path}/faq/add">Add FAQ</a></li>
				</ul>
			</div>
		</div>
		{/if}
		<div class="row">
			<div class="col-xs-12" id="header">
				<div class="logo-block">
					<a href="/"><span>Star</span><strong>Car</strong>Hire</a>
					<img src="{$tpl_dir}/images/logo-stars.png" />
				</div>
				<div class="contacts">
					call us at
					<span>1-541-784-2444</span>
				</div>
				<ul class="main-nav">
					<li><a href="{$web_path}/cars">car asortiment</a></li>
					<li><a href="{$web_path}/faq">FAQ</a></li>
					<li><a href="{$web_path}/offers">special offers</a></li>
					<li><a href="{$web_path}/contacts">contacts</a></li>
					<li><a href="{$web_path}/about">about us</a></li>
				</ul>
				<div class="mustang"></div>
			</div>
		</div>
		{if !$bShowCarsCategory}
		<div class="row">
			<div class="col-xs-3">
				<div class="carsTypeList {if isset($selectedCarType) and $selectedCarType=='sport'}active{/if}">
					<div class="header-block">
						<a href="{$web_path}/cars/sport">Sports</a>
					</div>
					<div class="list-image">
						<img src="{$tpl_dir}/images/list-cars-sport.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList {if isset($selectedCarType) and $selectedCarType=='luxury'}active{/if}">
					<div class="header-block">
						<a href="{$web_path}/cars/luxury">Luxury</a>
					</div>
					<div class="list-image">
						<img src="{$tpl_dir}/images/list-cars-luxury.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList {if isset($selectedCarType) and $selectedCarType=='multi-purpose-vehicle'}active{/if}">
					<div class="header-block">
						<a href="{$web_path}/cars/multi-purpose-vehicle">Multi-purpose vehicle</a>
					</div>
					<div class="list-image">
						<img src="{$tpl_dir}/images/list-cars-multi.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="carsTypeList {if isset($selectedCarType) and $selectedCarType=='city-car'}active{/if}">
					<div class="header-block">
						<a href="{$web_path}/cars/city-car">City car</a>
					</div>
					<div class="list-image">
						<img src="{$tpl_dir}/images/list-cars-city.jpg" />
					</div>
					<div class="footer-block">
						<div class="arrow"></div>
					</div>
				</div>
			</div>
		</div>
		{/if}
		{assign var="noShowSystemMessage" value=false}
	
		{include file="./system_message.tpl"}