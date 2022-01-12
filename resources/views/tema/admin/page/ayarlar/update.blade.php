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
                    Ayar Düzenle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{route("admin.ayarlar.duzenle.post",$data->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Site Adı<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_adi" value="{{$data->site_adi}}" />
                    </div>
                    <div class="form-group">
                        <label>Site Açıklaması<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_desc" value="{{$data->site_desc}}" />
                    </div>
                    <div class="form-group">
                        <label>Mail Adresi<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_mail" value="{{$data->site_mail}}" />
                    </div>
                    <div class="form-group">
                        <label>Telefon<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefon" value="{{$data->telefon}}" />
                    </div>
                    <div class="form-group">
                        <label>Adres<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="adres" value="{{$data->adres}}" />
                    </div>
                    <div class="form-group">
                        <label>Facebook<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}" />
                    </div>
                    <div class="form-group">
                        <label>Youtube<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="youtube" value="{{$data->youtube}}" />
                    </div>
                    <div class="form-group">
                        <label>Twitter<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}" />
                    </div>
                    <div class="form-group">
                        <label>Linkedin<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}" />
                    </div>
                    <div class="form-group">
                        <label>Linkedin<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}" />
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <img src="{{asset($data->site_logo) }}" width="300" height="300" alt="">
                            <input type="file" name="image" class="form-control">
                        </div>
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
