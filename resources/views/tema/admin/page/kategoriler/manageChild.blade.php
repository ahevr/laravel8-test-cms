<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name }}
            @if(count($child->childs))
                @include('tema.admin.page.kategoriler.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>