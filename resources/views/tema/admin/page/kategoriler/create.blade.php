@extends("tema.master")
@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>  {{ ucfirst($error)  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6 card card-body bg-light">
                <form method="post" action="{{route("admin.kategoriler.add.category")}}">
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" class="form-control" name="name"  placeholder="Kategori Adı">
                    </div>

                    <div class="form-group">
                        <label>Üst Kategori Adı</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Alt Kategori Seç</option>
                            @foreach($allCategories as $key)
                                <option value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                    <button type="reset"  class="btn btn-danger">İptal</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 card card-body bg-light">
                    <h4 class="text-center">
                        Kategori Listesi
                    </h4>
                    <ul class="treeview" id="tree1">
                        @foreach($categories as $category)
                            <li>
                                {{ $category->name }}
                                @if(count($category->childs))
                                    @include('tema.admin.page.kategoriler.manageChild',['childs' => $category->childs])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
