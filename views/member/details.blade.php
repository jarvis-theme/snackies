<div class="breadcrumbs-wrapper">
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="breadcrumbs">
                <ul class="unstyled">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="{{URL::to('member')}}">Member</a></li>
                    <li class="active">Order History</li>
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
                    <a class="product-link clearfix" href="{{URL::to('member')}}">Order History</a>
                    <a class="product-link clearfix" href="{{URL::to('member/'.$user->id.'/edit')}}">Profil Information</a>
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
                <div class="section table-responsive">
                    <table class="my-cart table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Kode</th>
                                <th class="product-name">Detail Order</th>
                                <th class="product-qty">Tanggal Order</th>
                                <th>Total</th>
                                <th class="product-thumbnail">No Resi</th>
                                <th class="product-action"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (list_order() as $item)
                            <tr>
                                <td>
                                    <div>
                                        @if($item->status!=2 || $item->status!=3)
                                        <a href="{{URL::to('konfirmasipreorder/'.$item->id)}}">
                                        @else
                                        <a>
                                        @endif
                                        {{ prefixOrder().$item->kodeOrder }}</a>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($item->detailorder as $detail)
                                        <div>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}} - {{$detail->qty}}</div><br>
                                    @endforeach
                                    @if($item->status==0)
                                        <small>Status: </small><span class="label label-warning">Pending</span>
                                    @elseif($item->status==1)
                                        <small>Status: </small><span class="label label-info">Konfirmasi diterima</span>
                                    @elseif($item->status==2)
                                        <small>Status: </small><span class="label label-danger">Pembayaran diterima</span>
                                    @elseif($item->status==3)
                                        <small>Status: </small><span class="label label-success">Terkirim</span>
                                    @elseif($item->status==4)
                                        <small>Status: </small><span class="label label-default">Batal</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="qty-btngroup">{{ waktu($item->tanggalOrder) }}</div>
                                </td>
                                <td>
                                    <span>{{ price($item->total) }}</span>
                                </td>
                                <td>
                                    <span>{{ $item->noResi }}</span>
                                </td>
                                <td>
                                    @if($item->status == 0)
                                    <a href="{{URL::to('konfirmasiorder/'.$item->id)}}" title="Konfirmasi Order"><span class="icon-cart"></span></a>
                                    @elseif($item->status == 1)
                                    <span class="icon-file3"></span>
                                    @elseif($item->status == 2)
                                    <span class="icon-checkmark"></span>
                                    @elseif($item->status == 3)
                                    <span class="icon-gift"></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ list_order()->links() }}
            </div>
        </div>
    </div>
</div>