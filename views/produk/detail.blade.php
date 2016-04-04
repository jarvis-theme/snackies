    <br>
    <div class="breadcrumbs-wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{URL::to('produk')}}">Produk</a></li>
                        <li><span>{{$produk->nama}}</span></li>
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
                    @if(count(list_category()) > 0)
                    <div class="accordionmenu section widgets">
                        <h4 class="section-title">Kategori</h4>
                        <div class="accordion">
                            @foreach(list_category() as $side_menu)
                            @if($side_menu->parent == '0')
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    @if(count($side_menu->anak) >= 1)
                                    <a href="{{category_url($side_menu)}}"><span class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}"></span>
                                    @else
                                    <a class="collapsed" href="{{category_url($side_menu)}}">
                                    @endif  
                                        {{$side_menu->nama}}
                                    </a>
                                </div>
                                @if($side_menu->anak->count() != 0)
                                <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}" class="accordion-body collapse submenu">
                                    <div class="accordion-inner">
                                        @foreach($side_menu->anak as $submenu)
                                        @if($submenu->parent == $side_menu->id)
                                            <div class="accordion-heading">
                                                @if(count($submenu->anak) > 0 )
                                                <a href="{{category_url($submenu)}}"><span href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-toggle collapsed submenu" data-toggle="collapse"></span>
                                                @else
                                                <a href="{{category_url($submenu)}}" class="collapsed">
                                                @endif
                                                    {{$submenu->nama}}
                                                </a>
                                            </div>
                                            @if($submenu->anak->count() != 0)
                                            <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-body collapse">
                                                <ul>
                                                    @foreach($submenu->anak as $submenu2)
                                                    @if($submenu2->parent == $submenu->id)
                                                    <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="section plugin">
                        {{ pluginSidePowerup() }}
                    </div>
                    <div class="section">
                        @foreach(vertical_banner() as $key=>$banner)
                        <div class="banner-show">
                            <a href="{{URL::to($banner->url)}}">
                                {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'100%'))}}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-lg-9 main">
                    <div class="section product-single">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="product-album" >
                                    <a href="#">
                                        {{HTML::image(product_image_url($produk->gambar1,'large'),$produk->nama)}}
                                    </a>
                    
                                    <ul class="unstyled ">
                                        @if($produk->gambar2)
                                        <li class="slides"><a href="javascript:void(0);">{{HTML::image(product_image_url($produk->gambar2, 'medium'), $produk->nama.'1')}}</a></li>
                                        @endif
                                        @if($produk->gambar3)
                                        <li class="slides"><a href="javascript:void(0);">{{HTML::image(product_image_url($produk->gambar3, 'medium'), $produk->nama.'2')}}</a></li>
                                        @endif
                                        @if($produk->gambar4)
                                        <li class="slides"><a href="javascript:void(0);">{{HTML::image(product_image_url($produk->gambar4, 'medium'), $produk->nama.'3')}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="productpage-info clearfix">
                                    <h3 class="title">
                                        <a href="#">{{$produk->nama}}</a>
                                    </h3>
                                    <div class="description">
                                        <div class="prices autowidth">
                                            <span class="off-price">{{ price($produk->hargaJual) }}  </span>
                                            @if($produk->hargaCoret!=0)
                                            <s class="orginal-price"> {{ price($produk->hargaCoret) }} </s>
                                            @endif
                                        </div>
                                        <br>
                                        <form action="#" id="addorder">
                                            @if($opsiproduk->count() > 0)
                                            Opsi : <select name="opsiproduk">
                                                @foreach ($opsiproduk as $key => $opsi)
                                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                    {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @endif
                                            
                                            <div class="space30 clearfix"></div>

                                            <div class="clearfix">
                                                Jumlah : <input type="text" class="qty compact" name="qty" value="1" size="2" id="qty-input">
                                            </div>
                                            
                                            <div class="space30 clearfix"></div>
                                            
                                            <div class="add-to-cart">
                                                <input type="submit" id="button-cart" class="btn btn-primary btn-iconed" value="Beli">
                                            </div>
                                        </form>

                                        <div class="space20 clearfix"></div>
                                        <br><br>
                                        <div class="sosmed">
                                            {{sosialShare(product_url($produk))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bs-example bs-example-tabs">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                            <li><a href="#detail" data-toggle="tab">Detail</a></li>
                            <li><a href="#review" data-toggle="tab">Review</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="home"><p>{{$produk->deskripsi}}</p></div>
                            <div class="tab-pane fade" id="detail">
                                <ul>
                                    <li><span>Berat:</span> {{$produk->berat}} gram</li>
                                    <li><span>Stok:</span> {{$produk->stok}}</li>
                                    <li><span>Brand:</span> {{$produk->vendor}}</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="review">{{pluginTrustklik()}}</div>
                        </div>
                    </div>

                    @if(count(other_product($produk)) > 0)
                    <div class="section carousel-iframe">
                        <div class="container">
                            <div class="row carousel-iframe offer">
                                <div class="col-xs-12 col-sm-12">
                                    <h4 class="section-title">RELATED PRODUCTS</h4>
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
                                                @foreach(other_product($produk) as $myproduk)
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
                                                                {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('class' => 'img-otherprod'))}}
                                                            </div>
                                                        </a>
                                                        <div class="product-info clearfix">
                                                            <h4 class="title">
                                                                <a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama,30)}}</a>
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
                </div>
            </div>
        </div>
    </div>