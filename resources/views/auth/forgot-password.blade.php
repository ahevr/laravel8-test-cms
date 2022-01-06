@extends("tema.admin.page.giris.loginMaster")
@section("content")

    @if (session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <ul>
                        {{ session('status') }}
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!--begin::Login Header-->
    <div class="d-flex flex-center mb-15">
        <a href="#">
            <img src="{{asset("tema/admin")}}/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
        </a>
    </div>
    <!--end::Login Header-->
    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal">Sign In To Admin</h3>
            <p class="opacity-40">Enter your details to login to your account:</p>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
            </div>

            <div class="form-group text-center mt-10">
                <button  type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Gönder</button>
            </div>

        </form>

    </div>
    <!--end::Login Sign in form-->

@endsection
