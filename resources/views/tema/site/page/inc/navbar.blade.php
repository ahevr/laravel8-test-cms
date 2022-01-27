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


{{--                    @foreach($categories as $category)--}}
{{--                        <li>--}}
{{--                            {{ $category->name }}--}}
{{--                            @if(count($category->childs))--}}
{{--                                @include('tema.admin.page.kategoriler.manageChild',['childs' => $category->childs])--}}
{{--                            @endif--}}
{{--                        </li>--}}
{{--                    @endforeach--}}


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
    <div class="co">
        <form style="display: flex;" action="{{route("site.search")}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Ara.." name="keyword" aria-label="Search">
            <button class="btn btn-success " style="margin-left: 5px" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>