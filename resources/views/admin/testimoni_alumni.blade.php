@extends('layouts.user_admin')
@section('judul', 'Testimoni Alumni')
@section('konten')
<!-- ############ PAGE START-->
<div class="padding">
    <div class="box">
        <div class="box-header">
            <h2>Testimoni Alumni</h2>
        </div>
        <div class="box-body">
            Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r" />
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t">
                <thead>
                    <tr>
                        <th data-toggle="true">
                            No.
                        </th>
                        <th>
                            Nama
                        </th>
                        <th data-hide="phone,tablet">
                            NIM
                        </th>
                        <th data-hide="phone,tablet" data-name="Date Of Birth">
                            Angkatan
                        </th>
                        <th data-hide="phone,tablet" data-name="Date Of Birth">
                            Testimoni
                        </th>
                        <th data-hide="phone,tablet" data-name="Date Of Birth">
                            Status Testimoni
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($testimoni as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_alumni }}</td>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->angkatan }}</td>
                        <td>{{ $data->testimoni }}</td>
                        <td>{{ $data->status_testimoni == 0 || is_null($data->status_testimoni) ? 'non-aktif' : 'Aktif' }}</td>
                        <td data-value="3">
                            <button data-id="{{ $data->id }}" type="button" class="btn btn-danger detail-button" data-toggle="modal" data-target="#modal-{{ $data->id }}">Detail</button>

                            <!-- Modal for testimonial details -->
                            <div class="modal fade" id="modal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $data->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel-{{ $data->id }}">Detail Testimoni</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama Alumni:</strong> {{ $data->nama_alumni }}</p>
                                            <p><strong>NIM:</strong> {{ $data->nim }}</p>
                                            <p><strong>Angkatan:</strong> {{ $data->angkatan }}</p>
                                            <p><strong>Testimoni:</strong> {{ $data->testimoni }}</p>
                                            <div class="form-group">
                                                <label for="statusCheckbox{{$data->id}}">Status Testimoni:</label>
                                                <input type="checkbox" id="statusCheckbox{{$data->id}}" class="status-checkbox" data-id="{{ $data->id }}" {{ $data->status_testimoni == 1 ? 'checked' : '' }}>
                                                <span id="statusText{{$data->id}}">
                                                    {{ $data->status_testimoni == 1 ? 'Aktif' : 'Non-Aktif' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md" data-dismiss="modal" id="closeModalButton">Close</button>
                                        </div>

                                    </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $testimoni->links() }}
        </div>
    </div>
</div>
<!-- ############ PAGE END-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $('#closeModalButton').click(function() {
        // Reload the page
        location.reload();
    });
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $('.detail-button').click(function() {
            const testimonialId = $(this).data('id');
            $.ajax({
                url: `/admin/get-testimonial-detail/${testimonialId}`, // Update the URL
                type: 'GET',
                success: function(response) {
                    showDetailModal(response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        function showDetailModal(testimonial) {
            $('#detailNama').text(testimonial.nama_alumni);
            $('#detailNIM').text(testimonial.nim);
            $('#detailAngkatan').text(testimonial.angkatan);
            $('#detailTestimoni').text(testimonial.testimoni);
            $('#detailStatus').text(testimonial.status_testimoni == 0 || testimonial.status_testimoni == null ? 'non-aktif' : 'Aktif');
            $('#detailModal').modal('show');
        }
    });
    $('.status-checkbox').on('change', function() {
        const testimonialId = $(this).data('id');
        const newStatus = $(this).prop('checked') ? 1 : 0;
        console.log(newStatus);
        updateTestimonialStatus(testimonialId, newStatus);
        updateStatusText(testimonialId, newStatus);
    });

    function updateStatusText(testimonialId, newStatus) {
        const statusTextElement = $('#statusText' + testimonialId);
        statusTextElement.text(newStatus == 1 ? 'Aktif' : 'Non-Aktif');
    }
    function updateTestimonialStatus(testimonialId, newStatus) {
        // Implement your AJAX request to update the status on the server
        $.ajax({
            url: `/admin/update-testimonial-status/${testimonialId}`,
            type: 'POST',
            data: { status: newStatus },
            success: function(response) {
                console.log('Status updated successfully:', response);
        location.reload();

            },
            error: function(error) {
                console.error('Error updating status:', error);
            }
        });
    }
</script>

@endsection
