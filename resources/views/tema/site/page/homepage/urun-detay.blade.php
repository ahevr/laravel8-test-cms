@extends("tema.siteMaster")
@section('title',  e(strip_tags(trim($urunDetayGetir->title))) )
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">{{$urunDetayGetir->title}}</h1>
            <p class="lead fw-normal text-white-50 mb-0">{{$urunDetayGetir->title}} ile İlgili Detaylar</p>
        </div>
    </div>
@endsection
@section("content")
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset("tema/admin/uploads/urunler/".$urunDetayGetir->image)}}" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: {{$urunDetayGetir->stok_kodu}}</div>
                    <div class="small mb-1">{{$urunDetayGetir->barkod}}</div>
                    <h1 class="display-5 fw-bolder">{{$urunDetayGetir->title}}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through"><del>{{number_format($urunDetayGetir->fyt,2,',','.')}} TL</del></span>
                        <br>
                        <b>%{{$urunDetayGetir->indirim_orani}} İndirim</b>
                        <span><h3><b class="text-success">{{number_format($urunDetayGetir->toplam_fyt,2,',','.')}} TL</b></h3></span>
                    </div>
                    <p class="lead">Açıklama: {{$urunDetayGetir->desc}}</p>
                    <p class="lead">Kategori: {{$urunDetayGetir->kategoriler->name}}</p>
                    <p class="lead">Renk:     {{$urunDetayGetir->renkler->renk_adi}}</p>
                    <div class="d-flex">
                        <form action="{{route("site.sepetekle")}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$urunDetayGetir->id}}">
                            <input type="submit" class="btn btn-outline-success" value="Sepete Ekle">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Önerilen Ürünler</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($urunRandomGetir as $row)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset("tema/admin/uploads/urunler/".$row->image)}}"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$row->title}}</h5>
                                    <!-- Product price-->
                                    <span class="text-decoration-line-through">{{number_format($row->fyt,2,',','.')}} TL</span>
                                    <br>
                                    <b><span>{{number_format($row->toplam_fyt,2,',','.')}} TL</span></b>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route("site.urun-detay",$row->url)}}">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
