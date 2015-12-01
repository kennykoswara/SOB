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
<style>
#mapcontainer {
   display: block;
   height: 600px;
}
</style>

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
								<a href="<?php echo site_url('home_control/index/') ?>" class="navbar-brand logo"><img src=" <?php echo base_url();?>asset/helpme.jpg" style="max-width:20px;max-height:20px;width:auto;height:auto;"></a>
							</div>
							<nav class="collapse navbar-collapse" role="navigation">
								<form class="navbar-form navbar-left" action="<?=site_url('home_control/search')?>" method="get">
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
										<a href="<?php echo site_url('askhelp_control') ?>"><i class="glyphicon glyphicon-bullhorn"></i> AskHelp</a>
									</li>
									<li>
										<a href="<?php echo site_url('map_control') ?>"><i class="glyphicon glyphicon-map-marker"></i> Map</a>
									</li>
									<li>
										<a href="<?php echo site_url('mission_control') ?>"><i class="glyphicon glyphicon-list-alt"></i> Missions</a>
									</li>
									<li>
										<a href="<?php echo site_url('request_control') ?>"><i class="glyphicon glyphicon-tasks"></i> Requests</a>
									</li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i></a>
										<ul class="dropdown-menu" style="min-width:8cm !important" id="topNav">
											<?php foreach ($request_list->result() as $notification)
											{
												if($notification->approval == 'pending' && $notification->status == 'F')
												{?>
													<li>
														<div style="padding-left:0" class="container-fluid">
															<a href="<?php echo site_url('friend_control/index/'.$notification->id) ?>">
															<div class="col-xs-6">
																<?php echo $notification->username ?>
															</div>
														</a>
															<div class="col-xs-6">
																<button id="button_<?php echo $notification->id; ?>" class="btn btn-success btn-xs" type="button"> Confirm </button>
																<button id="delete_<?php echo $notification->id; ?>" class="btn btn-danger btn-xs" type="button"> Delete </button>
															</div>
														</div>
													</li>
													<?php if(end($request_list->result()) !== $notification) { ?> <li role="separator" class="divider"></li>
													<?php } ?>

													<?php }
												} ?>
											</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
										<ul class="dropdown-menu">
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

							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
            <!-- /main -->

				</div>
			</div>
		</div>

		<section id="wrapper">
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<p id="demo" class="span12"></p>
			<script>
			function success(position)
			{
				var mapcanvas = document.createElement('div');
				var x = document.getElementById("demo");
				mapcanvas.id = 'mapcontainer';
				document.querySelector('article').appendChild(mapcanvas);
				<?php
					if($locate_lng === NULL) {?>
						var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					<?php }else{ ?>
						var coords = new google.maps.LatLng(<?php echo $locate_lat ?> , <?php echo $locate_lng ?>);
					<?php } ?>

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
						//alert(<?php echo $row->id ?>);
						var id = <?php echo $row->id ?> ;
						var id_requestor = <?php echo $row->id_user ?> ;
						$.ajax
						({
							type: "POST",
							url: "<?php echo site_url('map_control/book_mission/"+id+"/"+id_requestor+"'); ?>",
							data: {},

							success: function(msg)
							{
								if(msg=="can accept")
								{
									alert('Your mission has been updated');
									location.reload();
								}
								else if(msg=="cannot accept")
									alert('You have already taken this request');
								else
									alert("You can't accept this request yourself");
							},
						});
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
			$("button").click(function() {
				var full_id = this.id;
				var temp = full_id.split("_");
				var id = temp[1];
				var type = temp[0];
				if(type == 'button')
				{
					$.ajax
					({
						type: "POST",
						url: "<?php echo site_url('profile_control/approve_request/"+id+"'); ?>",
						data: {},
						success: function(){ location.reload(); },
					});
				}
				else if(type == 'delete')
				{
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('profile_control/remove_friend_request/"+id+"'); ?>",
						data: {},
						success: function(){ location.reload(); },
					});
				}
			});
		</script>

	</body>
</html>
