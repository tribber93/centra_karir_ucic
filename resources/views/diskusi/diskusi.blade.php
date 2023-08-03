<div class="container mt-4">
    <h1 class="text-center">Forum Diskusi</h1>
    <form ui-jp="parsley">
        <div class="box m-3">
            <div class="box-header">
                <h2>Buat diskusi baru</h2>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Judul Diskusi</label>
                    <input type="url" required class="form-control" placeholder="Masukan Judul Diskusi">
                </div>
                <div class="form-group">
                    <div class="box m-b-md">
                        <div ui-jp="summernote">
                        </div>
                    </div>
                </div>
            </div>
            <div class="dker p-a text-right">
                <button type="submit" class="btn info">Submit</button>
            </div>
        </div>
    </form>
    <div class="row justify-content-center g-2">
        <div class="col-3">
            <form class="row d-flex">
                <input class="form-control me-2 col-12 col-md" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary col-12 col-md" type="submit">Cari diskusi</button>
            </form>
        </div>
        <div class="col-8">
            <div class="list box">
                <?php
                    for($i=0;$i<4;$i++){
                ?>
                <div class="list-item mb-3">
                    <div class="list-left">
                        <img src="{{ asset('admin/css/images/a0.jpg') }}" class="w-40 circle">
                    </div>
                    <div class="list-body">
                        <h6>Bambang Legend</h6>
                        <small class="block text-muted">2 Jam yang lalu</small>
                        <br>
                        <a href="#">
                            <h4>Loker Nih coy</h4>
                        </a>
                        <p>Kami sedang mencari seorang profesional berbakat untuk mengisi posisi IT Support di
                            perusahaan kami. Jika Anda memiliki pengalaman dan kualifikasi yang sesuai.</p>
                        @if (Auth::user()->role == 'admin')
                            <a href="/admin/forum_diskusi/id">
                            @else
                                <a href="/alumni/forum_diskusi/id">
                        @endif
                        <i class="material-icons md-24">
                            &#xe0b9;
                            <span ui-include="'../assets/images/i_0.svg'"></span>
                        </i>
                        <span class="m-l-sm">0 Komentar</span>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
