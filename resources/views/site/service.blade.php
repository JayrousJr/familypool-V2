@include('/site/include/header')

<!-- END nav -->

<!--popup news-->
<div class="popup" id="popup">
    <img src="storage/images/others/success.png">
    @foreach($popups as $popup)
    @if($popup->page_to_display == 'Service')
    <button id="close">&times;</button>
    <h2>{{$popup->head}}</h2>
    <p>{!! $popup->body!!}</p>
    <a href="" aria-label="close" data-toggle="modal" class="btn-ask" data-target="#askservice" onclick="closePopup()">{{$popup->action}}</a>
    @endif
    @endforeach
</div>
<!--popup news-->

<div class="hero-wrap" style="background-image: url('/storage/images/backgrounds/background4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Services</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Our Services</h1>
            </div>
        </div>
    </div>
</div>
<!--Ask For Service modal stars--->




<!--Ask For Service modal Ends-->
<section class="ftco-section">
    <div class="container">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Services</h2>
            <p>What We do</p>
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
                        <p>We do chemical balancing, involves us handling all chemicals including Chlorine and all that
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
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-pool"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Opening</h3>
                        <p>Ladder and lights installation, pump and heater starting, pool brushing and shock treatment,
                            for an hour of work and a written document</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-pencil"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Free Estimation</h3>
                        <p>Experties in pool cost estimation, pool equipment and chemicals cost estimations. Advices
                            about how to get the better pool as you wish.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-build"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Equipment Repairs</h3>
                        <p>Do not dump the fault pool equipments, we have experties in pool equipment repairs and we can
                            do the repairs of all the equipments.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-shower"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Closing & Winterizing</h3>
                        <p>Closing the pool during the coldest months of the year. Winterizing protect the pool from
                            temperature and weather related damages while your Pool is not in use.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-healing"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Pool Drain & Pressure Washing</h3>
                        <p>We use high pressure water to remove loose paint, mold, grime, dust and dirt from the pool
                            surfaces. We drain the moistures after the process.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="icon d-flex mb-3"><span class="icon-trash-o"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading">Regular Pool Cleaning</h3>
                        <p>After pool use, you need a weekly or monthly intensive cleaning of your pool to make it safe
                            from bacteria and loose materials and dust. we offer regular pool cleaning.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="ftco-section bg-light">
    <div class="col-md-12 heading-section ftco-animate text-center">
        <h2 class="mb-4">Service Areas</h2>
        <p>Areas we provide our services</p>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">1. Bartlett, TN</h3>
                        <h3 class="heading">2. Lakeland, TN</h3>
                        <h3 class="heading">3. East Memphis, TN</h3>
                        <h3 class="heading">4. Memphis, TN</h3>
                        <h3 class="heading">5. Midtown, TN</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">6. Kerrville, TN</h3>
                        <h3 class="heading">7. Germantown, TN</h3>
                        <h3 class="heading">8. CORDOVA, TN</h3>
                        <h3 class="heading">9. Collierville, TN</h3>
                        <h3 class="heading">10. Eads, TN</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 d-flex services p-3 py-4 d-block">
                    <div class="media-body pl-4">
                        <h3 class="heading">11. Brunswick, TN</h3>
                        <h3 class="heading">12. Arlington, TN</h3>
                        <h3 class="heading">13. OLIVE BRANCH, TN</h3>
                        <h3 class="heading">14. Southaven, MS</h3>
                        <h3 class="heading">15. Horn Lake, MS</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h2 class="mb-4">Hours of Service </h2>
            <p>Our weekly time table</p>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                    <table class="table table-striped table-hover table-bordered " width="100%">
                        <thead>
                            <tr class="bg-info">
                                <th>Day of service</th>
                                <th>Hours of services</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td class="work-day">7:30 am - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td class="work-day">7:30 am - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td class="work-day">7:30 am - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td class="work-day">7:30 am - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td class="work-day">7:30 am - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td class="work-day">2:00 pm - 05:00 pm</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td class="sun-day">Closed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@include('/site/include/footer')