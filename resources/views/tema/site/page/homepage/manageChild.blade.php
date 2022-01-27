<ul>
    @foreach($childs as $child)
        <li>
            <a href="{{route("site.kategori",$child->url)}}">{{ $child->name }}</a>

            @if(count($child->childs))
                @include('tema.site.page.homepage.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>