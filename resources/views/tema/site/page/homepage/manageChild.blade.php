<ul>
        @foreach($childs as $child)
                <li>
                        <a class="dropdown-item" href="{{route("site.kategori",$child->url)}}">{{ $child->name }}</a>
                        @if(count($child->childs))
                                @include('tema.admin.page.kategoriler.manageChild',['childs' => $child->childs])
                        @endif
                </li>
        @endforeach
</ul>