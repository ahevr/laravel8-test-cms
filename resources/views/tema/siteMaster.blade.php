<!DOCTYPE html>
<html lang="tr">
<head>
@include("tema.site.page.inc.head")
</head>
<body>

<!-- Navigation-->

@include("tema.site.page.inc.navbar")

<!-- Header-->
@include("tema.site.page.inc.header")

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                @yield("content")
            </div>
        </div>
    </div>
</section>

<!-- Footer-->

@include("tema.site.page.inc.footer")

<!-- Bootstrap core JS-->
@include("tema.site.page.inc.script")
</body>
</html>
