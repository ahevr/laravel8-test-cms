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
                    Slider Ekle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{route("admin.slider.ekle.post")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Başlık<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="baslik" />
                    </div>
                    <div class="form-group">
                        <label>Açıklama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="desc"/>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ürün Görsel</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <span class="switch switch-icon">
                            <label> Buton Kullanımı
                                <input type="checkbox" name="buton" class="button_usage_btn">
                                <span></span>
                            </label>
                        </span>
                    </div>

                    <div class="button-inf-container">
                        <div class="form-group">
                            <label for="productName">Buton Başlık</label>
                            <input type="text" class="form-control" name="buton_adi" placeholder="Buttonun Adı">
                        </div>

                        <div class="form-group">
                            <label for="productName">Buton URL</label>
                            <input type="text" class="form-control" name="buton_url" placeholder="URL bilgisi">
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
