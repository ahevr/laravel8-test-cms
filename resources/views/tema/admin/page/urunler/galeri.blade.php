@extends("tema.master")
@section("content")

    <div class="col-md-12">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
               <span class="card-icon">
                <i class="flaticon2-delivery-package text-primary"></i>
            </span>
                    <h3 class="card-label">Ürün Fotoğraf Ekle</h3>
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
                    <h3 class="card-label"> <small>{{$galeri->name}} </small> Ürünün Fotoğraf Galerisi</h3>
                </div>
            </div>
            <div class="card card-custom">
                <!--begin::Form-->
                <div class="card-body">

                    <table class="table">
                        <thead>
                        <th>id</th>
                        <th>Görsel</th>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$value)
                            <tr>
                                <td>
                                    {{$value->id}}
                                </td>
                                <td>
                                    <img width="100" src="{{asset($value->image) }}" alt="" class="img-responsive">
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
