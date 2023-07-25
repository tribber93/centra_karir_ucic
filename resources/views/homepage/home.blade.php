@extends('layouts.master')
@section('judul', 'Centra Karir | UCIC')
@section('konten')
    {{-- @include('components.preloader') --}}
    @include('homepage.navbar')
    @include('homepage.slider')
    <section id='my-menu' class="section my-menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center gap-4">
                <div class="col-lg-3 col-md-5 col-9">
                    <div class="card">
                        <div class="row d-flex align-items-center p-2">
                            <div class="col-3 ">
                                <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title"><strong>Lowongan Kerja</strong></h5>
                                <p class="card-text">Pusat Pengembangan Karir dan Alumni UCIC</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-9">
                    <div class="card">
                        <div class="row d-flex align-items-center p-2">
                            <div class="col-3 ">
                                <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title"><strong>Lowongan Kerja</strong></h5>
                                <p class="card-text">Pusat Pengembangan Karir dan Alumni UCIC</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-9">
                    <div class="card">
                        <div class="row d-flex align-items-center p-2">
                            <div class="col-3 ">
                                <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title"><strong>Lowongan Kerja</strong></h5>
                                <p class="card-text">Pusat Pengembangan Karir dan Alumni UCIC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>





    @include('homepage.berita')
    @include('homepage.testimoni')
    @include('homepage.sponsor')
    <!--Footer start-->
    @include('components.footer')
    <!--Footer end-->
@endsection
