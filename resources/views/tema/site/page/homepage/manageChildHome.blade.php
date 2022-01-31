<ul>
    @foreach($childs as $child)
        <li>
            <a style="color: black;text-decoration: none;" href="{{route("site.kategori",$child->url)}}">{{ $child->name }}</a>
            @if(count($child->childs))
                @include('tema.site.page.homepage.manageChildHome',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>