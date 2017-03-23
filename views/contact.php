<div class="row">
	<div class="col-lg-12"style="text-align:center;">
		<h2>Contact</h2>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-lg-6">
		<div class="col-xs-6" style="padding-right:0px">
		<img src="web/img/image-slide2.jpeg" alt="imie_2" style="width:100%">
		</div>
		<div class="col-xs-6">
			<h3>IMIE</h3>
			<p>Ecole de la <br> fillière numérique</p>
		</div>
		
	</div>
	<div class="col-md-12 col-lg-6">
		<h3>Description</h3>
		<p>Créée en 1994, l’école de la filière numérique est actuellement implantée sur Nantes, Angers, Rennes et Le Mans. Pour intégrer le monde du travail numérique dans les meilleures conditions, IMIE vous propose d’obtenir des diplômes reconnus et de maîtriser les technologies les plus récentes.</p>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div id="map" style="width:100%;height:400px"></div>
			<script>
			function myMap() {
				var myCenter = new google.maps.LatLng(47.9950103, 0.19122830000001167);
				var mapCanvas = document.getElementById("map");
				var mapOptions = {center: myCenter, zoom: 17};
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({position:myCenter});
				marker.setMap(map);
			}
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC53n6lS52FBIguQOxeB53p66VtOymzzq0&callback=myMap"></script>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	
	</div>
</div>