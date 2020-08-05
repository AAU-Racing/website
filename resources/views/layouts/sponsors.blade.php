@inject('sponsor_service', 'App\Services\SponsorService')

<div class="col-sm-3 container sponsor-container">
    <h4 class="text-center">
        Sponsors
    </h4>
    @foreach($sponsor_service->getActive() as $sponsor)
        <div class="row d-flex justify-content-center">
            <a href="{{ $sponsor->link }}">
                <img src="{{ $sponsor->getFirstMedia('logo')->getUrl() }}" class="sponsor-image" alt="{{ $sponsor->name }}"/>
            </a>
        </div>
    @endforeach
</div>
