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
            <a href="http://www.aau.dk/" target="_blank">Aalborg University</a><br>
            <a href="http://www.formulastudent.com/" target="_blank">Formula Student</a><br>
            <a href="http://students.sae.org/cds/formulaseries/" target="_blank">SAE International</a><br>
            <a href="https://www.facebook.com/AAURacing/" target="_blank">Find us on Facebook!</a><br>
            <a href="https://www.instagram.com/aau_racing/" target="_blank">Find us on Instagram!</a><br>
            <a href="wiki.aauracing.dk" target="_blank">AAU Racing Wiki</a><br>
        </div>
        <div class="col-md-3">
            <a href="http://www.aau.dk/" target="_blank"><img src="{{ asset('images/aau_logo.png') }}" height="140px"></a>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary btn-xs back-to-top">
                <a href="#">
                    <i class="fas fa-chevron-up"></i> Back to top
                </a>
            </button>
        </div>
    </div>
    <div class="bottom-footer">
        &copy; {{ now()->year }} AAU Racing
    </div>
</footer>
