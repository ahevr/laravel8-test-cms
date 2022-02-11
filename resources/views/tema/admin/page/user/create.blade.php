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
        <div class="card card-custom satir">
            <div class="card-header">
                <h3 class="card-title">
                    Admin Kullanıcısı Ekle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <form action="{{route("admin.user.ekle.post")}}" method="post">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ad Soyad<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" />
                            </div>

                            <div class="form-group">
                                <label>E Posta<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" />
                            </div>

                            <div class="form-group">
                                <label>Şifre<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="password" />
                            </div>

                            <div class="form-group">
                                <label>Şifre Tekrar<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="password_confirmation" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection
