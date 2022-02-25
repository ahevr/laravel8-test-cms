@extends("tema.siteMaster")
@section('title', "Sepetim")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Sepet</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")

    @if(count(Cart::content())>0)
    <style>
        .ui-w-100 {
            width: 100px !important;
            height: auto;
        }

        .card{
            box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
            vertical-align: middle;
        }
    </style>
    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>Sepetim</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <!-- Set columns width -->
                            <th class="text-center py-3 px-4" style="min-width: 400px;">Ürün Adı &amp; Detayları</th>
                            <th class="text-center">Birim Fiyat</th>
                            <th class="text-center">Adet</th>
                            <th class="text-center">Toplam Fiyat</th>
                            <th class="text-center align-middle py-3 px-0" style="width: 40px;"> Sil<a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $productCartItem)
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <a href="{{route("site.urun-detay",$productCartItem->options->url)}}">
                                        <img src="{{asset("tema/admin/uploads/urunler")}}/{{$productCartItem->options->image}}" class="d-block ui-w-100 ui-bordered mr-4" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{route("site.urun-detay",$productCartItem->options->url)}}" class="d-block text-dark">{{$productCartItem->name}}</a>
                                        <small>
                                            <span class="text-muted">Renk:</span>
                                            <span class="text-muted">{{$productCartItem->options->renkler}}</span> |
                                            <span class="text-muted">Stok Kodu: {{$productCartItem->options->stok}} </span> |
                                            <span class="text-muted">Kategori: </span> {{$productCartItem->options->kategori}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{$productCartItem->price}}</td>
                            <td class="align-middle p-4">
                                <input
                                        type="number"
                                        min="1"
                                        max="10"
                                        name="qty"
                                        step="1"
                                        class="form-control text-center updateCart"
                                        data-id="{{$productCartItem->rowId}}"
                                        data-ada="{{$productCartItem->rowId}}"
                                        value="{{$productCartItem->qty}}"
                                >
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{$productCartItem->subtotal}}</td>
                            <td class="text-center align-middle px-0">
                                <form action="{{route("site.sepetadetsil",$productCartItem->rowId)}}" method="POST">
                                     @csrf
                                    <button type="submit" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</button>
{{--                                    <input type="submit" class="shop-tooltip close float-none text-danger"data-original-title="Remove" value="×">--}}
                                </form>
                            </td>
                        </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- / Shopping cart table -->

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal"></label>
                    </div>
                    <div class="d-flex">
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Alt Toplam</label>
                            <div class="text-large"><strong>{{Cart::subtotal()}}</strong></div>
                        </div>
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">KDV</label>
                            <div class="text-large"><strong>{{Cart::tax()}}</strong></div>
                        </div>
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Genel Toplam</label>
                            <div class="text-large"><strong>{{Cart::total()}}</strong></div>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Alışverişe Devam Et</button>
                    <a href="{{route("site.siparisler")}}" class="btn btn-lg btn-primary mt-2">Sepeti Onayla</a>
                </div>

                <form action="{{route("site.sepetsil")}}" method="POST">
                    @csrf
                    <input type="submit"  class="btn btn-danger mt-2" value="Sepeti Temizle" >
                </form>
            </div>

        </div>
    </div>
    @else
        <div class="card">
            <div class="card-body">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>  <b>Sepetinde ürün bulunmamaktadır.</b>
               <a href="{{route("site.index")}}" class="btn btn-lg btn-warning pull-right text-white">Alışverişe Başla</a>
            </div>
        </div>
    @endif
@endsection