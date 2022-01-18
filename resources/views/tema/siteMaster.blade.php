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
    <div class="container">
        <div class="row gx-4 justify-content-center">
            <div class="col">
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
