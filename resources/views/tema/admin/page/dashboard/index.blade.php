@extends("tema.master")
@section("content")
    @include("tema.admin.page.inc.page_style")
    @include("tema.admin.page.inc.page_script")
    <pre>



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                 Hoşgeldin :{{Auth::user()->name}}
                 Hoşgeldin :{{Auth::user()->email}}
                 Blank Page Metronic Admin Panel
            </div>
            <div class="col-md-4">
                 Hoşgeldin :{{Auth::user()->name}}
                 Hoşgeldin :{{Auth::user()->email}}
                 Blank Page Metronic Admin Panel
            </div>
            <div class="col-md-4">
                 Hoşgeldin :{{Auth::user()->name}}
                 Hoşgeldin :{{Auth::user()->email}}
                 Blank Page Metronic Admin Panel
            </div>
         </div>
    </div>

</pre>





@endsection
