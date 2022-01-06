@extends("tema.master")
@section("content")
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
