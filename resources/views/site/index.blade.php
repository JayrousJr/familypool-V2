@include('/site/include/header')

<div class="hero-wrap" style="background-image: url('storage/images/backgrounds/background4.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">



        <!--popup news, success and error messages-->
        <div class="popup" id="popup">
            <img src="storage/images/others/success.png">
            @foreach($popups as $popup)
            @if($popup->page_to_display == 'Home')
            <button id="close">&times;</button>
            <h2>{{$popup->head}}</h2>
            <p>{!! $popup->body!!}</p>
            <a href="" aria-label="close" data-toggle="modal" class="btn-ask" data-target="#askservice"
                onclick="closePopup()">{{$popup->action}}</a>
            @endif
            @endforeach
        </div>
        <!-- <div id="session" class="popup">
            <span id="popup-message"></span>
        </div> -->

        @if(session('message'))
        <div id="session" class="success">
            <span id="popup-message"></span>
        </div>
        @endif

        @if(session('error'))
        <div id="session" class="error">
            <span id="popup-message"></span>
        </div>
        <!--popup news, success and error messages-->


        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Welcome to Family Pool
                    Services</h1>
                <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">The best we can do to
                    you is make your pool neat and safe</p>
                <!-- <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://www.youtube.com/watch?v=pifDZ1hu6gY" class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span class="icon-play mr-2"></span>Watch Video</a></p> -->
            </div>
        </div>
    </div>
</div>

<section class="ftco-counter ftco-intro" id="section-counter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-1 align-items-stretch">
                    <div class="text">
                        <span>We now Serve</span>
                        <strong class="number" data-number="15">0</strong>
                        <span>Cities at Mississippi and Tenessee</span>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-2 align-items-stretch">
                    <div class="text">
                        <h3 class="mb-4">Pool technician Job offer</h3>
                        <p>Job available for pool technicians with experience on this field.</p>
                        <p><a href="apply" class="btn btn-white px-3 py-2 mt-2">Apply Job Now</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-3 align-items-stretch">
                    <div class="text">
                        <h3 class="mb-4">Need Pool Service?</h3>
                        <p>We offers high standard pool services to meet all of your need </p>
                        <p><a href="{{'/service-request'}}" class="btn px-5 py-2 btn-white">Ask for Service</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Ask For Service modal stars--->

<!--Ask For Service modal Ends--->
<section class="ftco-section">
    <div class="container">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Services</h2>
            <p>Brief of Service we offer now</p>
        </div>
        <div class="row">

            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-cogs"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Maintenance</h3>
                        <p>We do pool repairs, pool cleaning, pump and water circulation check to prevent bacteria and
                            algae growth</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-flask"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Chemical Balancing</h3>
                        <p>We do chemical balancing. This involves us handling all chemicals including Chlorine, that
                            your pool may need are balanced</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-payment"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool equipment sales</h3>
                        <p>We sell the best quality pool equipments and chemicals in an affordable and reasonable price,
                            you do not need to go far.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                <p><a href="{{'/service'}}" class="btn btn-blue px-3 py-2 mt-2">More Services</a></p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h2 class="mb-4">DIY Maintenace</h2>
            <p>Brief DIY maintenance we offer</p>
        </div>
        <div class="row">

            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">Chlorine Tablets</h3>
                        <p>For lowering pH levels and preventing bacteria and mineral buildup</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">Muriatic Acid</h3>
                        <p>For lowering pH levels and preventing bacteria and mineral buildup</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Water Leveler</h3>
                        <p>Automatically adds more water from the hose until the desired level is reached ever day.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                <p><a href="{{'/category#diy'}}" class="btn btn-blue px-3 py-2 mt-2">More DIY</a></p>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Service Categories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="d-flex mb-4">
                        <div class="ml-4">
                            <h3><a href="{{'/category#monthlymaintenance'}}">Monthly Maintenance</a></h3>
                            <div class="text">
                                <p>For safeness of pool and pool users, we recommend monthly pool maintenance. Family
                                    Pool Service does this much better</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="d-flex mb-4">
                        <div class="ml-4">
                            <h3><a href="{{'/category#diy'}}">DIY</a></h3>
                            <div class="text">
                                <p>Like Kidneys removing toxins from our bodies, We eliminate impurities like grimes,
                                    leaves and even more small pool toys.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="d-flex mb-4">
                        <div class="ml-4">
                            <h3><a href="{{'/category#chemicals'}}">Chemicals</a></h3>
                            <div class="text">
                                <p>Adding the right chemicals and the precise amount of pool chemicals is very
                                    important. We also do chemical balancing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('/site/include/footer')