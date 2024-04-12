		<footer class="ftco-footer ftco-section img">
		    <div class="container">
		        <div class="row mb-5">
		            <div class="col-md-4">
		                <div class="ftco-footer-widget mb-4">
		                    <h2 class="ftco-heading-2">About Us</h2>
		                    @foreach($abouts as $about)
		                    <p> {!! $about->about_us !!}</p>
		                    @endforeach
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="ftco-footer-widget mb-4">
		                    <h2 class="ftco-heading-2">Social Media</h2>
		                    Get in touch with us in our social media links any time to get more information with from us so
		                    don't lose our contact.</p>
		                    <ul class="ftco-footer-social list-unstyled float-lft mt-5">
		                        @foreach($socialnetwork as $network)
		                        <li class="ftco-animate"><a href="{{$network->link}}" target="_blank"><span
		                                    class="icon-{{$network->icon}}"></span></a>
		                        </li>
		                        @endforeach
		                    </ul>
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="ftco-footer-widget mb-4">
		                    <h2 class="ftco-heading-2">Get Connected</h2>
		                    <div class="block-23 mb-3">
		                        @foreach($infos as $info)
		                        <ul>
		                            <li><span class="icon icon-map-marker"></span><span
		                                    class="text">{{$info->address}},</span>
		                            </li>
		                            <li><span class="icon icon-map-marker"></span><span class="text">{{$info->city}},
		                                    {{$info->country}}.</span></li>
		                            <li><a href="tel:{{$info->phone}}"><span class="icon icon-phone"></span><span
		                                        class="text">{{$info->phone}}.</span></a></li>
		                            <li><a href="mailto:{{$info->email_two}}"><span class="icon icon-envelope"></span> <span
		                                        class="text">
		                                        {{$info->email_two}}</span></a>
		                            </li>
		                            <li><a href="mailto:{{$info->email_one}}"><span class="icon icon-envelope"></span> <span
		                                        class="text">
		                                        {{$info->email_one}}</span></a>
		                            </li>
		                        </ul>
		                        @endforeach
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="row text-center">
		            <div class="col-md-6">&copy; TechCLOUDs.Com. </div>
		            <div class="col-md-6">
		                <a href="mailto:joshuajayrous@gmail.com">Designed By TechClouds Team</a>
		            </div>
		        </div>
		    </div>
		</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
		            stroke="#007bff" />
		    </svg></div>


		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.easing.1.3.js"></script>
		<script src="assets/js/jquery.waypoints.min.js"></script>
		<script src="assets/js/jquery.stellar.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/aos.js"></script>
		<script src="assets/js/jquery.animateNumber.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.js"></script>
		<script src="assets/js/jquery.timepicker.min.js"></script>
		<script src="assets/js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
		</script>
		<script src="assets/js/popup.js"></script>
		<script src="assets/js/phones.js"></script>
		<script src="assets/js/google-map.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/formvalidate0101.js"></script>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9915471855000165"
		    crossorigin="anonymous"></script>


		<script>
$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#notification").fadeOut('slow');
    }, 15000);
});

$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#message").fadeOut('slow');
    }, 5000);
});
		</script>

		<script>
function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("show");

    var dropdown = document.getElementByClassName("dropdown-content");
    for (var i = 0; i < dropdown.length; i++) {
        var openDropdown = dropdown[i];
        if (openDropdown.classList.contains("show") && openDropdown !== dropdown) {
            openDropdown.classList.remove("show");
        }
    }
}
document.addEventListener("click", function(event) {
    if (!event.target.matches('.profile-icon')) {
        var dropdowns = document.getElementByClassName('dropdown-content');
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
});
document.getElementById('exit').addEventListener("click", function() {
    var dropdown = document.getElementsById("myDropdown");
    if (dropdown.classList.contains("show")) {
        dropdown.classList.remove("show");
    }
})

// function toggleDropdown() {
// 	var dropdown = document.getElementById("myDropdown");
// 	dropdown.classList.toggle("show");
// }
// window.onclick = function(event) {
// 	if (!event.target.matches('.profile-icon') && !event.target.matches('#exit')) {
// 		var dropdown = getElementByClassName("dropdown-content");
// 		var i;
// 		for (i = 0; i < dropdowns.length; i++) {
// 			var openDropdown = dropdowns[i];
// 			if (openDropdown.classList.contains("show") && openDropdown !== dropdown) {
// 				openDropdown.classList.remove("show");
// 			}
// 		}
// 	}
// }
// document.getElementById("exit").addEventListener("click", function() {
// 	var dropdown = getElementByClassName("dropdown-content");
// 	if (dropdown.classList.contains('show')) {
// 		dropdown.classList.remove("show");
// 	}
// })
		</script>
		</body>

		</html>