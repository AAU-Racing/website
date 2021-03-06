<footer>
    {{-- TODO: Fix responsiveness --}}
    <div class="top-footer row">
        <div class="col-md-3">
            AAU Racing
            <div>
                <div class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="footer-contact-text">
                    Aalborg University<br>
                    Fibigerstræde 16<br>
                    9220 Aalborg Øst<br>
                    Denmark
                </div>
            </div>
            <div>
                <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                <div class="footer-contact-text"><a href="mailto:contact@aauracing.dk">contact@aauracing.dk</a></div>
            </div>
        </div>
        <div class="col-md-3">
            Links:<br>
            @foreach($footer_links as $footer_link)
                <a href="{{ $footer_link->path }}" target="{{ $footer_link->target }}">{{ $footer_link->name }}</a><br>
            @endforeach
        </div>
        <div class="col-md-3">
            <a href="http://www.aau.dk/" target="_blank"><img src="{{ asset('images/aau_logo.png') }}" height="140px"></a>
        </div>
        <div class="col-md-3 right-col">
            <button type="button" class="btn btn-aau btn-xs back-to-top">
                <a href="#">
                    <i class="fas fa-chevron-up"></i> Back to top
                </a>
            </button>
            <div class="team-member-footer">
                @guest
                    <a href="{{ route('login') }}">Team login</a>
                @else
                    <a href="{{ route('admin::home') }}">Team page</a>
                @endguest
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        &copy; {{ now()->year }} AAU Racing
    </div>
</footer>
