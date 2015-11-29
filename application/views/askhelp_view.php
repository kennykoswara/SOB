<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>HelpMe - AskHelp</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>

	</head>
	<style>
#map-canvas {
  width: 660px;
  height: 400px;
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
								<a href="" class="navbar-brand logo">H</a>
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
										<ul class="dropdown-menu" id="topNav">
											<?php foreach ($request_list->result() as $notification)
											{
												if($notification->approval == 'pending' && $notification->status == 'F')
												{?>
													<li><a href="<?php echo site_url('friend_control/index/'.$notification->id) ?>"> <?php echo $notification->username ?> </a></li>
													<button id="button_<?php echo $notification->id; ?>"> Confirm </button>
													<button id="delete_<?php echo $notification->id; ?>"> Delete </button>
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
					<?php echo form_open('askhelp_control'); ?>
						<div class="padding">
							<div class="full col-sm-9">

								<!-- content -->
								<div class="row">

									<!-- main col left -->
									<div class="col-sm-5">

										<div class="well">
											<input type="text" class="form-control input-md" id="request" name="request" placeholder="Add a title" required="true">

											<!--<div class="btn-group" style="margin-top:1em">
												<button type="button" class="btn btn-sm btn-danger">Help Type</button>
												<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												  <span class="caret"></span>
												  <span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu">
												  <li><a value="Car">Car Broke Down</a></li>
												  <li><a value="Health">Health Issue</a></li>
												  <li><a value="Work">Work Issues</a></li>
												  <li role="separator" class="divider"></li>
												  <li><a href="#">Other</a></li>
												</ul>
											</div>-->

											<select style="margin-top:1em" id="type" name="type">
											  <option value="easy">Easy</option>
											  <option value="medium">Medium</option>
											  <option value="urgent">Urgent</option>
											</select>

											<!--<div class="range-slider round" data-slider data-options="start: 1; end: 3;">
												<span class="range-slider-handle" role="slider" tabindex="0"></span>
												<span class="range-slider-active-segment"></span>
												<input type="hidden">
											</div>-->
											<div style="margin-top:1em">
												<textarea class="form-control" rows="10" id="desc" name="desc" placeholder="Help Description"></textarea>
											</div>
										</div>
									</div>

									<!-- main col right -->
									<div class="col-sm-7">

										<div class="well">
										   My Current location.
										   <div id="map-canvas"></div>
												Location:
												</br> Latitude:&nbsp;&nbsp;&nbsp;
												<input id="my_lat" name="my_lat" readonly="readonly">
												<span> Longitude:
												<input id="my_long" name="my_long" readonly="readonly"> </span>
												</br>
												</br>
												<button type="submit" name="submitForm" value="submit" id="submit" class="btn btn-default"><b>Submit</b></button>
										</div>
									</div>
								</div><!--/row-->
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</form>
			</div>
		</div>

		<section id="wrapper">
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<p id="demo"></p>
			<script>
				function initialize()
				{
					var map;
					var position = new google.maps.LatLng(-6.2559323, 106.61493070000006);    // set your own default location.
					var myOptions = {
						zoom: 15,
						center: position
					};
					var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

					// We send a request to search for the location of the user.
					// If that location is found, we will zoom/pan to this place, and set a marker
					navigator.geolocation.getCurrentPosition(locationFound, locationNotFound);

					function locationFound(position)
					{
						// we will zoom/pan to this place, and set a marker
						var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
						// var accuracy = position.coords.accuracy;
						map.setCenter(location);
						var marker = new google.maps.Marker({
							position: location,
							map: map,
							draggable: true,
							title: "Help me here! Drag the marker to the exact location."
						});
						// set the value an value of the <input>
						updateInput(location.lat(), location.lng());

						// Add a "drag end" event handler
						google.maps.event.addListener(marker, 'dragend', function() {
						  updateInput(this.position.lat(), this.position.lng());
						});
					}
					function locationNotFound() {
						// location not found, you might want to do something here
					}

				}
				function updateInput(lat, lng) {
				  document.getElementById("my_lat").value = lat;
				  document.getElementById("my_long").value = lng;
				}
				google.maps.event.addDomListener(window, 'load', initialize);
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
