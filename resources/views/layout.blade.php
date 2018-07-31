<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/cr-1.5.0/r-2.2.2/datatables.min.css"/>
    </head>

    <body>
        <div class="container" style="margin-top: 20px;">
            @include('errors')
            @yield('content')
        </div>

        <script src="/js/app.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/cr-1.5.0/r-2.2.2/datatables.min.js"></script>        
        <script>
            $(document).ready(function() {
                $('#items').DataTable();
            } );            
        </script>
    </body>

</html>