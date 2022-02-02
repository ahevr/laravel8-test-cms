@extends("tema.master")
@section('title',  e(strip_tags(trim($data->title))) )
@section("content")
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" id="myModal" role="document">
            <div class="modal-content" id="myModal">
                <div class="modal-content text-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger"><b>{{$data->title}}</b>  </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <img src="{{asset($data->image)}}" width="400" alt="">
                            <hr>
                            <p>Bu ekran sadece ürün ID'si : <b>{{$data->id}}</b> olan ve ürün adı : <b>{{$data->title}}</b> olan ürünün <b> ön izlemesidir</b></p>
                            <small>Ürün bilgileri değişikliği buradan yapılmamaktadır <br>Lütfen ilgili ürün değişikliklerini güncelleme sayfasından yapınız</small>
                            <br>
                            <small> <a href="{{route("admin.urunler.duzenleForm",$data->id)}}"><b>Güncellemek İçin Tıklayın !</b> </a> </small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <b class="text-danger">{{$data->title}}</b>    &nbsp; Kaydını İnceliyorsunuz
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span class="text-danger"></span></label>
                                <br>
                                <img src="{{asset($data->image) }}" width="300" height="300" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"  value="{{$data->title}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Stok Kodu <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="stok_kodu"  value="{{$data->stok_kodu}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Desc <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="desc"  value="{{$data->desc}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fiyat<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control fiyat hesaplama" id="fiyat" name="fyt" value="{{$data->fyt}}" disabled  />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="discount">İndirim Oranı</label>
                                        <input type="number" class="form-control iskonto hesaplama" id="discount" name="indirim_orani" placeholder="İndirim Oranı" value="{{$data->indirim_orani}}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İndirimli Fiyatı</label>
                                        <input type="text" class="form-control satisfiyati" name="toplam_fyt" value="{{$data->toplam_fyt}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Renk<span class="text-danger">*</span></label>
                                <select name="renkler_id" class="form-control">
                                    <option value="#">Renk Seçiniz</option>
                                    @foreach($renk as $row)
                                        <option disabled @if($row->id === $data->renkler_id) selected @endif value="{{$row->id}}">{{$row->renk_adi}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori<span class="text-danger">*</span></label>
                                <select name="kategoriler_id" class="form-control">
                                    <option value="#">Kategori Seçiniz</option>
                                    @foreach($kategori as $row)
                                        <option disabled @if($row->id === $data->kategoriler_id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Durumu<span class="text-danger">*</span></label>
                                    <?php if ($data->isActive == "1"){ ?>
                                    <a href="{{route("admin.urunler.status",$data->id)}}" class="btn btn-sm btn-success disabled">Aktif</a>
                                    <?php } else { ?>
                                    <a href="{{route("admin.urunler.status",$data->id)}}" class="btn btn-sm btn-danger disabled">Pasif</a>
                                    <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route("admin.urunler.duzenleForm",$data->id)}}" class="btn btn-secondary">Güncellemek İçin Tıklayın</a>
                    <a href="{{route("admin.urunler.index")}}" class="btn btn-secondary">Geri</a>
                </div>
        </div>
    </div>
@endsection
