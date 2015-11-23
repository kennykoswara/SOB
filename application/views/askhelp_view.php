<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>AskHelp</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>
		
	</head>
	<body>
<<<<<<< HEAD
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
									<a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
								  </li>
								  <li>
									<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
								  </li>
								  <li>
									<a href="#"><span class="badge">badge</span></a>
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

									<!-- main col left -->
									<div class="col-sm-5">

										<div class="well">
											<input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
											
											<div class="btn-group" style="margin-top:1em">
												<button type="button" class="btn btn-sm btn-danger">Help Type</button>
												<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												  <span class="caret"></span>
												  <span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu">
												  <li><a href="#">Car Broke Down</a></li>
												  <li><a href="#">Health Issue</a></li>
												  <li><a href="#">Magang Issues</a></li>
												  <li role="separator" class="divider"></li>
												  <li><a href="#">Other</a></li>
												</ul>
											</div>
											
											<!--<div class="range-slider round" data-slider data-options="start: 1; end: 3;">
												<span class="range-slider-handle" role="slider" tabindex="0"></span>
												<span class="range-slider-active-segment"></span>
												<input type="hidden">
											</div>-->
											<div style="margin-top:1em">
												<textarea class="form-control" rows="10" id="desc" placeholder="Help Description"></textarea>
											</div>
										</div>
									</div>

									<!-- main col right -->
									<div class="col-sm-7">

										<div class="well">
										   My Current location.
										   <div class="results"></div>
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
=======
	<div class="column col-sm-10 col-xs-12" id="main">
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
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
                      <li>
                        <a href="#"><span class="badge">badge</span></a>
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
								<div class="col-md-6">
									<div class="full col-sm-10 col-xs-12 col-md-12">
										<div class="row">
											<div class="container-fluid" style="margin-top:2em">
												<div class="row">
													<div class="form-group-sm">
														<input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
													</div>
													<div class="form-group-sm">
														<input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
													  </div>
												</div>

												<div class="row">

													<div class="btn-group" style="margin-top:1em">
														<button type="button" class="btn btn-sm btn-danger">Help Type</button>
														<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														  <span class="caret"></span>
														  <span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu">
														  <li><a href="#">Car Broke Down</a></li>
														  <li><a href="#">Health Issue</a></li>
														  <li><a href="#">Magang Issues</a></li>
														  <li role="separator" class="divider"></li>
														  <li><a href="#">Other</a></li>
														</ul>
													</div>

													<div class="row">
														<div class="col-md-3">
															<div class="range-slider round" data-slider data-options="start: 1; end: 3;">
																<span class="range-slider-handle" role="slider" tabindex="0"></span>
																<span class="range-slider-active-segment"></span>
																<input type="hidden">
															</div>
														</div>
													</div>

													<div class="form-group" style="margin-top:1em">
														<textarea class="form-control" rows="10" id="desc" placeholder="Help Description"></textarea>
													</div>
								</div>
							</div>
						</div>
>>>>>>> origin/master
					</div>
            <!-- /main -->

				</div>
<<<<<<< HEAD
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
				mapcanvas.style.height = '400px';
				mapcanvas.style.width = '600px';
				document.querySelector('article').appendChild(mapcanvas);
				var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
				$('.results').html(x.innerHTML);
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
					?>
					

					var marker = new google.maps.Marker({ 
						position: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng; ?>), 
						animation: google.maps.Animation.DROP,
						map: map,
						title:"<?php echo $name ?> \n <?php echo $address ?> \n <?php echo $request ?>",
						icon: icons["<?php echo $type ?>"].icon
					});
					var marker2 = new google.maps.Marker({
						position: coords,
						map: map,
						title: 'Hello World!'
					  });

					marker.addListener('click', toggleBounce);
					<?php
				}?>	
				
			}
			var icons = {
				restaurant: {
					icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
				},
				bar: {
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
=======
				<div class="col-md-6">
					<div class="full col-sm-10 col-xs-12 col-md-12">
					<div class="row">
						<div class="container-fluid">
							MAP DISINI
						</div>
					</div>
				</div>
				</div>




				</div>

>>>>>>> origin/master
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
