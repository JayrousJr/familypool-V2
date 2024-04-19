@include('site/include/header')

<!-- END nav -->

<div class="hero-wrap" style="background-image: url('/storage/images/backgrounds/background4.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact
                    Us</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section contact-section ftco-degree-bg bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">Contact Information</h2>
            </div>
            <div class="col-md-4">
                <p class="blockquote-footer"><span><strong>Address:</strong></span> 7420 DONCASTER
                    LANE,<br>38125 MEMPHIS - TENESSEE, USA.</p>
            </div>
            <div class="col-md-3">
                <p class="blockquote-footer"><span><strong>Phone:</strong></span> <a href="tel:+19012977812">+1
                        901 297 7812</a></p>
            </div>
            <div class="col-md-4">
                <p class="blockquote-footer"><span><strong>Email:</strong></span>
                    <a href="mailto:familypoolservice2020@gmail.com">familypoolservice2020@gmail.com</a>
                </p>
            </div>

        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <p>Our Customer support and account management teams provides the best services in the industry.
                    We're passionate about our services as well as our customers and it shows in the level of
                    services that we provide. We're always happy to help find the solution for your needs. If a
                    solution doesn't already exist, we'll create a new solution that resolves your issue</p>
            </div>
        </div>
        <div class="row block-9" id="section">
            <div class="col-md-6 pr-md-5">
                @if(session('message'))
                <div class="success" id="message">
                    {{@session('message')}}
                </div>
                @endif
                <h4 class="mb-4">Send us message here!</h4>
                <form action="{{'send'}}" method="post" id="form" name="form" novalidate>
                    @csrf
                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="name" id="inputFloating" placeholder="00000000"
                                    class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                <label for="inputFloating">Full Name </label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" id="inputFloating" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                <label for="inputFloating">Email </label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3 gy-2 align-items-center mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="subject" id="inputFloating" placeholder="Subject"
                                    class="form-control @error('subject') is-invalid @enderror"
                                    value="{{old('subject')}}">
                                <label for="inputFloating">Subjet </label>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating txtlabel">
                                <textarea name="message" class="form-control  @error('name') is-invalid @enderror"
                                    id="inputFloating" style="height: 100px;"
                                    placeholder="Message">{{old('message')}}</textarea>
                                <label for="inputFloating">Describe your service</label>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary py-3 px-5" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6" id="">
                <!-- ##### Google Maps ##### -->
                <div id="googleMap">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="377px" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=7420%20doncaster%20lane&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('/site/include/footer')