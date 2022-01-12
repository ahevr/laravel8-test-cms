@extends("tema.master")
@section('title', "Ürünler")
@section("content")
    @include("tema.admin.page.inc.page_style")
    @include("tema.admin.page.inc.page_script")
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Ürünler Listesi</h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{route("admin.urunler.ekleForm")}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                    </svg>
                </span>Yeni Kayıt</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route("admin.urunler.search")}}" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group float-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Ürün Adı Ara...">
                                    <div class="input-group-append">
                                        <button  class="btn btn-primary">Ara!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="example mb-10">
                    <div class="example-preview">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Görsel</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Desc</th>
                                <th scope="col">L.Fyt</th>
                                <th scope="col">İndrm Oranı</th>
                                <th scope="col">T.Fyt</th>
                                <th scope="col">Durumu</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr class="text-center">
                                    <td>#{{$row->id}}</td>
                                    <td>
                                        <img src="{{asset($row->image)}}" width="150" alt="{{$row->title}}">
                                    </td>
                                    <td><a href="{{route("admin.urunler.inceleForm",$row->id)}}" style="color: black"><b>{{substr($row->title,0,30)}}....</b></a></td>
                                    <td>{{ substr($row->desc,0,35) ."......." }}</td>
                                    <td><b>{{number_format($row->fyt,2,',','.') }}</b> TL</td>
                                    <td><b class="text-danger">%{{$row->indirim_orani}}</b></td>
                                    <td><b class="text-success">{{number_format($row->toplam_fyt,2,',','.')}}</b> TL</td>
                                    <td>
                                        <?php if ($row->isActive == "1"){ ?>
                                            <a href="{{route("admin.urunler.status",$row->id)}}" class="btn btn-sm btn-success">Aktif</a>
                                        <?php } else { ?>
                                            <a href="{{route("admin.urunler.status",$row->id)}}" class="btn btn-sm btn-danger">Pasif</a>
                                        <?php  } ?>
                                    </td>
                                    <td>
                                        <a href="{{route("admin.urunler.inceleForm",$row->id)}}"
                                           class="btn btn-sm btn-info"><i class="flaticon-eye"></i>
                                        </a>
                                        <a href="{{route("admin.urunler.duzenleForm",$row->id)}}"
                                           class="btn btn-sm btn-primary"><i class="flaticon-edit"></i>
                                        </a>
                                        <a href="{{route("admin.urunler.galeriForm",$row->id)}}"
                                           class="btn btn-sm btn-warning"><i class="flaticon2-image-file"></i>
                                        </a>
                                        <button
                                                data-url="{{route("admin.urunler.sil",$row->id)}}"
                                                class="btn btn-sm btn-danger silButton">
                                            <i class="flaticon-delete"></i></i>
                                        </button>
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
