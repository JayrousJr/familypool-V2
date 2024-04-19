@include('/site/include/header')
<div class="hero-wrap-app" style="background-image: url('storage/images/backgrounds/background4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
</div>
<!-- END nav -->
@if(session('error'))
<div class="error" id="message">
    {{@session('error')}}
</div>
@endif
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <h2 class="mb-4 text-info">Service Request Form</h2>
                <p class="lead text-muted">Please Fill all the Form fields correctly</label>
            </div>
        </div>

        <form action="{{route('request')}}" name="services" method="POST" id="VserviceForm" class="" novalidate>
            @csrf

            <div class="row gx-3 gy-2 align-items-center mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="name" id="inputFloating" placeholder="Jayrous King" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
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
                        <input type="email" name="email" id="inputFloating" placeholder="name@email.com" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        <label for="inputFloating">Email</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Names and email -->
            <div class="row gx-3 gy-2 align-items-center mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="tel" name="phone" id="inputFloating" placeholder="00000000" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                        <label for="inputFloating">Telephone </label>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="zip" id="inputFloating" placeholder="Zip Code" class="form-control @error('zip') is-invalid @enderror" value="{{old('zip')}}">
                        <label for="inputFloating">Zip Code </label>
                        @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-head text-center">WHAT SERVICE DO YOU REQUIRE?</div>
                </div>
                <div class="col-md-12 check-controls">
                    <div class="form-check check-modifier">
                        <input type="radio" name="service" id="service1" class="form-check-input @error('service') is-invalid @enderror" value="REPAIR" value="{{old('service')}}">
                        <label class="form-check-label" for="service1">REPAIR</label>
                    </div>
                    <div class="form-check check-modifier">
                        <input type="radio" name="service" id="service2" class="form-check-input @error('service') is-invalid @enderror" value="CLEANING" value="{{old('service')}}">
                        <label class="form-check-label" for="service2">CLEANING</label>
                    </div>
                    <div class="form-check check-modifier">
                        <input type="radio" name="service" id="service3" class="form-check-input @error('service') is-invalid @enderror" value="EQUIPMENTS & CHEMICALS" value="{{old('service')}}">
                        <label class="form-check-label" for="service3">EQUIPMENTS & CHEMICALS</label>
                    </div>
                    <div class="form-check check-modifier">
                        <input type="radio" name="service" id="service4" class="form-check-input @error('service') is-invalid @enderror" value="COVERS" value="{{old('service')}}">
                        <label class="form-check-label" for="service4">COVERS</label>
                    </div>
                    <div class="form-check check-modifier">
                        <input type="radio" name="service" id="service5" class="form-check-input @error('service') is-invalid @enderror" value="OPENING & CLOSING" value="{{old('service')}}">
                        <label class="form-check-label" for="service5">OPENING & CLOSING</label>
                        @error('service')
                        <div class="invalid-feedback invalid">
                            <strong>Please Select a service</strong>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-12 mb-2">
                    <div class="form-head text-center">PROVIDE SOME FEW DETAILS ABOUT SERVICE</div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating txtlabel">
                        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="inputFloating" style="height: 100px;" placeholder="Please Describe your service including when will it be best for you">{{old('description')}}</textarea>
                        <label for="inputFloating">Describe your service</label>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="text-center">
                            <input type="submit" class="btn btn-blue px-5 py-2 " value="SEND SERVICE REQUEST" id="submit" name="submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>


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
            $("#message").fadeOut('slow');
        }, 5000);
    });
</script>

</html>