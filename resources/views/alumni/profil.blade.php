@extends('layouts.user_admin')
@section('judul', 'Forum Diskusi')
@section('konten')
    <div class="container m-3">
        <div class="box">
            <form action="">
                <div class="box-header">
                    <h2>Data Alumni</h2>
                </div>

                <table class="table table-striped b-t">
                    <thead>
                        <img class="p-4" src="https://upload.wikimedia.org/wikipedia/commons/2/24/Circle-icons-image.svg"
                            alt="" height="200px">
                        <input type="file" id="exampleInputFile" class="form-control">
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->nama_alumni }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Angkatan</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->angkatan }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Jenjang</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->jenjang }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->prodi }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->nim }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Tahun Lulus</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->tahun_lulus }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Total Tracer</td>
                            <td>:</td>
                            <td colspan="5">{{ $alumni->total_tracer }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td colspan="5">
                                <input type="text" id="noTelp" value="{{ $alumni->no_telpon }}" name="noTelp"
                                    class="form-control" placeholder="{{ $alumni->no_telpon }}">
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Testimoni</td>
                            <td>:</td>
                            <td colspan="5">
                                <input type="text" id="testimoniAlumni" name="testimoniAlumni" class="form-control"">
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group row justify-content-end p-3">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
