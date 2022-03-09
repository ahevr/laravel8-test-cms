@extends("tema.master")
@section("content")
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Üyeler Listesi</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="example mb-10">
                    <div class="example-preview">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Soyisim</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Düzenle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->surname}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>
                                        <a href="{{route("admin.uyeler.duzenleForm",$row->id)}}"
                                           class="btn btn-sm btn-primary"><i class="flaticon-edit"></i>
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
