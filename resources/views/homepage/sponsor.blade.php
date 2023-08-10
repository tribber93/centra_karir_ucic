<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Partner Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="brand-slider">
                    @foreach ($partner as $p)
                        <div class="slingle-brand">
                            <img src="{{ asset($p->logo_partner) }}" alt="#">
                        </div>
                    @endforeach

                    <div class="slingle-brand">
                        <img src="img/02.png" alt="#">
                    </div>
                    <div class="slingle-brand">
                        <img src="img/03.png" alt="#">
                    </div>
                    <div class="slingle-brand active">
                        <img src="img/04.png" alt="#">
                    </div>
                </div>
                <!-- Add Arrows -->
            </div>
        </div>
    </div>
</div>
