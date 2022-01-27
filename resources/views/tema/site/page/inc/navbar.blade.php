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
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Submenu action</a></li>
                            <li><a class="dropdown-item" href="#">Another submenu action</a></li>


                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                    <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                    <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
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