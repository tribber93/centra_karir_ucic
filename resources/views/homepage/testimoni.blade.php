<section id="testimonials" class="section testimonials">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Kata Alumni</h2>
                    {{-- <p>Continually network virtual strategic theme areas vis-a-vis ubiquitous potentialities.
                        Holisticly negotiate focused e-tailers without premium solutions. </p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-slider owl-carousel">
                    @foreach ($kata_alumni as $data)
                        <div class="single-testimonial">
                            {{-- <p>"{{ Str::limit($data->kutipan_alumni, 130) }}" </p> --}}
                            <div class="bottom">
                                {{-- <img src="{{ asset('assets/images/' . $data->alumni->image) }}" alt="#"> --}}
                                {{-- <h4 class="name">{{ $data->alumni->nama_alumni }}<span>--</span></h4> --}}
                            </div>
                        </div>
                    @endforeach





                </div>
            </div>
        </div>
    </div>
</section>
