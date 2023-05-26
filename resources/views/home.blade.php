@extends('layouts.master')
@section('judul', 'Centra Karir | UCIC')
@section('konten')
    {{-- @include('components.preloader') --}}
    @include('components.navbar')
    @include('components.slider')
    <div class="my-menu p-3">
        <div class="row align-items-center justify-content-center gap-5">
            <div class="col-lg-3 col-md-5 col-9">
                <a href="#">
                    <div class="my-button-menu card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-3 ">
                                    <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title">Lowongan Kerja</h5>
                                    <p class="card-text">Pusat Pengembangan Karir dan Alumni UCIC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-9">
                <a href="#">
                    <div class="my-button-menu card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-3 ">
                                    <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title">Lowongan Kerja</h5>
                                    <p class="card-text">Partner Platform Pencari Kerja</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-9">
                <a href="#">
                    <div class="my-button-menu card">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-3 ">
                                    <img src="assets/icons/job-seeker.png" alt="" width="75" height="75">
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title">Lowongan Kerja</h5>
                                    <p class="card-text">Partner Platform Pencari Kerja</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


    @include('components.info')
    @include('components.testimoni')
    @include('components.sponsor')
    <!--Footer start-->
    <section id="footer" class="section footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 mb-4">
                    <div class="">
                        <div class="footer-logo mb-5">
                            <a href="/home"><img src="assets/images/cic.png" alt="#"></a>
                        </div>
                        <div class="contact-info">
                            <p>
                                Jl. Kesambi No.202, Drajat, Kesambi, Kota Cirebon, Jawa Barat 45133
                            </p>
                        </div>
                        <p>
                            Telephone : 0231-200418
                        </p>
                        <p>
                            Info PMB : 089512314188
                        </p>
                        <p>
                            Email : <a href="mailto:info@cic.ac.id">info@cic.ac.id</a>
                        </p>
                        <ul class="footer-social">
                            <li>
                                <a href="https://www.instagram.com/universitas_cic/" target="_blank">
                                    <i class="lni lni-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/universitas-catur-insan-cendekia/"
                                    target="_blank"><i class="lni lni-linkedin-original"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="footer-logo">
                        <a href="index.html"><img src="img/logo.png" alt="#"></a>
                    </div>
                    <div class="contact-info">
                        <p>
                            Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu, homero alterum.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-footer f-link">
                        <h5>Quick menu</h5>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about-us">About Us</a></li>
                            <li><a href="#pricing">Pricing</a></li>
                            <li><a href="#services">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center copyright">2020 Your Copyright Content</p>
                </div>
            </div>
        </div>
    </section>
    <!--Footer end-->
@endsection
