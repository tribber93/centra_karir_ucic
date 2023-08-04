<section class="info section" id="info">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-12">
                <div class="section-title">
                    <h2>Berita</h2>
                </div>
            </div>
            <div class="col-6 col-md-12 mt-2 mt-md-0 mb-5">
                <a href="{{ url('berita') }}">
                    <button class="cta pe-lg-0 pe-5">
                        <span class="hover-underline-animation"> Lainnya </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg"
                            id="arrow-horizontal">
                            <path transform="translate(30)"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </div>

        <div class="row d-flex justify-content-center flex-row-reverse">
            @foreach ($informasi as $info)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="post-container">
                        <div class="post">
                            <div class="header_post">
                                <img src="https://images.pexels.com/photos/2529973/pexels-photo-2529973.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                    alt="">
                            </div>
                            <a href="{{ url('/detail-berita') }}">
                                <div class="body_post">
                                    <div class="post_content">

                                        <h1>{{ $info->judul }}</h1>
                                        {!! $info->konten !!}

                                        <div class="container_infos">
                                            <div class="postedBy">
                                                <span>Published</span>
                                                Kamis, 30 Maret 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            @endforeach
        </div>
    </div>
</section>
