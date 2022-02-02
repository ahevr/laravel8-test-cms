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
                    Ürün Ekle
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <form action="{{route("admin.urunler.ekle.post")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body satir">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ürün Adı<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Stok Kodu<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="stok_kodu" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Açıklama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="desc"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fiyat<span class="text-danger">*</span></label>
                                <input type="number" class="form-control fiyat hesaplama" id="fiyat" name="fyt"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discount">İndirim Oranı</label>
                                <input type="number" class="form-control iskonto hesaplama" id="discount" name="indirim_orani" placeholder="İndirim Oranı">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">İndirimli Fiyatı</label>
                                <input type="text" class="form-control satisfiyati" name="toplam_fyt">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Renk<span class="text-danger">*</span></label>
                                <select name="renkid" class="form-control">
                                    <option value="#">Renk Seçiniz</option>
                                    @foreach($renk as $row)
                                        <option value="{{$row->id}}">{{$row->renk_adi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori<span class="text-danger">*</span></label>
                                <select name="kategori_id" class="form-control">
                                    <option value="#">Kategori Seçiniz</option>
                                    @foreach($kategori as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
        </div>
    </div>
@endsection
