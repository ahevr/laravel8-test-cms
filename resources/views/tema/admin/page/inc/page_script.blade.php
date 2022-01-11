<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<script src="{{asset("tema/admin")}}/plugins/global/plugins.bundle.js"></script>
<script src="{{asset("tema/admin")}}/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{asset("tema/admin")}}/js/scripts.bundle.js"></script>
<script src="{{asset("tema/admin")}}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="{{asset("tema/admin")}}/js/pages/widgets.js"></script>
<script src="{{asset("tema/admin")}}/toastr/iziToast.min.js"></script>
<script>
    $(".silButton").click(function () {
        $(".silButton").click(function () {
            var    $data_url= $(this).data("url");
            Swal.fire({
                title: 'Emin Misiniz?',
                text: "Bu işlem geri alınmaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Hayır'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $data_url;
                }
            });
        });
    });
</script>


<script>
        $('.isActive').change(function() {

            var $data       = $(this).prop("checked");
            var $data_url   = $(this).data("url");

            if (typeof $data !== "undefined" && typeof $data_url !== "undefined"){

                $.post($data_url,{data:$data},function (response) {
                    alert(response);
                });

            }

        })

</script>

<script>
    $(document).ready(function () {
        $(document).on("keyup", ".hesaplama", calcAll); //
        $(".hesaplama").on("change", calcAll); });
    function calcAll() {
        $(".satir").each(function () {
            var fiyat = 0;
            var iskonto = 0;

            if (!isNaN(parseFloat($(this).find(".fiyat").val()))) {
                fiyat = parseFloat($(this).find(".fiyat").val());
            }
            if (!isNaN(parseFloat($(this).find(".iskonto").val()))) {
                iskonto = parseFloat($(this).find(".iskonto").val());
            }
            iskontotutar = fiyat * iskonto/100;
            $(this).find(".iskontotutar").val(iskontotutar.toFixed(2));

            satisfiyati = fiyat - iskontotutar;
            $(this).find(".satisfiyati").val(satisfiyati.toFixed(2));
        });
    }
</script>
<script>
    $(document).ready(function(){
        $('#myModal').modal('toggle');
    });

</script>
