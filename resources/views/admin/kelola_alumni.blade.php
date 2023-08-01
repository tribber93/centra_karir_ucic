@extends('layouts.user_admin')
@section('judul', 'Kelola Alumni')
@section('konten')

    {{-- @include('admin.sidebar') --}}


    <!-- ############ PAGE START-->
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Data Alumni</h2>
                <small>Make HTML tables on smaller devices look awesome</small>
            </div>
            <div class="box-body">
                Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
                <div class="m-2 float-right">
                    <a href="/admin/kelola_berita/tambah">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"></i> </span> Tambah Berita
                        </button>
                    </a>
                </div>
            </div>

            <div>
                <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                    <thead>
                        <tr>
                            <th data-toggle="true">
                                Judul
                            </th>
                            <th>
                                Publisher
                            </th>
                            <th data-hide="phone,tablet">
                                Job Title
                            </th>
                            <th data-hide="phone,tablet" data-name="Date Of Birth">
                                Tanggal Publish
                            </th>
                            <th data-hide="phone">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Isidra</td>
                            <td><a href>Boudreaux</a></td>
                            <td>Traffic Court Referee</td>
                            <td data-value="78025368997">22 Jun 1972</td>
                            <td>
                                <button type="button" class="btn btn-info"><span><i class="fa fa-edit"></i></span>
                                    Edit</button>
                                <button type="button" class="btn btn-danger"><span><i class="fa fa-remove"></i></span>
                                    Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Shona</td>
                            <td>Woldt</td>
                            <td><a href>Airline Transport Pilot</a></td>
                            <td data-value="370961043292">3 Oct 1981</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td>Granville</td>
                            <td>Leonardo</td>
                            <td>Business Services Sales Representative</td>
                            <td data-value="-22133780420">19 Apr 1969</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Easer</td>
                            <td>Dragoo</td>
                            <td>Drywall Stripper</td>
                            <td data-value="250833505574">13 Dec 1977</td>
                            <td data-value="1"><span class="label success" title="Active">Active</span></td>
                        </tr>
                        <tr>
                            <td>Maple</td>
                            <td>Halladay</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td data-value="694116650726">30 Dec 1991</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxine</td>
                            <td><a href>Woldt</a></td>
                            <td><a href>Business Services Sales Representative</a></td>
                            <td data-value="561440464855">17 Oct 1987</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td>Lorraine</td>
                            <td>Mcgaughy</td>
                            <td>Hemodialysis Technician</td>
                            <td data-value="437400551390">11 Nov 1983</td>
                            <td data-value="2"><span class="label" title="Disabled">Disabled</span></td>
                        </tr>
                        <tr>
                            <td>Lizzee</td>
                            <td><a href>Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td data-value="-257733999319">1 Nov 1961</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Judi</td>
                            <td>labeltt</td>
                            <td>Electrical Lineworker</td>
                            <td data-value="362134712000">23 Jun 1981</td>
                            <td data-value="1"><span class="label success" title="Active">Active</span></td>
                        </tr>
                        <tr>
                            <td>Lauri</td>
                            <td>Hyland</td>
                            <td>Blackjack Supervisor</td>
                            <td data-value="500874333932">15 Nov 1985</td>
                            <td data-value="3"><span class="label warning" title="Suspended">Suspended</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="hide-if-no-paging">
                        <tr>
                            <td colspan="5" class="text-center">
                                <ul class="pagination"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- ############ PAGE END-->

@endsection
