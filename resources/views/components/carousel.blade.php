@inject('slider_service', 'App\Services\CarouselSlideService')

<div id="page_carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#page_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#page_carousel" data-slide-to="1"></li>
        <li data-target="#page_carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://aauracing.dk/media/carousel/O48A77542.jpg">
            <div class="carousel-image-caption d-none d-md-block">
                Motorshow 2017
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://aauracing.dk/media/carousel/2.jpg">
            <div class="carousel-image-caption d-none d-md-block">
                FSN
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://aauracing.dk/media/carousel/5.jpg">
            <div class="carousel-image-caption d-none d-md-block">
                FSN
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#page_carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#page_carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>