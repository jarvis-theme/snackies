<div class="breadcrumbs-wrapper">
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="breadcrumbs">
                <ul class="unstyled">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="active">Update Password</li>
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
                    {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal col-lg-6 col-lg-offset-3'))}}
                        <h2>Update Password</h2>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ulang Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button class="btn btn-default" type="submit">Simpan</button>
                            </div>
                        </div>
                    {{Form::close()}}
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