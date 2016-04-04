<div class="breadcrumbs-wrapper">
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="breadcrumbs">
                <ul class="unstyled">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="{{URL::to('member')}}">Member</a></li>
                    <li class="active">Lupa Password</li>
                    <br>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12 main">
                <div class="section">
                    <form class="form-horizontal col-lg-6 col-lg-offset-3" action="{{URL::to('member/forgetpassword')}}" method="post">
                        <h2>Lupa Password</h2>
                        <p>Silahkan masukan email anda untuk mengubah password lama anda.</p>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="recoveryEmail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-default" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
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