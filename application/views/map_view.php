<html>
	<body>
	<section id="wrapper">
		Click the allow button to let the browser find your location.
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<article>
		</article>
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
	</body>
</html>