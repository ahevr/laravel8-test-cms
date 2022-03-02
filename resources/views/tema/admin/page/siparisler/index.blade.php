@extends("tema.master")
@section("content")
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Siparis Listesi</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="example mb-10">
                    <div class="example-preview">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Sipariş No</th>
                                <th scope="col">Müşteri Adı Soyadı</th>
                                <th scope="col">E Posta Adresi</th>
                                <th scope="col">Sipariş Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <th scope="row">{{$row->orderNo}}</th>
                                    <td>{{$row->adi." ".$row->soyadi}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <a href="{{route("admin.siparisler.inceleForm",$row->id)}}"
                                           class="btn btn-sm btn-info"><i class="flaticon-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
