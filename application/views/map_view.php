<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>HelpMe - Map</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>

	</head>
	<body>
		<div class="wrapper">
			<div class="box">
				<div class="row row-offcanvas row-offcanvas-left">
					<!-- main right col -->
					<div class="column col-sm-10 col-xs-11" id="main">

						<!-- top nav -->
						<div class="navbar navbar-blue navbar-static-top">
							<div class="navbar-header">
								<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="/" class="navbar-brand logo">b</a>
							</div>
							<nav class="collapse navbar-collapse" role="navigation">
								<form class="navbar-form navbar-left" action="<?=site_url('home_control/search')?>" method="post">
									<div class="input-group input-group-sm" style="max-width:360px;">
										<input type="text" class="form-control" placeholder="Search" name="search-term" id="srch-term">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit" name="searchForm" value="searchForm"><i class="glyphicon glyphicon-search"></i></button>
										</div>
									</div>
								</form>
								<ul class="nav navbar-nav">
									<li>
										<a href="<?php echo site_url('home_control') ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
									</li>
									<li>
										<a href="<?php echo site_url('profile_control') ?>"><i class="glyphicon glyphicon-th-large"></i> Profile</a>
									</li>
									<li>
										<a href="<?php echo site_url('askhelp_control') ?>"><i class="glyphicon glyphicon-map-marker"></i> AskHelp</a>
									</li>
									<li>
										<a href="<?php echo site_url('map_control') ?>"><i class="glyphicon glyphicon-road"></i> Map</a>
									</li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
								  <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="">More</a></li>
									  <li><a href="">More</a></li>
									  <li><a href="">More</a></li>
									  <li><a href="">More</a></li>
									  <li><a href="<?php echo site_url('home_control/logout') ?>">Log out</a></li>
									</ul>
								  </li>
								</ul>
							</nav>
						</div>
                <!-- /top nav -->

						<div class="padding">
							<div class="full col-sm-9">

								<!-- content -->
								<div class="row">

									<!-- main col right -->
									<div class="col-sm-12">

										<div class="well">
										   Click the allow button to let the browser find your location.
										   <?php echo "</br>Latitude: " . $locate_lat . "\nLongitude: " . $locate_lng;?>
										   </br>
										   &nbsp;
											<article>
											</article>
										</div>
									</div>
								</div><!--/row-->

								<div class="row">
									<div class="col-sm-6">
										<a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
									</div>
								</div>

								<div class="row" id="footer">
									<div class="col-sm-6">
									</div>
									<div class="col-sm-6">
										<p>
											<a href="#" class="pull-right">©Copyright 2013</a>
										</p>
									</div>
								</div>

								<hr>

									<h4 class="text-center">
										<a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
									</h4>

								<hr>


							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
            <!-- /main -->

				</div>
			</div>
		</div>

		<section id="wrapper">
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<p id="demo"></p>
			<script>
			function success(position)
			{
				var mapcanvas = document.createElement('div');
				var x = document.getElementById("demo");
				mapcanvas.id = 'mapcontainer';
				mapcanvas.style.height = '600px';
				mapcanvas.style.width = '1190px';
				document.querySelector('article').appendChild(mapcanvas);
				<?php
					if($locate_lng === NULL) {?>
						var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					<?php }else{ ?>
						var coords = new google.maps.LatLng(<?php echo $locate_lat ?> , <?php echo $locate_lng ?>);
					<?php } ?>


				x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
				var options = {
					zoom: 15,
					center: coords,
					mapTypeControl: false,
					navigationControlOptions: {
					style: google.maps.NavigationControlStyle.SMALL
					},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("mapcontainer"), options);
				<?php
				foreach ($markers->result() as $row)
				{
					$name = $row->name;
					$address =  $row->address;
					$type = $row->type;
					$lat = $row->lat;
					$lng = $row->lng;
					$request = $row->request;
					$desc = $row->description;
					?>


					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng; ?>),
						animation: google.maps.Animation.DROP,
						map: map,
						url: "http://localhost/SOB/index.php/home_control",
						title:"<?php echo $request ?> \n <?php echo $name ?> \n <?php echo $address ?> \n <?php echo $desc ?>",
						icon: icons["<?php echo $type ?>"].icon
					});
					google.maps.event.addListener(marker, 'click', function() {
						window.location.href = marker.url;
					});
					marker.addListener('click', toggleBounce);
					<?php
				}?>

			}
			var icons = {
				easy: {
					icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
				},
				medium: {
					icon: 'http://labs.google.com/ridefinder/images/mm_20_yellow.png'
				},
				urgent: {
					icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
				}
			};

			function toggleBounce()
			{
				if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				} else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
			}

			if (navigator.geolocation) {
			  navigator.geolocation.getCurrentPosition(success);
			} else {
			  error('Geo Location is not supported');
			}
			</script>
		</section>
		<!-- script references -->
		<script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/home/js/scripts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/foundation/js/foundation.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/foundation/js/foundation/foundation.slider.js" type="text/javascript"></script>
		<script>
		  $(document).foundation();
		</script>

	</body>
</html>
