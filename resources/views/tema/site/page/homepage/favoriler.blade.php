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
        .favcard {
            width: 250px;
            border-radius: 10px
        }

        .card-img-top {
            border-top-right-radius: 10px;
            border-top-left-radius: 10px
        }

        span.text-muted {
            font-size: 12px
        }

        small.text-muted {
            font-size: 8px
        }

        h5.mb-0 {
            font-size: 1rem
        }

        small.ghj {
            font-size: 9px
        }

        .mid {
            background: #ECEDF1
        }

        h6.ml-1 {
            font-size: 13px
        }

        small.key {
            text-decoration: underline;
            font-size: 9px;
            cursor: pointer
        }

        .btn-danger {
            color: #FFCBD2
        }

        .btn-danger:focus {
            box-shadow: none
        }

        small.justify-content-center {
            font-size: 9px;
            cursor: pointer;
            text-decoration: underline
        }

        @media screen and (max-width:600px) {
            .col-sm-4 {
                margin-bottom: 50px
            }
        }
    </style>
    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>FAVORİLERİM</h2>
            </div>
            <div class="container-fluid d-flex justify-content-center">
                <div class="row mt-5">
                    @foreach($fav as $row)
                        <div class="col-sm-4">
                            <div class="favcard"> <img src="{{asset("tema/admin/uploads/urunler/".$row->image)}}" class="card-img-top" width="100%">
                                <div class="card-body pt-0 px-0">
                                    <div class="d-flex flex-row justify-content-between mb-0 px-3"> <small class="text-muted mt-1">Fiyat</small>
                                        <h6>{{number_format($row->fiyat,2,',','.')}} TL</h6>
                                    </div>
                                    <hr class="mt-2 mx-3">
                                    <div class="d-flex flex-row px-3 pb-4">
                                        <div class="text-center">
                                            <h6 class="fw-bolder"> <b><a style="text-decoration: none;color: black" href="{{route("site.urun-detay",$row->urunler->url)}}">{{$row->urunler->title}}</a> </b> </h6>
                                        </div>
                                    </div>
                                    <div class="mx-3 mt-3 mb-2">
                                        <form action="{{route("site.favoriadetsil",$row->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-block">
                                                <small>Favorilerimden Çıkart</small>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection