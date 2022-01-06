@extends("tema.master")
@section("content")
    {{session("toast_success")}}
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <b class="text-danger">{{$data->name}}</b>    &nbsp; Kaydını Düzenliyorsunuz
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{route("admin.urunler.duzenle.post",$data->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title"  value="{{$data->title}}"/>
                    </div>
                    <div class="form-group">
                        <label>Desc <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="desc"  value="{{$data->desc}}"/>
                    </div>
                    <div class="form-group">
                        <label>Fyt <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fyt"  value="{{$data->fyt}}"/>
                    </div>
                    <div class="form-group">
                        <label>Foto <span class="text-danger">*</span></label>
                        <img src="{{asset($data->image) }}" width="150" height="150" alt="">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                    <a href="{{route("admin.urunler.index")}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>

@endsection