<!DOCTYPE html>
<html lang="tr">
<head>
    @include("tema.admin.page.giris.login_inc.head")
</head>


<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{asset("tema/admin")}}/media/bg/bg-2.jpg);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                @yield("content")
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')

@include("tema.admin.page.giris.login_inc.script")

</body>
</html>
