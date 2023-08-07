@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')

    {{-- @include('alumni.sidebar') --}}
    <div class="container mt-4">
        <h1 class="text-center">Forum Diskusi</h1>
        {{-- <form ui-jp="parsley" method="post" action="posting-diskusi"> --}}
            <form id="my-form" ui-jp="parsley">
            <div class="box m-3">
                <div class="box-header">
                    <h2>Buat diskusi baru</h2>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Diskusi</label>
                        <input type="text" name="judul" id="judul" required class="form-control" placeholder="Masukan Judul Diskusi">

                    <div class="form-group">
                        <div class="box m-b-md">
                            <label>Isi Diskusi</label>
                            <input type="text" name="isi" id="isi" required class="form-control" placeholder="Masukan isi Diskusi">

                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dker p-a text-right">
                    <button type="button" onclick="handleFormSubmit()" class="btn info">Submit</button>
                </div>
            </div>
        </form>
        <div class="justify-content-center g-2">
            @foreach ($diskusi as $data )

                <div class="list box">

                    <div class="list-item mb-3">
                        <div class="list-left">
                            <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                        </div>
                        <div class="list-body">

                            <h6>{{$data->user->name}}</h6>
                            <small class="block text-muted">{{$data->created_at->diffForHumans()}}</small>
                            <br>
                            <a href="#">
                                <h4>{{$data->judul}}</h4>
                            </a>
                            <p>{{$data->isi}}</p>
                            <a href="/komentar/forum_diskusi/{{$data->id}}">
                            <i class="material-icons md-24">
                                &#xe0b9;
                                <span ui-include="'../assets/images/i_0.svg'"></span>
                            </i>
                            <span class="m-l-sm">{{ $jumlahKomentarPerDiskusi[$data->id] }}</span>
                            </a>

                        </div>
                    </div>


                </div>
                @endforeach

        </div>
        <script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': getCsrfToken()
    }
});


function handleFormSubmit() {
    // Mendapatkan nilai dari masing-masing input field
    const judulValue = $('#judul').val();
    const isiValue = $('#isi').val();

    // Menggabungkan nilai input field ke dalam variabel formData
    const formData = {
      judul: judulValue,
      isi: isiValue
    };

    // Menggunakan jQuery AJAX untuk mengirimkan data ke server
    $.ajax({
      url: '/posting-diskusi',
      type: 'POST',
      headers: {
        'X-CSRF-Token': getCsrfToken()
      },
      data: JSON.stringify({ data: formData }),
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
