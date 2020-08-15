		</div>
	</div>
</div>

<!-- FOOTER -->
<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="../../img/logo2.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Address: Plot 189 Namuli Rd, Bukoto P.O. Box 27272, Kampala, Uganda.<br /> +256 414 62 336 <br /> +256 701 603 444 <br /> +256 758 778 867 <br />admin@fhc-ug.biz info@fhc-ug.biz</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Products</h3>
						<span id='productId'>

						</span>
						
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p></p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join News letter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Xonib Software Systems | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="../../public/plugins/js/jquery.min.js"></script>
	<script src="../../public/plugins/js/bootstrap.min.js"></script>
	<script src="../../public/plugins/js/slick.min.js"></script>
	<script src="../../public/plugins/js/nouislider.min.js"></script>
	<script src="../../public/plugins/js/jquery.zoom.min.js"></script>
	<script src="../../public/plugins/js/main.js"></script>
	<script src="../../public/plugins/autocomplete/jquery.easy-autocomplete.min.js"></script>
	<script src="../../public/plugins/js/loadLink2.js"></script>
	<!-- Make sure you put this AFTER Leaflet's CSS -->
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<script type='text/javascript'>
		$(function(){
			var mymap = L.map('mapid').setView([0.351015, 32.602051],16);
			
			L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 18,
				id: 'mapbox/streets-v11',
				tileSize: 512,
				zoomOffset: -1,
				accessToken: 'pk.eyJ1IjoiamFtZXN5aWdhIiwiYSI6ImNrYzB3dW0xdjFvNXUyd214ajNheDQwNXIifQ.TIkKPuzNXjc_DTW4YsjCIw'
			}).addTo(mymap);
			L.marker([0.351015, 32.602051],{title:'Full Health & Homecare Offices',opacity: 0.5})
			.addTo(mymap)
			.bindPopup("<p>Full Health & Homecare<br />Address: Plot 189 Namuli Rd, Bukoto.<br />Office: +256 414 62 336</p>")
            .openPopup();

			/*var popup = L.popup()
			.setLatLng([0.351015, 32.602051])
			.setContent("<p>Full Health & Homecare<br />Address: Plot 189 Namuli Rd, Bukoto.<br />Office: +256 414 62 336</p>")
			.openOn(mymap);*/
			
			
		})
	</script>

</body>

</html>