@extends("tema.siteMaster")
@section('title', "Siparislerim")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Siparişlerim</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label"> <b class="text-danger"></b> <small> Siparişlerim</small></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="example mb-10">
                    <div class="example-preview">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th width="20">Sipariş Tarihi</th>
                                    <th width="20">Siparis Adı ve Soyadı</th>
                                    <th width="20">Siparis Numarası</th>
                                    <th width="20">Toplam Fiyat</th>
                                    <th width="20">Detaylar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sip as $row)
                                    <tr class="text-center">
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->adi}} {{$row->soyadi}}</td>
                                        <td>{{$row->orderNo}}</td>
                                        <td>{{$row->toplamfiyat}} TL</td>
                                        <td> <a href="{{route("site.siparislerimDetay",$row->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
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