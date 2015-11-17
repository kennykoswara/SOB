<html>
	<head>
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>

	</head>
	<body>
	<div class="column col-sm-10 col-xs-11" id="main">
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
				<div class="full col-sm-9">
					<div class="row">
						Click the allow button to let the browser find your location.
						<article>
						</article>
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
			mapcanvas.style.height = '400px';
			mapcanvas.style.width = '600px';
			document.querySelector('article').appendChild(mapcanvas);
			var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
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
				?>
				

				var marker = new google.maps.Marker({ 
					position: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng; ?>), 
					animation: google.maps.Animation.DROP,
					map: map,
					title:"<?php echo $name ?> \n <?php echo $address ?> \n <?php echo $request ?>",
					icon: icons["<?php echo $type ?>"].icon
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
		
		function toggleBounce() {
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
		<script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/home/js/scripts.js" type="text/javascript"></script>
	</body>
</html>