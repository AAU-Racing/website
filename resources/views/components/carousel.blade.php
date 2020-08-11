@if($slides->count() > 0)
    <div id="page_carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slides as $slide)
                <li data-target="#page_carousel" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slides->getAll() as $slide)
                <div class="carousel-item  @if($loop->first) active @endif">
                    <img class="d-block w-100" src="{{ $slide->getFirstMedia('photos')->getUrl() }}" alt="{{ $slide->label }}">
                    <div class="carousel-image-caption d-none d-md-block">
                        {{ $slide->label }}
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#page_carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#page_carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Next') }}</span>
        </a>
    </div>
@endif
