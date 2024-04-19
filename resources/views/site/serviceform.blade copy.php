@include('/site/include/header')
<div class="hero-wrap-app" style="background-image: url('storage/images/backgrounds/background4.jpg');"
    data-stellar-background-ratio="0.5">
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
        <div class="row">
            <div class="col-md-12 text-left ftco-animate">
                <div class="ftco-section-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <form action="{{'request'}}" name="services" method="POST" id="VserviceForm">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Full Names" spellcheck="false"
                            class="form-control"  value="{{old('name')}}">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                        <input type="email" placeholder="jayrous@example.com" id="email" name="email"
                            class="form-control"  value="{{old('email')}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                        <input type="tel" placeholder="(123) 456 789" name="phone" id="phone" class="form-control"
                             value="{{old('phone')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="state" name="state" placeholder="Enter The State" spellcheck="false"
                            class="form-control"  value="{{old('state')}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" id="city" name="city" placeholder="Enter The city" spellcheck="false"
                            class="form-control"  value="{{old('city')}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="street" name="street"
                            placeholder="Street / Physical Address" 
                            value="{{old('street')}}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            placeholder="Describe the service with the clear description" rows="5" name="description"
                            id="description" spellcheck="true"
                            title="Enter Minimum of 100 characters">{{old('description')}}</textarea>
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

                    <div class="form-group item-select">
                        <div class="list-group">
                            <ul class="list-inline">
                                <p style="font-weight: 900">Select the Service(s) you require
                                </p>
                                <li>
                                    <label class="col-form-label" for="service1">Pool
                                        Maintenance </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service1"
                                        value="Pool Maintenance">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service2">Chemical
                                        Balancing </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service2"
                                        value="Chemical Balancing">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service3">Pool Opening
                                    </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service3"
                                        value="Pool Opening">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service4">Pool Equipment
                                        Repairs </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service4"
                                        value="Pool Equipment Repairs">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service5">Pool Closing &
                                        Winterizing
                                    </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service5"
                                        value="Pool Closing & Winterizing">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service6">Pool Drain &
                                        Pressure Washing
                                    </label> <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service6"
                                        value="Pool Drain & Pressure Washing">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service7">Pool Cleaning
                                    </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service7"
                                        value="Pool Cleaning">
                                </li>
                                <li>
                                    <label class="col-form-label" for="service8">Pool Equipment
                                        Repairs </label>
                                    <input type="checkbox" name="service[]"
                                        class="@error('service[]') is-invalid @enderror" id="service8"
                                        value="Pool Equipment Repairs">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="text-center">
                            <input type="submit" class="btn btn-blue px-5 py-2 " value="SEND SERVICE REQUEST"
                                id="submit" name="submit">
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
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#007bff" />
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