@extends("tema.master")
@section("content")

    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
               <span class="card-icon">
                <i class="flaticon2-delivery-package text-primary"></i>
            </span>
                    <h3 class="card-label ">  <b class="text-danger">{{$galeri->title}}</b> Ürün Fotoğraf Ekle</h3>
                </div>
            </div>
            <div class="card card-custom">
                <!--begin::Form-->


                <form action="{{route("admin.urunler.galeri.post",$galeri->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class=" col-form-label text-lg-right">Ürün Fotoğrafı:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Kayıt</button>
                        <button type="reset" class="btn btn-secondary">İptal</button>
                    </div>
                </form>


                <!--end::Form-->
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-custom mt-3">
            <div class="card-header">
                <div class="card-title">
               <span class="card-icon">
                <i class="flaticon2-delivery-package text-primary"></i>
            </span>
                    <h3 class="card-label"> <small><b class="text-danger">{{$galeri->title}}</b> </small> Ürünün Fotoğraf Galerisi</h3>
                </div>
            </div>
            <div class="card card-custom">
                <!--begin::Form-->
                <div class="card-body">

                    <table class="table">
                        <thead>
                        <th>id</th>
                        <th>Görsel</th>
                        <th>İşlemler</th>
                        <th>Durumu</th>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$value)
                            <tr>
                                <td>
                                    {{$value->id}}
                                </td>
                                <td>
                                    <img width="100" src="{{asset("tema/admin/uploads/urunler/".$value->image) }}" alt="" class="img-responsive">
                                </td>
                                <td>
                                    <button
                                            data-url="{{route("admin.urunler.fotoSil",$value->id)}}"
                                            class="btn btn-sm btn-danger silButton">
                                        <i class="flaticon-delete"></i></i>
                                        Sil
                                    </button>
                                </td>
                                <td>
                                    <?php if ($value->isActive == "1"){ ?>

                                        <a href="{{route("admin.urunler.fotoStatus",$value->id)}}" class="btn btn-sm btn-success">Aktif</a>

                                    <?php } else { ?>

                                        <a href="{{route("admin.urunler.fotoStatus",$value->id)}}" class="btn btn-sm btn-danger">Pasif</a>

                                    <?php  } ?>
                                </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end::Form-->
            </div>
        </div>
    </div>







@endsection
