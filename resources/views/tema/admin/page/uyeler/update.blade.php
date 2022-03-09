@extends("tema.master")
@section("content")
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <b class="text-danger">{{$data->name}} {{$data->surname}}</b>    &nbsp; Kaydını Düzenliyorsunuz
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <form action="{{route("admin.uyeler.duzenleuye",$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body satir">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Adı <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"  value="{{$data->name}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>SoyAdı <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="surname"  value="{{$data->surname}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="email"  value="{{$data->email}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telefon <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone"  value="{{$data->phone}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>İl <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="il"  value="{{$data->il}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>İlçe <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="ilce"  value="{{$data->ilce}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Adres <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="adres"  value="{{$data->adres}}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Şifre <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password"  value="{{$data->password}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2"><i class="flaticon2-refresh-1"></i> Güncelle</button>
                    <a href="{{route("admin.urunler.index")}}" class="btn btn-secondary">İptal</a>
                </div>
            </form>
        </div>
    </div>
@endsection