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
				$html = "<b>" + $name + "</b> <br/>" + $address;
				?>
				var marker = new google.maps.Marker({ 
					 position: new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng; ?>), 
					map: map,
					title:"You are here!"
				});
				<?php
			}?>	
			
			bindInfoWindow(marker, map, infoWindow, html);
			
		}
		function bindInfoWindow(marker, map, infoWindow, html) {
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			});

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