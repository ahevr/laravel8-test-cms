@extends("tema.master")
@section('title',  e(strip_tags(trim($data->title))) )
@section("content")
    {{session("toast_success")}}
    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <b class="text-danger">{{$data->title}}</b>    &nbsp; Kaydını Düzenliyorsunuz
                </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <form action="{{route("admin.urunler.duzenle.post",$data->id)}}" method="post">
                @csrf
                <div class="card-body satir">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{asset($data->image) }}" width="300" height="300" alt="">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"  value="{{$data->title}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desc <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="desc"  value="{{$data->desc}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fiyat<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control fiyat hesaplama" id="fiyat" name="fyt" value="{{$data->fyt}}"  />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="discount">İndirim Oranı</label>
                                        <input type="number" class="form-control iskonto hesaplama" id="discount" name="indirim_orani" placeholder="İndirim Oranı" value="{{$data->indirim_orani}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İndirimli Fiyatı</label>
                                        <input type="text" class="form-control satisfiyati" name="toplam_fyt" value="{{$data->toplam_fyt}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Renk<span class="text-danger">*</span></label>
                                        <select name="renkid" class="form-control">
                                            <option value="#">Renk Seçiniz</option>
                                            @foreach($renk as $row)
                                                <option @if($row->id === $data->renkid) selected @endif value="{{$row->id}}">{{$row->renk_adi}}</option>
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
                                                <option @if($row->id === $data->kategori_id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
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
