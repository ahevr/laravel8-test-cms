@extends("tema.siteMaster")
@section('title', "Favoriler")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Favorilerim</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")
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
                <h2>FAVORİLERİM</h2>
            </div>

            @if(count($fav) == 0 )
                <h5 class="fw-bolder">Herhangi Bir Favorili Ürününüz Yok </h5>
            @else
            <div class="card-body">
                <div class="row">
                    @foreach($fav as $row)
                        <div class="col-md-3">
                            <!-- Product image-->
                            <a href="{{route("site.urun-detay",$row->urunler->url)}}">
                                <img class="card-img-top" src="{{asset("tema/admin/uploads/urunler/".$row->image)}}" alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <b><a style="text-decoration: none;color: black" href="{{route("site.urun-detay",$row->urunler->url)}}">{{$row->urunler->title}}</a> </b> </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection