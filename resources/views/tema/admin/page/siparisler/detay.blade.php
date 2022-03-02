@extends("tema.master")
@section("content")

    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label"> <b class="text-danger">{{$data->adi}} {{$data->soyadi}}</b> <small>Adlı Kullanıcının Sipariş Detayı</small></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş ID</label>
                                    <input type="text" class="form-control" value="{{$data->id}}"  disabled>
                                    <small class="form-text text-muted">Siparişin ID Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Numarası</label>
                                    <input type="text" class="form-control" value="{{$data->orderNo}}" disabled>
                                    <small  class="form-text text-muted">Sipariş numarası</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Müşteri Adı ve Soyadı</label>
                                    <input type="text" class="form-control" value="{{$data->adi}} {{$data->soyadi}}" disabled>
                                    <small  class="form-text text-muted">Müşteri Adı ve Soyadı Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Müşteri Email</label>
                                    <input type="text" class="form-control" value="{{$data->email}}" disabled>
                                    <small  class="form-text text-muted">Müşteri Email Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Adresi</label>
                                    <input type="text" class="form-control" value="{{$data->adres}}" disabled>
                                    <small  class="form-text text-muted">Sipariş Adresi Bilgisi</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sipariş Tarihi</label>
                                    <input type="text" class="form-control" value="{{$data->created_at}}" disabled>
                                    <small  class="form-text text-muted">Sipariş Tarihi Bilgisi</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th width="20">#</th>
                                    <th width="20">Görsel</th>
                                    <th width="20">Ürün Adı</th>
                                    <th width="20">Adet</th>
                                    <th width="20">Fiyat</th>
                                    <th width="20">Stok Kodu</th>
                                    <th width="20">Sipariş Tarihi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sip as $row)
                                    <tr class="text-center">
                                        <td>{{$row->id}}</td>
                                        <td><img src="{{asset("tema/admin/uploads/urunler/".$row->image)}}" width="80" alt=""> </td>
                                        <td><b class="text-success">{{$row->urunler->title}}</b></td>
                                        <td>{{$row->adet}}</td>
                                        <td><b class="text-danger">{{number_format($row->fiyat,2,',','.') }} TL</b></td>
                                        <td><b>{{$row->stok_kodu}}</b></td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection