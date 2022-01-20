@extends("tema.siteMaster")
@section('title', "Ürünler")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Ürünler</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Ürün Listesi</p>
        </div>
    </div>
@endsection
@section("content")

    <div class="container">
        <div class="row">


            @foreach($urunleriGetir as $row)
                <div class="col-md-3">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($row->image)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$row->title}} </h5>
                            <hr>
                            <!-- Product price-->
                            <span class="text-decoration-line-through">{{number_format($row->fyt,2,',','.')}} TL</span>
                            <br>
                                <b>{{number_format($row->toplam_fyt,2,',','.')}} TL</b>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route("site.urun-detay",$row->url)}}">Detaylar</a></div>
                    </div>
                </div>
            @endforeach
                {{ $urunleriGetir->links() }}
        </div>
    </div>
@endsection