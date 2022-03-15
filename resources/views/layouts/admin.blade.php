<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    
    <!-- Styles -->
    <link href="{{asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class = "wrapper">
          @include('layouts.inc.sidebar')

       <div class="main-panel">
           @include('layouts.inc.adminnav')

           <div class = "content">
               @yield('content')
           </div>
           @include('layouts.inc.adminfooter')
       </div>
   </div>

    <!-- Scripts -->
<!-- JavaScript Bundle with Popper -->
<script src="{{ asset('admin/js/jquery.3.2.1.min.js') }}" type="text/javascript"  defer></script>
<script src="{{ asset('admin/js/popper.min.js') }}" type="text/javascript" defer></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript" defer></script>
<script src="{{asset('admin/js/bootstrap-switch.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

   @if(Session('status'))
   <script>
       swal("{{Session('status')}}")
   </script>
   @endif

    <!-- <script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
    </script> -->

    @yield('js')

</body>
</html>
