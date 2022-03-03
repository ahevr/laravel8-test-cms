@extends("tema.siteMaster")
@section('title', "Siparis Detayları")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Siparişlerim</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")

    @foreach($data as $row)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş ID</label>
                    <input type="text" class="form-control" value="{{$row->id}}"  disabled>
                    <small class="form-text text-muted">Siparişin ID Bilgisi</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Numarası</label>
                    <input type="text" class="form-control" value="{{$row->orderNo}}" disabled>
                    <small  class="form-text text-muted">Sipariş numarası</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Müşteri Adı ve Soyadı</label>
                    <input type="text" class="form-control" value="{{$row->adi}} {{$row->soyadi}}" disabled>
                    <small  class="form-text text-muted">Müşteri Adı ve Soyadı Bilgisi</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Müşteri Email</label>
                    <input type="text" class="form-control" value="{{$row->email}}" disabled>
                    <small  class="form-text text-muted">Müşteri Email Bilgisi</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Adresi</label>
                    <input type="text" class="form-control" value="{{$row->adres}}" disabled>
                    <small  class="form-text text-muted">Sipariş Adresi Bilgisi</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Tarihi</label>
                    <input type="text" class="form-control" value="{{$row->created_at}}" disabled>
                    <small  class="form-text text-muted">Sipariş Tarihi Bilgisi</small>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr class="text-center">
                <th width="20">#</th>
                <th width="20">Görsel</th>
                <th width="20">Ürün Adı</th>
                <th width="20">Sipariş Tarihi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sip as $row)
                <tr class="text-center">
                    <td>{{$row->id}}</td>
                    <td><img src="{{asset("tema/admin/uploads/urunler/".$row->image)}}" width="80" alt=""> </td>
                    <td><b class="text-success">{{$row->urunler->title}}</b></td>
                    <td>{{$row->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection