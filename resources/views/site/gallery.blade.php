@include('/site/include/header')

<div class="hero-wrap" style="background-image: url('/storage/images/backgrounds/background4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Gallery</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Galleries</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-gallery">
    <div class="container">

        @foreach($galleries->chunk(4) as $gallery)
        <div class="d-md-flex">
            @foreach($gallery as $image)
            <a href="{{'/storage/'.$image->image_path}}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/storage/{{$image->image_path}});">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-search"></span>
                </div>
            </a>
            @endforeach
        </div>
        @endforeach
    </div>
</section>


@include('/site/include/footer')