@extends('layouts.user_admin')
@section('judul', 'Edit Informasi')
@section('konten')
    <!-- ############ PAGE START-->

    <div class="padding">
        <h3>Edit Informasi</h3>
        <br>
        <form class="p-x-xs" method="POST" action="/admin/kelola_informasi/edit/{{ $informasi->id }}"
            enctype="multipart/form-data">
            @csrf <!-- Add this line to include CSRF token -->


            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" value="{{ $informasi->judul }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Jenis Informasi</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jenis_informasi">
                        <option value="lowongan">Lowongan</option>
                        <option value="berita" @if ($informasi->jenis_informasi == 'berita') selected @endif>Berita</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kategori" value="{{ $informasi->kategori }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Gambar</label>
                <div class="col-sm-10">
                    <div class="form-file">
                        <input type="file" name="gambarInformasi" value="{{ $informasi->gambar }}">
                        <button class="btn white">Select file ...</button>
                    </div>
                </div>
            </div>
            {{-- {{ $informasi->gambar }} --}}
            <div class="box m-b-md">
                <textarea ui-jp="summernote" name="konten" id="summernote">
                    {{ $informasi->konten }}
                </textarea>

            </div>

            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                // Konfigurasi Summernote lainnya...
            });

            // Handle form submission
            $('form').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                var kontenValue = $('#summernote').summernote('code'); // Get Summernote content
                $('textarea[name="konten"]').val(kontenValue); // Set the textarea value
                console.log(kontenValue); // View content in console
                this.submit(); // Submit the form
            });
        });
    </script>

    <!-- ############ PAGE END-->
@endsection
