@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')
    {{-- @include('admin.sidebar') --}}

    <div class="padding">
        <div class="container mt-5">
            <div class="box p-4">
                <div class="list-item mb-3">
                    <div class="list-left">
                        <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                    </div>
                    <div class="list-body">
                        <h6>{{ $diskusi->user->name }}</h6>
                        <small class="block text-muted">{{ $diskusi->created_at->diffForHumans() }}</small>
                        <br>
                        <h4>{{ $diskusi->judul }}</h4>
                        <p>{{ $diskusi->isi }} </p>
                        <i class="material-icons md-24">
                            &#xe0b9;
                            <span ui-include="'../assets/images/i_0.svg'"></span>
                        </i>
                        <span class="m-l-sm">{{ $dkC }} Komentar</span>
                    </div>
                    <form id="my-form" ui-jp="parsley">
                        <div class="box p-4">
                            <h6 data-id="{{ $diskusi->id }}">Tambah Komentar</h6>
                            <div class="form-group">
                                <div class="box m-b-md">
                                    <input type="text" name="isi" id="isi" required class="form-control"
                                        placeholder="Masukan isi Komentar">

                                </div>
                            </div>
                            <div class="dker p-a text-right">
                                <button type="button" onclick="handleFormSubmit()" class="btn info">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            @foreach ($dk as $data)
                <div class="box p-4">
                    <div class="list-item mb-3">
                        <div class="list-left">
                            <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                        </div>
                        <div class="list-body">
                            <h6>{{ $data->user->name }}</h6>
                            <small class="block text-muted">{{ $data->created_at->diffForHumans() }}</small>
                            <br>
                            <p>{{ $data->isi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>






    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': getCsrfToken()
            }
        });


        function handleFormSubmit() {
            const isiValue = $('#isi').val();
            const h6Element = document.querySelector('h6[data-id]');
            const dataIdValue = h6Element.getAttribute('data-id');
            // Menggabungkan nilai input field ke dalam variabel formData
            const formData = {
                diskusiId: dataIdValue,
                isi: isiValue
            };

            // Menggunakan jQuery AJAX untuk mengirimkan data ke server
            $.ajax({
                url: `/posting-komentar-byID/${dataIdValue}`, // Perbaikan tanda kutip disini
                type: 'POST',
                headers: {
                    'X-CSRF-Token': getCsrfToken()
                },
                data: JSON.stringify({
                    data: formData
                }),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log('Data berhasil disimpan ke tabel.');
                        location.reload();
                    }
                },
                error: function(error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });
        }

        function getCsrfToken() {
            return $('meta[name="csrf-token"]').attr('content');
        }
    </script>




@endsection
