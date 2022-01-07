@extends("tema.master")
@section("content")


    {{session("toast_success")}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>  {{ ucfirst($error)  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    Ürün Ekle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{route("admin.urunler.ekle.post")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Ürün Adı<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label>Açıklama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="desc"  />
                    </div>
                    <div class="form-group">
                        <label>Fiyat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fyt"  />
                    </div>
                    <div class="form-group">
                        <label>Renk<span class="text-danger">*</span></label>
                        <select name="renkid" class="form-control">
                            <option value="#">Renk Seçiniz</option>
                            @foreach($renk as $row)
                                <option value="{{$row->id}}">{{$row->renk_adi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ürün Görsel</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>

@endsection
