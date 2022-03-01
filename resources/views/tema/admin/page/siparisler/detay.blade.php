@extends("tema.master")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li>
                    id :
                    {{$data->id}}
                </li>
            </ul>


            <ul>
                <li>
                    orderNo :
                    {{$data->orderNo}}
                </li>
            </ul>


            <ul>
                <li>
                    adi
                    {{$data->adi}}
                </li>
            </ul>
            <ul>
                <li>
                    soyadi
                    {{$data->soyadi}}
                </li>
            </ul>


            <ul>
                <li>
                    email
                    {{$data->email}}
                </li>
            </ul>


            <ul>
                <li>
                    adres
                    {{$data->adres}}
                </li>
            </ul>


            <ul>
                <li>
                    Sip.Tarihi
                    {{$data->created_at}}
                </li>
            </ul>
        </div>
        <hr>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th width="20">id</th>
                        <th width="20">urun_id</th>
                        <th width="20">adet</th>
                        <th width="20">fiyat</th>
                        <th width="20">image</th>
                        <th width="20">stok_kodu</th>
                        <th width="20">siparisid</th>
                        <th width="20">created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sip as $row)
                        <tr class="text-center">
                            <td>{{$row->id}}</td>
                            <td>{{$row->urunler->title}}</td>
                            <td>{{$row->adet}}</td>
                            <td>{{$row->fiyat}}</td>
                            <td>{{$row->image}}</td>
                            <td>{{$row->stok_kodu}}</td>
                            <td>{{$row->siparisid}}</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>








@endsection