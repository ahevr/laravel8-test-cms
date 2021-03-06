@extends("tema.siteMaster")
@section('title', "Ürünler")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"> <b>Ürünler</b></h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Ürün Listesi</p>
        </div>
    </div>
@endsection
@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <section id="sidebar">
                    <p> Home | <b>All Breads</b></p>
                    <div class="border-bottom pb-2 ml-2">
                        <h5 id="burgundy">Filtreleme</h5>
                    </div>
                    <div class="py-2 border-bottom ml-3">
                        <h6 class="font-weight-bold">Kategoriler</h6>
                        <div id="orange"><span class="fa fa-minus"></span></div>
                        <form>
                            @foreach($categories as $category)
                                <div class="form-group">
                                    <label for="artisan"> <b>{{$category->name}}</b></label>
                                        @if(count($category->childs))
                                            @include('tema.site.page.homepage.manageChildHome',['childs' => $category->childs])
                                        @endif
                                </div>
                            @endforeach
                        </form>
                    </div>


                    <div class="py-2 ml-3">
                        <h6 class="font-weight-bold">Top Offers</h6>
                        <div id="orange"><span class="fa fa-minus"></span></div>
                        <form>
                            <label><input type="checkbox" name="color[]" value="1"> Siyah</label>
                            <label><input type="checkbox" name="color[]" value="2"> Yeşil</label>
                        </form>
                    </div>
                    <hr>
                </section>
            </div>
            <div class="col-md-9">
                <div class="d-flex flex-row mb-3">
                    <div class="text-muted m-2" id="res"><b>{{$toplamUrunSayisi}}</b> Adet Sonuç Gösteriliyor</div>
                    <div class="ml-auto mr-lg-4">

                        <form name="sortProducts" id="sortProducts">
                            <div id="sorting" class="border rounded">
                                <select name="sort" id="sort" class="custom-select">
                                    <option value="" selected>Sırala</option>
                                    <option value="product_name_a_z"><b>A'dan Z'ye</b></option>
                                    <option value="price_lowest"><b>Artan Fiyat</b></option>
                                    <option value="price_highest"><b>Azalan Fiyat</b></option>
                                </select>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <hr>
                    <div class="row">
                        @foreach($urunleriGetir as $row)
                        <div class="col-md-4">
                            <!-- Product image-->
                            <a href="{{route("site.urun-detay",$row->url)}}">
                                <img class="card-img-top" src="{{asset("tema/admin/uploads/urunler/".$row->image)}}" alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <b><a style="text-decoration: none;color: black" href="{{route("site.urun-detay",$row->url)}}">{{$row->title}}</a> </b> </h5>
                                    <hr>
                                    <!-- Product price-->
                                    <del>
                                        <span class="text-decoration-line-through">{{number_format($row->fyt,2,',','.')}} TL</span>
                                    </del>
                                    <br>
                                    <small><b class="text-danger" >%{{$row->indirim_orani}}</b> </small>
                                    <br>
                                    <b class="text-success">{{number_format($row->toplam_fyt,2,',','.')}} TL</b>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                @if  (request()->has('sort') && !empty(request()->get("sort")))

                    {{$urunleriGetir->appends(["sort" => request()->get("sort") ])->links()}}
                @else
                    {{$urunleriGetir->links()}}

                    @endif
            </div>
        </div>
    </div>
@endsection