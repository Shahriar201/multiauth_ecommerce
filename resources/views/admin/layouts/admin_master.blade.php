<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Ecommerce</title>

    <!-- vendor css -->
    <link href="{{ asset('public/backend') }}//lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}//lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}//lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}//lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('public/backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> --}}

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}//css/starlight.css">

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/backend/lib/toastr/toastr.css') }}">

    <!-- Tagsinput -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.layouts.admin_sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.layouts.admin_header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      @yield('admin_content')

      {{-- @include('admin.admin_footer') --}}

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script>
        $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>

    <script src="{{ asset('public/backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('public/backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('public/backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('public/backend') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ asset('public/backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('public/backend') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('public/backend') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('public/backend') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('public/backend') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ asset('public/backend') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ asset('public/backend') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('public/backend') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('public/backend') }}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{ asset('public/backend') }}/js/starlight.js"></script>
    <script src="{{ asset('public/backend') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('public/backend') }}/js/dashboard.js"></script>
    <script src="{{ asset('public/backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('public/backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('public/backend') }}/lib/select2/js/select2.min.js"></script>

    <script src="{{ asset('public/backend/lib/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('public/backend') }}/lib/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('public/backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/medium-editor/medium-editor.js') }}"></script>

    <script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
    <script>
        $(function(){
          'use strict';

          // Inline editor
          var editor = new MediumEditor('.editable');

          // Summernote editor
          $('#summernote').summernote({
            height: 150,
            tooltip: false
          })
        });
      </script>

  </body>
</html>
