@if(count(latest_product()) > 0)
<div class="section carousel-iframe">
    <div class="container">
        <div class="row carousel-iframe bestseller-module">
            <div class="col-xs-12 col-sm-12">
                <h4 class="section-title">Produk Baru</h4>
                <div class="section-inner">
                    <div class="carousel-direction-arrows">
                        <ul class="direction-nav carousel-direction">
                            <li>
                                <a class="crsl-prev btn" href="#">
                                    <span class="icon-arrow-left8"></span>
                                </a>
                            </li>
                            <li>
                                <a class="crsl-next btn" href="#">
                                    <span class="icon-arrow-right8"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="carousel-wrapper row" data-minitems="1" data-maxitems="4" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
                        <ul class="products-container product-grid carousel-list portrait ">
                            @foreach(latest_product() as $key=>$myproduk)
                            <li>
                                <div class="product">
                                    <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                        <div class="product-thumbnail">
                                            {{HTML::image(product_image_url($myproduk->gambar1,'medium'),$myproduk->nama)}}
                                        </div>
                                    </a>
                                    
                                    <div class="product-info clearfix">
                                        <h4 class="title">
                                            <a href="{{product_url($myproduk)}}">{{ short_description($myproduk->nama,20) }}</a>
                                        </h4>
                                        @if($setting->checkoutType!=2)
                                        <div class="details">
                                            <div class="product-price"> 
                                                @if(!empty($myproduk->hargaCoret))
                                                <span class="price-old">{{price($myproduk->hargaCoret)}}</span>
                                                @endif
                                                <span class="price-new">{{price($myproduk->hargaJual)}}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="carousel-iframe">
    <div class="container">
        <div class="row carousel-iframe">
            <div class="col-xs-12 col-sm-12">
                <h4 class="section-title">Koleksi Produk</h4>
                <div class="section-inner">
                    <div class="carousel-direction-arrows">
                        <ul class="direction-nav carousel-direction">
                            <li>
                                <a class="crsl-prev btn" href="#">
                                    <span class="icon-arrow-left8"></span>
                                </a>
                            </li>
                            <li>
                                <a class="crsl-next btn" href="#">
                                    <span class="icon-arrow-right8"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="carousel-wrapper row" data-minitems="1" data-maxitems="4" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
                        <ul class="products-container product-grid carousel-list portrait ">
                            @foreach(home_product() as $key=>$myproduk)
                            <li>
                                <div class="product">
                                    <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                        @if(is_terlaris($myproduk))
                                            <div class="ribbon hot">Terlaris</div>
                                        @elseif(is_produkbaru($myproduk))
                                            <span class="ribbon new">Baru</span>
                                        @elseif(is_outstok($myproduk))
                                            <div class="ribbon empty">Kosong</div>
                                        @endif
                                        <div class="product-thumbnail">
                                            {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama)}}
                                        </div>
                                    </a>
                                    
                                    <div class="product-info clearfix">
                                        <h4 class="title">
                                            <a href="{{product_url($myproduk)}}">{{ short_description($myproduk->nama, 15) }}</a>
                                        </h4>
                                        <div class="details">
                                            <div class="product-price"> 
                                                @if(!empty($myproduk->hargaCoret))
                                                <span class="price-old">{{price($myproduk->hargaCoret)}}</span>
                                                @endif
                                                <span class="price-new">{{price($myproduk->hargaJual)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section carousel-iframe">
    <div class="container">
        <div class="row carousel-iframe banner-module">
            <div class="col-xs-12 col-sm-12">
                <div class="section-inner">
                    <div class="carousel-wrapper row">
                        <ul class="products-container product-grid carousel-list landscape">
                            @foreach(horizontal_banner() as $key=>$banner) 
                            @if($key == 0)
                            <li>
                                <a href="{{URL::to($banner->url)}}" class="product-link clearfix">
                                    {{HTML::image(banner_image_url($banner->gambar),'Info Promo')}}
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
