@extends("tema.siteMaster")
@section('title', "KullanıcıBilgilerim")
@section("header")
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Kullanıcı Bilgilerim</h1>
            <p class="lead fw-normal text-white-50 mb-0">Laravel İle Kategori Listesi <b></b>  </p>
        </div>
    </div>
@endsection
@section("content")
    <form action="{{route("site.kullaniciBilgileriduzenle",$pw->id)}}" method="post" enctype="multipart/form-data">
        @csrf
            <input type="text" class="form-control" name="name" value="{{$pw->name}}">
            <br>
            <input type="text" class="form-control" name="surname" value="{{$pw->surname}}">
            <br>
            <input type="text" class="form-control" name="email" value="{{$pw->email}}">
            <br>
            <input type="password" class="form-control" name="password" value="{{$pw->password}}">
            <br>
            <input type="text" class="form-control" name="adres" value="{{$pw->adres}}">
            <br>
            <input type="text" class="form-control" name="phone" value="{{$pw->phone}}">
            <br>
            <input type="text" class="form-control" name="il" value="{{$pw->il}}">
            <br>
            <input type="text" class="form-control" name="ilce" value="{{$pw->ilce}}">
        <div class="card mt-5">
            <button type="submit" class="btn btn-primary mr-2"><i class="flaticon2-refresh-1"></i> Güncelle</button>
        </div>
    </form>


@endsection