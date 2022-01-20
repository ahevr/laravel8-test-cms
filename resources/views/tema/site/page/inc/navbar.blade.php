<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route("site.index")}}">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
        </div>

            <div class="ico">
                <form style="display: flex;">
                    <button class="btn btn-dark" style="margin-right: 10px" type="submit"><i class="fa fa-user"></i>
                        <span>Giriş Yap</span>
                    </button>

                </form>
            </div>
            <div class="co">
                <form style="display: flex;" action="{{route("site.search")}}">
                    <input class="form-control mr-sm-2" type="search" placeholder="Ara.." name="keyword" aria-label="Search">
                    <button class="btn btn-success " style="margin-left: 5px" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
    </div>


{{--    <div class="search-container">--}}
{{--        <form action="{{route("site.search")}}" >--}}
{{--            <input type="text" placeholder="Ara.." name="keyword">--}}
{{--            <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-search"></i></button>--}}
{{--        </form>--}}
{{--    </div>--}}


</nav>