@extends("tema.admin.page.giris.loginMaster")
@section("content")

    <!--begin::Login Header-->
    <div class="d-flex flex-center mb-15">
        <a href="#">
            <img src="{{asset("tema/admin")}}/media/logos/logo-letter-13.png" class="max-h-75px" alt="Logo" />
        </a>
    </div>
    <!--end::Login Header-->
    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal">Giriş Yap</h3>
            <p class="opacity-40">Lütfen Giriş Bilgilerini Doldurun</p>
        </div>
        <form class="form" action="{{route("admin.check")}}" method="post" >
            @csrf
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                <span class="text-danger">@error("email"){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
                <span class="text-danger">@error("password"){{$message}}@enderror</span>
            </div>

            <div class="form-group text-center mt-10">
                <button  type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Giriş</button>
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                        <input type="checkbox" name="remember">
                        <span></span>Beni Hatırla</label>
                </div>
                <a href="/forgot-password" id="kt_login_forgot" class="text-white font-weight-bold">Şifremi Unuttum ?</a>
            </div>
        </form>
{{--        <div class="mt-10">--}}
{{--            <span class="opacity-40 mr-4">Hesabın Yok Mu ?</span>--}}
{{--            <a href="{{route("admin.register")}}" id="kt_login_signup" class="text-white opacity-30 font-weight-normal">Kayıt Ol</a>--}}
{{--        </div>--}}
    </div>
@endsection
