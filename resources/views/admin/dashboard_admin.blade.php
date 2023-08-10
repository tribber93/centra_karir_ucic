@extends('layouts.user_admin') @section('judul', 'Admin Dashboard')
@section('konten')

    <!-- ############ PAGE START-->
    <div class="p-a white lt box-shadow">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0 _300">Sentra Karir</h4>
                <small class="text-muted">Universitas Catur Insan Cendekia </small>
            </div>
        </div>
    </div>
    <div class="padding">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded accent">
                            <i class="material-icons">&#xe151;</i>
                        </span>
                    </div>
                    {{-- pp --}}
                    <div class="clear">
                        <h4 class="m-0 text-lg _300">
                            <a href>{{ $tracer }}
                                <span class="text-sm">Tracers baru</span></a>
                        </h4>
                        <small class="text-muted">{{ $tracer_lama }} Tracer lama</small>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="box p-a">
                    <div class="pull-left m-r">
                        <span class="w-48 rounded primary">
                            <i class="material-icons">&#xe8d3;</i>
                        </span>
                    </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300">
                            <a href>{{ $h_user }} <span class="text-sm">User</span></a>
                        </h4>
                        <small class="text-muted">Alumni Data</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="box">
                    <div class="box-header">
                        <h2>Perbandingan Alumni</h2>
                        <small>Chart perbandingan alumni sudah bekerja dan belum bekerja</small>
                    </div>
                    <div class="box-body">
                        <div ui-jp="chart"
                            ui-options=" {
                                tooltip : {
                                    trigger: 'axis'
                                },
                                legend: {
                                    data:['Sudah bekerja','Belum bekerja']
                                },
                            xAxis : [
                                {
                                    type : 'category',
                                    data : {{ $prodi }}
                                }
                            ],
                            yAxis : [
                                {
                                    type : 'value'
                                }
                            ],
                            series : [
                                {
                                    name:'Sudah bekerja',
                                    type:'bar',
                                    data:[{{ implode(', ', $sudah_kerja) }}],
                                },
                                {
                                    name:'Belum bekerja',
                                    type:'bar',
                                    data:[{{ implode(', ', $belum_kerja) }}],
                                    
                                }
                            ]
                          }"
                            style="height: 300px"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="box">
                    <div class="box-header">
                        <h2>Jumlah Alumni per Prodi</h2>
                        {{-- <small class="block text-muted">set center, radius</small> --}}
                    </div>
                    <div class="box-body">
                        <div ui-jp="chart"
                            ui-options=" {
                      tooltip : {
                          trigger: 'item',
                          {{-- formatter: '{a} <br/>{b} : {c} ({d}%)' --}}
                      },
                      legend: {
                          orient : 'vertical',
                          x : 'left',
                          data:{{ $prodi }}
                      },
                      series : [
                          {
                              name:'Source',
                              type:'pie',
                              radius : '55%',
                              center: ['50%', '60%'],
                              data:[
                                @for ($i = 0; $i < count($prodi) ; $i++)
{value:{{ $alumni_perprodi[$i] }}, name:'{{ $prodi[$i] }}'}, @endfor
                              ]
                          }
                      ]
                    }"
                            style="height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ############ PAGE END-->

@endsection
