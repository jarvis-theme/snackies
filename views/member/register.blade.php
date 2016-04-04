<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Register</li>
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
                        {{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal col-lg-9 col-lg-offset-3'))}}
                            <h1 class="center">Daftar Member</h1>
                            <hr>
                            <h2>Data Diri</h2>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Nama</label>
                                <div class="col-sm-10">
                                    <Input type="text" class="form-control" name="nama" value="{{Input::old('nama')}}" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Email</label>
                                <div class="col-sm-10">
                                    <Input type="email" class="form-control" name="email" value="{{Input::old('email')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Telepon</label>
                                <div class="col-sm-10">
                                    <Input type="number" class="form-control" name="telp" value="{{Input::old('telp')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="{{Input::old('nama')}}" required>
                                </div>
                            </div>
                            <hr>
                            <h2>Alamat</h2>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" required>{{Input::old('alamat')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Kode Pos</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="kodepos" value="{{Input::old('kodepos')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Negara</label>
                                <div class="col-sm-10">
                                    {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, Input::old("negara"), array('required', 'name'=>"negara", 'id'=>"negara", 'data-rel'=>"chosen", 'class' => 'form-control'))}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Provinsi</label>
                                <div class="col-sm-10">
                                    {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, Input::old("provinsi"), array('required', 'name'=>"provinsi", 'id'=>"provinsi", 'data-rel'=>"chosen", 'class' => 'form-control'))}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span class="required">*</span> Kabupaten</label>
                                <div class="col-sm-10">
                                    {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, Input::old("kota"), array('required name'=>"kota", 'id'=>"kota", 'data-rel'=>"chosen", 'class' => 'form-control'))}}
                                </div>
                            </div>
                            <hr>
                            <h2>Password</h2>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span class="required">*</span> Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span class="required">*</span> Ulang Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><span class="required">*</span> Kode Keamanan</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            {{ HTML::image(Captcha::img(), 'Captcha image') }}
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="captcha" placeholder="Masukan kode" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <input type="checkbox" name="readme" value="1" required checked>&nbsp;&nbsp;Saya telah membaca dan menyetujui <a class="colorbox cboxElement" href="{{URL::to('service')}}" alt="Privacy Policy" target="_blank"><b>Syarat & Ketentuan</b></a> yang ada di {{Theme::place('title')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <button class="btn btn-default" type="submit">Daftar</button>
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>