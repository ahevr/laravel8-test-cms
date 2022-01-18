@extends("tema.siteMaster")
@section('title', "Ürünler")
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
                                <b>{{number_format($row->toplam_fyt,2,',','.')}} TL</b>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route("site.urun-detay",$row->url)}}">View options</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection