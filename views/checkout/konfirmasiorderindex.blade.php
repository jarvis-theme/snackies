<div id="site-wrapper">
    <br>
    <div class="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Konfirmasi</li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12 main">
                    <div class="section carousel-iframe">
                        <div class="container">
                            <div class="row carousel-iframe offer">
                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                    <h4 class="section-title">Konfirmasi Pembayaran</h4>
                                    <div class="section">
                                        <p>Silakan masukkan kode order yang mau anda cari!</p>
                                        {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-horizontal contact'))}}
                                            <div class="form-group">
                                                <div class="col-xs-12 col-sm-12 col-md-9">
                                                    <input type="text" class="form-control" placeholder="Kode Order" name="kodeorder" placeholder="Nama" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn theme"><i class="icon-check"></i> Cari Kode</button>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                    <div class="cat-image">
                    @foreach(horizontal_banner() as $key=>$banner)
                        <a href="{{URL::to($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'100%'))}}
                        </a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>