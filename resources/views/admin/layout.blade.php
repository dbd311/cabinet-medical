<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OsteoRDV | Gestion de rendez-vous en ligne</title>

        <link href="{{ asset('/css/cpanel/admin/style.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="/images/icons/favicon.png"/>
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    </head>  
    <body>
        <div id="url" style="display: none">{{url('')}}</div>
        @include('admin.header')
        @yield('content')

        <script src="{{ elixir('/js/cpanel/admin/admin_space.js') }}"></script>

        @yield('js')
    </body>
</html>