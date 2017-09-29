<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{URL::to('member')}}">Member</a></li>
                        <li class="active">My Profile</li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-lg-3 pull-left sidebar">
                    <div class="accordionmenu section">
                        <h4 class="section-title">My Account</h4>
                        <div class="section-inner">
                            <a class="product-link clearfix" href="{{URL::to('member')}}">Order History</a>
                            <span class="product-link clearfix active">Profil Information</span>
                        </div>
                    </div>

                    <div class="section carousel-iframe">
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
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section">
                    {{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
                        <h2>Informasi Umum</h2>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Nama:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{$user->nama}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Telepon:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="telp" value="{{$user->telp}}" required>
                            </div>
                        </div>
                        <h2>Informasi Alamat</h2>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Alamat:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat" rows="3" required>{{$user->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span id="postcode-required" class="required">*</span>  Kode Pos:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="kodepos" value="{{$user->kodepos}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Negara</label>
                            <div class="col-sm-9">
                                {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara','class'=>'col-lg-7 col-xs-12'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Provinsi</label>
                            <div class="col-sm-9">
                                {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi','class'=>'col-lg-7 col-xs-12'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Kota</label>
                            <div class="col-sm-9">
                                {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota','class'=>'col-lg-7 col-xs-12'))}}
                            </div>
                        </div>
                        <h2>Ganti Password</h2>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Password Lama:</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="oldpassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Password Baru:</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span class="required">*</span> Ulang Password Baru:</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <button class="btn btn-default" type="submit">Simpan</button>
                            </div>
                        </div>
                    {{Form::close()}}
                    </div>
                </div>
            <!-- MAIN CONTENT -->
        </div>
    </div>
</div>
<!-- /SITE CONTENT -->