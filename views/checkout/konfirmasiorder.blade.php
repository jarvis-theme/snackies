<br>
<div class="breadcrumbs-wrapper">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="breadcrumbs">
                <ul class="unstyled">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="active">Konfirmasi Pembayaran</li>
                    <br>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="container"> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 main">
                <div class="section table-responsive">
                    <table class="my-cart table table-order">
                        <thead>
                            <tr>
                                <th class="product-action">Kode Order</th>
                                <th class="product-action">Tgl Order</th>
                                <th class="product-name">Detail Produk</th>
                                <th class="product-price">Total</th>
                                <th class="product-price">No Resi</th>
                                <th class="product-action">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ prefixOrder().$order->kodeOrder }}</td>
                                <td>{{ waktu($order->tanggalOrder) }}</td>
                                <td>
                                    <ul>
                                    @foreach ($order->detailorder as $detail)
                                        <li> {{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>{{ price($order->total) }}</td>
                                <td class="align_center vline">{{ $order->noResi }}</td>
                                <td class="align_center vline">
                                    @if($order->status==0)
                                    <span class="label label-warning">Pending</span>
                                    @elseif($order->status==1)
                                    <span class="label label-danger">Konfirmasi diterima</span>
                                    @elseif($order->status==2)
                                    <span class="label label-info">Pembayaran diterima</span>
                                    @elseif($order->status==3)
                                    <span class="label label-success">Terkirim</span>
                                    @elseif($order->status==4)
                                    <span class="label label-default">Batal</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                   </table>
                </div>
                <br>
                <div class="clear"></div>
                @if($order->jenisPembayaran == 1 && $order->status == 0)
                <div class="row well">
                    <div class="col-xs-12 col-lg-6 col-lg-offset-3 center">
                        <h2>{{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}}</h2><hr>
                        {{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}} 
                            <div class="control-group">
                                <label>Nama Pengirim</label>
                                <input type="text" class="form-control" name="nama" value="{{Input::old('nama')}}" required>
                            </div>
                            <br>
                            <div class="control-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" required>
                            </div>
                            <br>
                            <div class="control-group">
                                <label class="control-label"> Rekening Tujuan</label>
                                <div class="controls" id="rek">
                                    <select name="bank" id="reklist">
                                        <option value="">-- Pilih Bank Tujuan --</option>
                                        @foreach ($banktrans as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="control-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" value="{{Input::old('jumlah') ? Input::old('jumlah') : $order->total}}" required>
                            </div>
                            <br>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn theme"><i class="icon-check"></i> {{trans('content.step5.confirm_btn')}}</button>
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
                @endif
                @if($paymentinfo!=null)
                <div class="well">
                    <h3><center>Paypal Payment Details</center></h3><br>
                    <hr>
                    <div class="table-responsive">
                        <table class='table table-bordered'>
                            <tr><td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td></tr>
                            <tr><td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td></tr>
                            <tr><td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td></tr>
                            <tr><td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td></tr>
                            <tr><td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td></tr>
                            <tr><td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td></tr>
                            <tr><td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td></tr>
                        </table>
                    </div>
                    <p>Thanks you for your order.</p><br>
                </div>
                @endif 
              
                @if($order->jenisPembayaran==2)
                <div class="well">
                    <center>
                        <h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2><hr>
                        <p>{{trans('content.step5.paypal')}}</p>
                    </center><br>
                    <center id="paypal">{{$paypalbutton}}</center>
                    <br>
                </div>
                @elseif($order->jenisPembayaran==4) 
                    @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
                    <div class="well">
                        <center>
                            <h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2><hr>
                            <p>{{trans('content.step5.ipaymu')}}</p><br>
                            <a class="btn-pay" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
                            <br>
                        </center>
                    </div>
                    @endif
                @elseif($order->jenisPembayaran==5 && $order->status == 0)
                <div class="well">
                    <center>
                        <h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2><hr>
                        <p>{{trans('content.step5.doku')}}</p><br>
                        {{ $doku_button }}
                        <br>
                    </center>
                </div>
                @elseif($order->jenisPembayaran == 6 && $order->status == 0)
                <div class="well">
                    <center>
                        <h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2><hr>
                        <p>{{trans('content.step5.bitcoin')}}</p><br>
                        {{$bitcoinbutton}}
                        <br>
                    </center>
                </div>
                @elseif($order->jenisPembayaran == 8 && $order->status == 0)
                <div class="well">
                    <center>
                        <h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2><hr>
                        <p>{{trans('content.step5.veritrans')}}</p><br>
                        <button class="btn-pay" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
                        <br>
                    </center>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
