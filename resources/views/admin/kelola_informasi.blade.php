@extends('layouts.user_admin')
@section('judul', 'Kelola Berita')
@section('konten')

    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Kelola Informasi (Berita/Lowongan)</h2>
                {{-- <small>Make HTML tables on smaller devices look awesome</small> --}}
            </div>
            <div class="box-body">
                Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
                <div class="m-2 float-right">
                    <a href="/admin/kelola_informasi/tambah">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"></i> </span> Tambah Informasi
                        </button>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t">
                    <thead>
                        <tr>
                            <th data-toggle="true">
                                Penulis
                            </th>
                            <th>
                                Judul
                            </th>
                            <th data-hide="phone,tablet">
                                Jenis Informasi
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Kategori
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Dibuat pada
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Diperbarui pada
                            </th>
                            <th data-hide="phone">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infos as $info)
                            <tr>
                                <td>{{ $info->penulis }}</td>
                                <td>{{ $info->judul }}</td>
                                <td>{{ $info->jenis_informasi }}</td>
                                <td>{{ $info->kategori }}</td>
                                <td>{{ $info->created_at }}</td>
                                <td>{{ $info->updated_at }}</td>
                                <td data-value="3">
                                    <a href="/admin/kelola_informasi/edit/{{ $info->id }}">
                                        <button type="button" class="btn btn-info"><span><i class="fa fa-edit"></i></span>
                                            Edit</button>
                                    </a>
                                    <a href="/admin/kelola_informasi/delete/{{ $info->id }}">
                                        <button type="button" class="btn btn-danger"><span><i
                                                    class="fa fa-remove"></i></span>
                                            Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="dker p-a">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Bulk action</option>
                            <option value="1">Delete selected</option>
                            <option value="2">Bulk edit</option>
                            <option value="3">Export</option>
                        </select>
                        <button class="btn btn-sm white">Apply</button>
                    </div>
                    <div class="col-sm-4 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-0">
                            <li><a href><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href>1</a></li>
                            <li><a href>2</a></li>
                            <li><a href>3</a></li>
                            <li><a href>4</a></li>
                            <li><a href>5</a></li>
                            <li><a href><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- ############ PAGE END-->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                // Konfigurasi Summernote lainnya...
            });

            // Handle form submission
            $('form').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                var kontenValue = $('#summernote').summernote('code'); // Get Summernote content
                $('textarea[name="isi"]').val(kontenValue); // Set the textarea value
                console.log(kontenValue); // View content in console
                this.submit(); // Submit the form
            });
        });
    </script>

@endsection
