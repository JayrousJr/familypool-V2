@include('/site/include/header')
<div class="hero-wrap-app" style="background-image: url('/storage/images/backgrounds/background4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</div>
<!-- END nav -->

<section class="ftco-section bg-light">
    <div class="container">
        <div class="col-md-12 heading-section ftco-animate text-center ">
            <h2 class="mb-4 text-info">Apply for Technician!</h2>
            <p class="lead text-muted">Please Fill all the Form fields correctly with transparency </label>
                <br>
            <div class="col-md-12 text-center ftco-animate">


                @if(session('message'))
                <div class="success" id="notification">
                    {{@session('message')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <p>Please Fix the following errors to continue, check carefull your details input!</p>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
                @endif


                <form action="{{'apply_job'}}" method="post">
                    @method('POST')
                    @csrf
                    Personal Details Section
                    <div class="form-group">
                        <label class="col-form-label text-info">Personal Details</label>
                    </div>

                    <div class="form-group">
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly placeholder="Full Names" class="form-control @error('name') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" readonly placeholder="username@example.com" class="form-control @error('email') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}" readonly placeholder="(123) 456 7890" class="form-control @error('phone') is-invalid @enderror">
                    </div>

                    <!-- Address Details Section -->
                    <div class="form-group">
                        <label class="col-form-label text-info">Address Details</label>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Street Address" value="{{ Auth::user()->street }}" readonly name="street" class="form-control @error('street') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="City" value="{{ Auth::user()->city }}" readonly name="city" id="city" class="form-control @error('city') is-invalid @enderror" autocomplete="on">
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="State / Province" name="state" value="{{ Auth::user()->state }}" readonly id="state" class="form-control @error('state') is-invalid @enderror" autocomplete="on">
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Country" name="nationality" value="{{ Auth::user()->nationality }}" readonly class="form-control @error('nationality') is-invalid @enderror" autocomplete="on">
                    </div>

                    <div class="form-group">
                        <input type="number" value="{{ old('zip') }}" placeholder="Postal / Zip Code" name="zip" id="zip" class="form-control @error('zip') is-invalid @enderror" autocomplete="on">
                    </div>

                    <!-- Gender and Age Section -->
                    <div class="form-group" id="gender">
                        <label class="col-form-label text-info">Gender</label><br>
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="male">Male</label>

                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                    </div>

                    <div class="form-group">
                        <input type="number" value="{{ old('age') }}" id="age" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Your age in Years">
                    </div>

                    <div class="form-group">
                        <input type="date" value="{{ old('birthdate') }}" id="birthdate" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" min="1996-01-01" max="2004-12-31">
                    </div>

                    <!-- Days Available Section -->
                    <div class="form-group">
                        <label class="col-form-label text-info">What are Your availability Days in a week?</label>
                    </div>

                    <div class="form-group" id="daysAvailable">
                        <label for="monday">Monday</label>
                        <input type="checkbox" id="monday" name="days[]" value="Monday">

                        <label for="tuesday">Tuesday</label>
                        <input type="checkbox" id="tuesday" name="days[]" value="Tuesday">

                        <label for="wednesday">Wednesday</label>
                        <input type="checkbox" id="wednesday" name="days[]" value="Wednesday">
                        <br>

                        <label for="thursday">Thursday</label>
                        <input type="checkbox" id="thursday" name="days[]" value="Thursday">

                        <label for="friday">Friday</label>
                        <input type="checkbox" id="friday" name="days[]" value="Friday">

                        <label for="saturday">Saturday</label>
                        <input type="checkbox" id="saturday" name="days[]" value="Saturday">
                        <br>
                    </div>

                    <!-- Work Time Section -->
                    <div class="form-group">
                        <label for="starttime" class="col-form-label text-info">Work Starting Time</label>
                    </div>

                    <div class="form-group">
                        <input type="time" id="starttime" value="{{ old('starttime') }}" name="starttime" class="form-control @error('starttime') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="endtime" class="col-form-label text-info">Work Ending Time</label>
                    </div>

                    <div class="form-group">
                        <input type="time" id="endtime" value="{{ old('endtime') }}" name="endtime" class="form-control @error('endtime') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="startdate" class="col-form-label text-info">When are you willing to start
                            working</label>
                    </div>

                    <div class="form-group">
                        <input type="date" id="startdate" value="{{ old('startdate') }}" name="startdate" class="form-control @error('startdate') is-invalid @enderror">
                    </div>

                    <!-- Work Period Section -->
                    <div class="form-group">
                        <label class="col-form-label text-info">How long are you willing to work with us?</label>
                    </div>

                    <div class="form-group">
                        <input type="number" id="workperiod" value="{{ old('workperiod') }}" name="workperiod" placeholder="In Months - 6 Months" class="form-control @error('workperiod') is-invalid @enderror">
                    </div>

                    <!-- Work Hours Section -->
                    <div class="form-group">
                        <label class="col-form-label text-info">How many hours are you willing to work per week?</label>
                    </div>

                    <div class="form-group">
                        <input type="number" value="{{ old('workHours') }}" name="workHours" placeholder="example - 30 hrs" class="form-control @error('workHours') is-invalid @enderror">
                    </div>

                    <!-- Social Security and EIN Number Section -->
                    <div class="form-group">
                        <label class="col-form-label text-info">Do you have Social Security or EIN number? Select
                            one.</label><br>
                        <input type="radio" class="@error('socialsecurity') is-invalid @enderror" id="securityNumberRadio" name="socialsecurity" value="SSN" onclick="EnableDisableSocial();">
                        <label for="securityNumberRadio">SS Number</label>
                        <br>
                        <input type="radio" class=" @error('socialsecurity') is-invalid @enderror" id="einNumberRadio" name="socialsecurity" value="EIN" onclick="EnableDisableSocial();">
                        <label for="einNumberRadio">EIN Number</label>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-info">Social Security Number</label>
                    </div>

                    <div class="form-group">
                        <input type="text" id="socialsecurityNumber" value="{{ old('socialsecurityNumber') }}" name="socialsecurityNumber" placeholder="SS Number" class="form-control @error('socialsecurityNumber') is-invalid @enderror" disabled>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-info">EIN Number</label>
                    </div>

                    <div class="form-group">
                        <input type="text" id="einNumber" value="{{ old('einNumber') }}" name="einNumber" placeholder="EIN number" class="form-control @error('einNumber') is-invalid @enderror" disabled>
                    </div>

                    <!-- Smoking Section -->
                    <div class="form-group" id="smokeCheckboxes">
                        <label class="col-form-label text-info">Do you Smoke?</label><br>
                        <input type="radio" id="yessmoke" name="smoke" value="I smoke" class="@error('smoke') is-invalid @enderror">
                        <label for="yessmoke">Yes</label>
                        <br>
                        <input type="radio" id="nosmoke" class="@error('smoke') is-invalid @enderror" name="smoke" value="I don't smoke">
                        <label for="nosmoke">No</label>
                    </div>

                    <!-- Driving License Section -->
                    <div class="form-group" id="licenceCheckboxes">
                        <label class="col-form-label text-info">Do you have a valid driving license?</label><br>
                        <input type="radio" id="yes-licence" name="licence" class=" @error('licence') is-invalid @enderror" value="I have valid license" onclick="EnableDisableTB();">
                        <label for="yes-licence">Yes</label>
                        <br>
                        <input type="radio" id="no-licence" name="licence" class="@error('licence') is-invalid @enderror" value="I don't have valid licence" onclick="EnableDisableTB();">
                        <label for="no-licence">No</label>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-info">Driving License Number</label>
                    </div>

                    <div class="form-group">
                        <input type="text" id="licenceNumber" value="{{ old('licenceNumber') }}" name="licenceNumber" placeholder="License Number" class="form-control @error('licenceNumber') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="form-group">
                        <label for="issueddate" class="col-form-label  text-info">License Issued Date</label>
                    </div>

                    <div class="form-group">
                        <input type="date" id="issueddate" value="{{ old('issueddate') }}" name="issueddate" class="form-control @error('issueddate') is-invalid @enderror" disabled>
                    </div>

                    <div class="form-group">
                        <label for="expiredate" class="col-form-label text-info">License Expiry Date</label>
                    </div>

                    <div class="form-group">
                        <input type="date" id="expiredate" value="{{ old('expiredate') }}" name="expiredate" class="form-control @error('expiredate') is-invalid @enderror" disabled>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label text-info">Your license issued state and city</label>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Issued City and State" value="{{ old('issuedcity') }}" name="issuedcity" id="issuedcity" class="form-control @error('issuedcity') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <!-- Transport Ownership Section -->
                    <div class="form-group" id="transportOwnership">
                        <label class="col-form-label text-info">Do you have your own transport?</label><br>
                        <input type="radio" id="own-transport" class="@error('transport') is-invalid @enderror" name="transport" value="I Own transport">
                        <label for="own-transport">Yes</label>
                        <br>
                        <input type="radio" id="no-transport" class="@error('transport') is-invalid @enderror" name="transport" value="I do not own transport">
                        <label for="no-transport">No</label>
                    </div>

                    <div class="form-group">
                        <p class="text-muted">All the information is correct and valid
                            <input type="checkbox" name="termsChkbx">
                        </p>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="btn py-3 px-5 btn-primary btn-sm" value="Submit Form" disabled>
                    </div>
                </form>


            </div>
        </div>
    </div>
    </div>
</section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#007bff" />
    </svg>
</div>
</body>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="assets/js/google-map.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/togglesubmitt.js"></script>

<script>
    $(document).ready(function() {
        //hide the notification after 2seconds  
        setTimeout(function() {
            $("#notification").fadeOut('slow');
        }, 15000);
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

</html>