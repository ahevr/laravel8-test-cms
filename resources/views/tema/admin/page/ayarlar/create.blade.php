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
                    Ayar Ekle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{route("admin.ayarlar.ekle.post")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Site Adı<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_adi" />
                    </div>
                    <div class="form-group">
                        <label>Site Açıklaması<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_desc" />
                    </div>
                    <div class="form-group">
                        <label>Mail Adresi<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="site_mail" />
                    </div>
                    <div class="form-group">
                        <label>Telefon<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefon" />
                    </div>
                    <div class="form-group">
                        <label>Adres<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="adres" />
                    </div>
                    <div class="form-group">
                        <label>Facebook<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="facebook" />
                    </div>
                    <div class="form-group">
                        <label>Youtube<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="youtube" />
                    </div>
                    <div class="form-group">
                        <label>Twitter<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="twitter" />
                    </div>
                    <div class="form-group">
                        <label>Linkedin<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="linkedin" />
                    </div>
                    <div class="form-group">
                        <label>Linkedin<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="instagram" />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Site Logo</label>
                        <input type="file" name="site_logo" class="form-control-file" id="exampleFormControlFile1">
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
