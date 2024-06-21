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


                <!-- @if(session('message'))
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
                @endif -->


                <form action="{{'apply_job'}}" method="post" novalidate>
                    @method('POST')
                    @csrf
                    <div class="col-md-12">
                        <div class="form-head text-center">PERSONAL DETAILS</div>
                    </div>
                    <!-- Names and email -->
                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="name" id="inputFloating" placeholder="Jayrous King" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}">
                                <label for=" inputFloating">Full Name</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" id="inputFloating" placeholder="name@email.com" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}">
                                <label for="inputFloating">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Address Details Section -->
                    <div class="col-md-12">
                        <div class="form-head text-center">PERSONAL ADDRESS DATAILS</div>
                    </div>

                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="nationality" id="inputFloating" placeholder="Jayrous King" value="{{Auth::user()->nationality}}" class="form-control @error('nationality') is-invalid @enderror" value="United States">
                                <label for=" inputFloating">Country</label>
                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="state" id="inputFloating" placeholder="Jayrous King" class="form-control @error('state') is-invalid @enderror" value="{{Auth::user()->state}}">
                                <label for=" inputFloating">State</label>
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="city" id="inputFloating" placeholder="Jayrous King" class="form-control @error('city') is-invalid @enderror" value="{{Auth::user()->city}}">
                                <label for=" inputFloating">City</label>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="street" id="inputFloating" placeholder="Jayrous King" class="form-control @error('street') is-invalid @enderror" value="{{Auth::user()->street}}">
                                <label for=" inputFloating">Street</label>
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="tel" name="phone" id="inputFloating" placeholder="000000 0000" class="form-control @error('phone') is-invalid @enderror" value="{{Auth::user()->phone}}">
                                <label for=" inputFloating">Telephone</label>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="zip" id="inputFloating" placeholder="Jayrous King" class="form-control @error('zip') is-invalid @enderror" value="{{old('zip')}}">
                                <label for=" inputFloating">Zip Code</label>
                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Gender and Age Section -->
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">GENDER</div>
                        </div>
                        <div class="col-md-12 check-controls">

                            <div class="form-check check-modifier">
                                <input type="radio" name="gender" id="gender5" class="form-check-input @error('gender') is-invalid @enderror" value="Female">
                                <label class="form-check-label" for="service5">FEMALE</label>
                            </div>
                            <div class="form-check check-modifier">
                                <input type="radio" name="gender" id="gender" class="form-check-input @error('gender') is-invalid @enderror " value="Male">
                                <label class="form-check-label" for="gender">MALE</label>
                                @error('gender')

                                <div class="invalid-feedback ">
                                    <strong>Select your Gender</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Age section -->

                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">AGE DETAILS</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="age" id="inputFloating" placeholder="23" class="form-control @error('age') is-invalid @enderror" value="{{old('age')}}">
                                <label for=" inputFloating">Your Age</label>
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="birthdate" id="inputFloating" placeholder="Birth date" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate')}}" min="1996-01-01" max="2005-12-31">
                                <label for="inputFloating">Birth Date</label>
                                @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Availability days -->
                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-12">
                            <div class="form-head text-center">WHAT ARE YOUR AVAILABEL DAYS</div>
                        </div>
                        <div class="col-md-12 check-controls">
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="MONDAY" required>
                                <label for="inputFloating" class=" form-check-label">MONDAY</label>

                            </div>
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="TUESDAY" required>
                                <label for="inputFloating" class=" form-check-label">TUESDAY</label>

                            </div>
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="WEDNESDAY" required>
                                <label for="inputFloating" class=" form-check-label">WEDNESDAY</label>

                            </div>
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="THURSDAY" required>
                                <label for="inputFloating" class=" form-check-label">THURSDAY</label>

                            </div>
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="FRIDAY" required>
                                <label for="inputFloating" class=" form-check-label">FRIDAY</label>

                            </div>
                            <div class="form-check check-modifier">
                                <input type="checkbox" name="days[]" id="inputFloating" placeholder="" class="form-check-input @error('days') is-invalid @enderror" value="SATURDAY" required>
                                <label for="inputFloating" class=" form-check-label">SATURDAY</label>
                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <!-- Work Time Section -->
                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">WORKING TIME DETAILS</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="time" name="starttime" id="inputFloating" placeholder="23" class="form-control @error('starttime') is-invalid @enderror" value="{{ old('starttime') }}">
                                <label for=" inputFloating">Work Starting Time</label>
                                @error('starttime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="time" name="endtime" id="inputFloating" placeholder="Birth date" class="form-control @error('endtime') is-invalid @enderror" value="{{old('endtime')}}" min="1996-01-01" max="2005-12-31">
                                <label for="inputFloating">Work Ending Time</label>
                                @error('endtime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" name="startdate" id="inputFloating" placeholder="" class="form-control @error('startdate') is-invalid @enderror" value="{{old('startdate')}}" min="1996-01-01" max="2005-12-31">
                                <label for="inputFloating">When are you willing to start
                                    working</label>
                                @error('startdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="workperiod" id="inputFloating" placeholder="23" class="form-control @error('workperiod') is-invalid @enderror" value="{{ old('workperiod') }}">
                                <label for="inputFloating">How long are you willing to work with us?</label>
                                @error('workperiod')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="workHours" id="inputFloating" placeholder="23" class="form-control @error('workHours') is-invalid @enderror" value="{{ old('workHours') }}">
                                <label for=" inputFloating">How many hours are you willing to work per week?</label>
                                @error('workHours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Social Security and EIN Number Section -->

                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">SOCIAL SECURITY NUMBER</div>
                        </div>
                        <div class="col-md-12 check-controls">

                            <div class="form-check check-modifier">
                                <input type="radio" name="socialsecurity" id="securityNumberRadio" class="form-check-input @error('socialsecurity') is-invalid @enderror" value="SSN" onclick="EnableDisableSocial();">
                                <label class=" form-check-label" for="securityNumberRadio">SS NUMBER</label>
                            </div>
                            <div class="form-check check-modifier">
                                <input type="radio" name="socialsecurity" id="einNumberRadio" class="form-check-input @error('socialsecurity') is-invalid @enderror " value="EIN" onclick="EnableDisableSocial();">
                                <label class="form-check-label" for="einNumberRadio">EI NUMBER</label>
                                @error('socialsecurity')

                                <div class="invalid-feedback ">
                                    <strong>select EIN or SSN</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="socialsecurityNumber" id="socialsecurityNumber" placeholder="Jayrous King" class="form-control @error('socialsecurityNumber') is-invalid @enderror" value="{{old('socialsecurityNumber')}}" disabled>
                                <label for=" socialsecurityNumber"> Provide your SSN</label>
                                @error('socialsecurityNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="einNumber" id="einNumber" placeholder="name@einNumber.com" class="form-control @error('einNumber') is-invalid @enderror" value="{{old('einNumber')}}" disabled>
                                <label for="einNumber">Provide your EIN</label>
                                @error('einNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <!-- Smoking Section -->
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">DO YOU SMOKE</div>
                        </div>
                        <div class="col-md-12 check-controls">

                            <div class="form-check check-modifier">
                                <input type="radio" name="smoke" id="smoke" class="form-check-input @error('smoke') is-invalid @enderror" value="YES I SMOKE">
                                <label class="form-check-label" for="service5">YES</label>
                            </div>
                            <div class="form-check check-modifier">
                                <input type="radio" name="smoke" id="smoke" class="form-check-input @error('smoke') is-invalid @enderror" value="NO I DONOT SMOKE">
                                <label class="form-check-label" for="smoke">NO</label>
                                @error('smoke')

                                <div class="invalid-feedback ">
                                    <strong>Choose your option</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <!-- Driving License Section -->

                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">DO YOU HAVE A DRIVIG LICINCE</div>
                        </div>
                        <div class="col-md-12 check-controls">

                            <div class="form-check check-modifier">
                                <input type="radio" name="licence" id="yes-licence" class="form-check-input @error('licence') is-invalid @enderror" value="YES I I HAVE DRIVING LICENCE" onclick="EnableDisableTB();">
                                <label class=" form-check-label" for="service5">YES</label>
                            </div>
                            <div class="form-check check-modifier">
                                <input type="radio" name="licence" id="no-licence" class="form-check-input @error('licence') is-invalid @enderror" value="NO I DONOT HAVE DRIVING LICENCE" onclick="EnableDisableTB();">
                                <label class=" form-check-label" for="no-licence">NO</label>
                                @error('licence')

                                <div class="invalid-feedback ">
                                    <strong>Choose your Option</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">DRIVING LICENCE DETAILS</div>
                        </div>
                        <div class="col-md-12 check-controls">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" name="licenceNumber" id="licenceNumber" placeholder="name@licenceNumber.com" class="form-control @error('licenceNumber') is-invalid @enderror" value="{{old('licenceNumber')}}" disabled>
                                    <label for="licenceNumber">Licence Number</label>
                                    @error('licenceNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" name="issueddate" id="issueddate" placeholder="name@issueddate.com" class="form-control @error('issueddate') is-invalid @enderror" value="{{old('issueddate')}}" disabled>
                                    <label for="issueddate">License Issued Date</label>
                                    @error('issueddate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" name="expiredate" id="expiredate" placeholder="name@expiredate.com" class="form-control @error('expiredate') is-invalid @enderror" value="{{old('expiredate')}}" disabled>
                                    <label for="expiredate">Expiry Date</label>
                                    @error('expiredate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" name="issuedcity" id="issuedcity" placeholder="name@issuedcity.com" class="form-control @error('issuedcity') is-invalid @enderror" value="{{old('issuedcity')}}" disabled>
                                    <label for="issuedcity">Issued State</label>
                                    @error('issuedcity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Transport Ownership Section -->
                    <div class="row mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-head text-center">DO YOU HAVE YOUR OWN TRANSPORT?</div>
                        </div>
                        <div class="col-md-12 check-controls">

                            <div class="form-check check-modifier">
                                <input type="radio" name="transport" id="own-transport" class="form-check-input @error('transport') is-invalid @enderror" value="YES I I HAVE MY TRANSPORT">
                                <label class=" form-check-label" for="own-transport">YES</label>
                            </div>
                            <div class="form-check check-modifier">
                                <input type="radio" name="transport" id="no-transport" class="form-check-input @error('transport') is-invalid @enderror" value="NO I DONOT HAVE NO TRANSPORT">
                                <label class=" form-check-label" for="no-transport">NO</label>
                                @error('transport')

                                <div class="invalid-feedback ">
                                    <strong>Choose your Option</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <p class="text-muted">All the information i have provided are correct and valid
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