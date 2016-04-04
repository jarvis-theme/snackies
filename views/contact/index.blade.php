<div id="site-wrapper">
    <div class="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Kontak Kami</li>
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
                    @if($kontak->alamat!='')
                    <div class="section  module-list-items">
                        <div class="widget widget-contact">
                            <h4 class="section-title">Kontak Kami</h4>
                            <div class="widget-inner iconlist">
                                <div class="media">
                                    <div class="pull-left">
                                        <i class="icon-location"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>{{$kontak->nama}}, <br/>{{$kontak->alamat}}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="pull-left">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>{{$kontak->telepon}}<br/>{{$kontak->hp}}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="pull-left">
                                        <i class="icon-mail6"></i>
                                    </div>
                                    <div class="media-body">
                                        <p><a href="mailto:{{$kontak->email}}">{{@$kontak->email}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="clearfix"></div>
                    <div class="section">
                        @foreach(vertical_banner() as $key=>$banner)
                        <div class="banner-show">
                            <a href="{{URL::to($banner->url)}}">
                                {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'100%'))}}
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section">
                        @if($kontak->lat!='0' || $kontak->lng!='0')
                            <iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                        @else
                            <iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq={{ $kontak->alamat }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12 main">
                        <div class="row">
                            <div class="section contact-inner">
                                <h4 class="section-title">Tanya Kami</h4>
                                <div class="section-inner">
                                    <div class="space20"></div>

                                    <form class="form-horizontal contact" action="{{URL::to('kontak')}}" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12">
                                                <input required name="namaKontak" id="contactName" type="text" class="form-control" id="inputName" name="name" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12">
                                                <input required name="emailKontak" id="email" type="text" class="form-control" id="inputEmail" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12">
                                                <textarea required class="form-control" name="messageKontak" placeholder="Isi pesan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="submit" class="btn btn-primary" value="Kirim">
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