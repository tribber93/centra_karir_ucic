@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')
    @include('admin.sidebar')

    <div class="padding">
        <div class="container mt-5">
            <div class="box p-4">
                <div class="list-item mb-3">
                    <div class="list-left">
                        <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                    </div>
                    <div class="list-body">
                        <h6>Bambang Legend</h6>
                        <small class="block text-muted">2 Jam yang lalu</small>
                        <br>
                        <h4>Loker Nih coy</h4>
                        <p>Kami sedang mencari seorang profesional berbakat untuk mengisi posisi IT Support di
                            perusahaan kami. Jika Anda memiliki pengalaman dan kualifikasi yang sesuai.</p>

                        <i class="material-icons md-24">
                            &#xe0b9;
                            <span ui-include="'../assets/images/i_0.svg'"></span>
                        </i>
                        <span class="m-l-sm">0 Komentar</span>
                    </div>
                </div>
            </div>
            <div class="box p-4">
                <h6>Tambah Komentar</h6>
                <div class="box m-b-md">
                    <div ui-jp="summernote"
                        ui-options="{
                        toolbar: [
                          ['style', ['bold', 'italic', 'underline', 'clear']],
                          ['color', ['color']],
                          ['para', ['ul', 'ol', 'paragraph']],
                          ['height', ['height']]
                        ]}">

                    </div>
                </div>
            </div>
            <div class="box p-4">
                <div class="list-item mb-3">
                    <div class="list-left">
                        <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                    </div>
                    <div class="list-body">
                        <h6>Bambang Legend</h6>
                        <small class="block text-muted">2 Jam yang lalu</small>
                        <br>
                        <p>Info Link Gan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
