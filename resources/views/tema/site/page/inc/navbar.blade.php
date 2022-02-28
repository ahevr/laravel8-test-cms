<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route("site.index")}}">Laravel 8 Cms</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("site.index")}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategoriler
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($categories as $category)
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="{{route("site.kategori",$category->url)}}">{{$category->name}}</a>
                            <ul class="dropdown-menu">
                                <li>
                                    @if(count($category->childs))
                                        @include('tema.site.page.homepage.manageChild',['childs' => $category->childs])
                                    @endif
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>





        @if(Auth::guard("uye")->check())
          Hoşgeldiniz {{Auth::guard("uye")->user()->name}}
            <div class="col-md-3">
                <form action="{{route("site.uye-logout")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Çıkış Yap</button>
                </form>
            </div>
        <div class="col-md-2">
            <a class="btn btn-outline-dark font-weight-bolder py-2 px-5" href="{{route("site.sepet")}}">
                <i class="bi-cart-fill me-1"></i>
                Sepet
                <span class="badge bg-dark text-white ms-1 rounded-pill">{{Cart::count()}}</span>
            </a>
        </div>

        @else
            <div class="row mr-5">
                <div class="col-md-3"><a href="{{route("site.uye-login")}}">Giriş</a></div>
                <div class="col-md-3"><a href="{{route("site.uye-register")}}">Kayıt</a></div>
            </div>
        @endif









    <div class="co">
        <form style="display: flex;" action="{{route("site.search")}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Ara.." name="keyword" aria-label="Search">
            <button class="btn btn-success " style="margin-left: 5px" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

</nav>