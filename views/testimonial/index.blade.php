<div id="site-wrapper">
    <br>
    <div class="breadcrumbs-wrapper">
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="breadcrumbs">
                        <ul class="unstyled">
                            <li><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="active">Testimonial</li>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-3 pull-left sidebar">
                    <div class="section">
                        @foreach(vertical_banner() as $key=>$banner)
                        <div class="banner-show">
                            <a href="{{URL::to($banner->url)}}">
                                {{ HTML::image(banner_image_url($banner->gambar),'Info Promo') }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section">
                        <div class="testimonials accordion">
                            @foreach(list_testimonial() as $key=>$value)
                            <div class="user">
                                <span class="text-bold">
                                    <i class="icon-compose"></i><h5 class="name">{{ $value->nama }}</h5><br>
                                    &#187;&nbsp;{{ $value->isi }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">{{ list_testimonial()->links() }}</div>
                        </div>
                    </div>
                    <div class="section carousel-iframe">
                        <div class="container">
                            <div class="row carousel-iframe offer">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="section-title">Buat Testimonial</h4>
                                    <div class="section">
                                        <form class="form-horizontal contact" action="{{URL::to('testimoni')}}" method="post">
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <input name="nama" type="text" class="form-control" id="inputName" name="nama" placeholder="Nama" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <textarea class="form-control" name="testimonial" placeholder="Testimonial" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12">
                                                    <input name="submit" type="submit" class="btn btn-primary" value="Kirim Testimonial">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>