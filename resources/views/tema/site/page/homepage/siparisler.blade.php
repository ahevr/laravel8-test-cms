@extends("tema.siteMaster")
@section('title', "Siparislerim")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Siparişlerim</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Sipariş Özeti</span>
                <span class="badge badge-secondary badge-pill">{{Cart::count()}} Adet</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach(Cart::content() as $CartItem)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$CartItem->name}}</h6>
                            <small class="text-muted">{{$CartItem->qty}} Adet</small>
                    </div>
                    <span class="text-muted">{{number_format($CartItem->price,2,',','.') }} TL</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Ara Toplam</span>
                    <strong>{{Cart::subtotal()}}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>KDV</span>
                    <strong>{{Cart::tax()}}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Genel Toplam</span>
                    <strong>{{Cart::total()}}</strong>
                </li>
            </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{route("site.siparisekle")}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="adi" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="soyadi" >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" name="email" >
                </div>

                <div class="mb-3">
                    <label for="address">İl</label>
                    <input type="text" class="form-control" name="il" >
                </div>

                <div class="mb-3">
                    <label for="address">İl</label>
                    <input type="text" class="form-control" name="ilce" >
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="adres" >
                </div>

                <div class="mb-3">
                    <label for="address">Phone</label>
                    <input type="text" class="form-control" name="telefon" >
                </div>

                <hr class="mb-4">
                <input type="submit" class="btn btn-outline-success" value="Continue to checkout">
            </form>
        </div>
    </div>











@endsection