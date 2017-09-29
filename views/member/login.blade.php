<div class="breadcrumbs-wrapper">
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="breadcrumbs">
                <ul class="unstyled">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="active">Login</li>
                    <br>
                </ul>
            </div>
        </div>
    </div>
</div>
    
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-9 main">
                <div class="section">
                    <p>Silahkan Login untuk menikmati kemudahan dalam berbelanja. Cepat dan Mudah dalam bertransaksi. Mudah untuk mengetahui Riwayat Pemesanan dan Status Pemesanan produk.</p>
                    <form class="form-horizontal col-sm-7 login-form" action="{{URL::to('member/login')}}" method="post" enctype="multipart/form-data">
                        <h2>Login</h2>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-3 control-label">Email</label>
                            <div class="col-lg-10 col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{Input::old('email')}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-3 control-label">Password</label>
                            <div class="col-lg-10 col-sm-9">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-sm-9 col-lg-offset-2 col-sm-offset-3">
                                <small><a href="{{URL::to('member/forget-password')}}">Lupa Password ?</a></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-sm-9 col-lg-offset-2 col-sm-offset-3">
                                <button class="btn btn-default" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <hr>
                    <small>Belum punya akun {{Theme::place('title')}}? <a href="{{url('member/create')}}">Daftar sekarang</a> untuk mendapatkan banyak keuntungan.</small>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
                <div class="section">
                    @foreach(vertical_banner() as $key=>$banner)
                    <div class="banner-show">
                        <a href="{{URL::to($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar),'Info Promo')}}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>