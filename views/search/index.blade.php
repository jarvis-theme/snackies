<div class="breadcrumbs-wrapper">
    <div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="active">Search</li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content category-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
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
                @if(count(list_koleksi()) > 0)
                <div class="accordionmenu section">
                    <h4 class="section-title">Koleksi</h4>
                    @foreach(list_koleksi() as $mykoleksi)
                    <a href="{{koleksi_url($mykoleksi)}}" class="product-link clearfix">
                        {{$mykoleksi->nama}}
                    </a>
                    @endforeach
                </div>
                @endif
                <div class="section plugin">
                    {{ pluginSidePowerup() }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-lg-9 main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
                        <div class="cat-image">
                            @foreach(horizontal_banner() as $key=>$banner)
                            @if($key==0)
                            <a href="{{URL::to($banner->url)}}">
                                {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('width'=>'100%'))}}
                            </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                </div>
                <div class="clearfix"></div>

                <div class="filter-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 center-sm">
                                <div class="filtersgroup">
                                    <div class="limit">
                                        <span>Show:</span>
                                        <select id="show" data-rel="{{URL::current()}}">
                                            <option value="15" {{Input::get('show')==15?'selected="selected"':''}}>15</option>
                                            <option value="25" {{Input::get('show')==25?'selected="selected"':''}}>25</option>
                                            <option value="40" {{Input::get('show')==40?'selected="selected"':''}}>40</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
                            
                            <div class="col-xs-12 col-sm-6 center-sm">
                                <div class="display-mode">
                                    <ul class="unstyled float-right">
                                        <li class="active">
                                            <a id="grid-mode"><span class="icon-grid-alt"></span>Grid</a>
                                        </li>
                                        <li>
                                            <a id="list-mode"><span class="icon-list"></span>List</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                @if($jumlahCari!=0)
                <div id="product-list-container" class="section offer products-container portrait three-column" data-layout="grid">
                    <div class="row">
                        @foreach($hasilpro as $myproduk)
                        <div class="mix col-xs-12 col-sm-6 col-lg-4">
                            <div class="product"  data-name="Demo Product1">
                                <a href="{{product_url($myproduk)}}" class="product-link clearfix">
                                    @if(is_terlaris($myproduk))
                                    <div class="ribbon hot">Terlaris</div>
                                    @elseif(is_produkbaru($myproduk))
                                    <span class="ribbon new">Baru</span>
                                    @elseif(is_outstok($myproduk))
                                    <div class="ribbon empty">Kosong</div>
                                    @endif
                                    <div class="product-thumbnail">
                                        {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama,array('title'=>'product','class'=>'image-prod'))}}
                                    </div>
                                </a>
                                <div class="product-info clearfix">
                                    <h4 class="title left">
                                        <a href="{{product_url($myproduk)}}">{{ short_description($myproduk->nama, 30) }}</a>
                                    </h4>
                                    <div class="details">
                                        <div class="product-price">
                                            @if($myproduk->hargaCoret != 0)
                                            <span class="price-old">{{price($myproduk->hargaCoret)}}</span><br>
                                            @endif
                                            <span class="price-new">{{price($myproduk->hargaJual)}}</span> 
                                        </div>
                                    </div>
                                    <div class="listdescription">
                                        <div class="text"><p>{{short_description($myproduk->deskripsi, 130)}}</p></div>
                                        <div class="add-to-cart">
                                            <a  onclick="window.location.href='{{product_url($myproduk)}}'" class="btn btn-primary btn-iconed"><i class="icon-cart2"></i><span>Lihat Produk</span></a>
                                        </div>
                                    </div>
                                    
                                    <a title="Add To Cart" class="add-to-cart">
                                        <span class="icon-shopcart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                </div>

                <div class="pagination-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            {{--$produk->links()--}}
                        </div>
                    </div>
                </div>
                @else
                <article class="noresult"><i>Hasil pencarian tidak ditemukan</i></article>
                @endif
            </div>
        </div>
    </div>
</div>