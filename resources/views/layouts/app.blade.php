<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $global['title'] }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <nav id="main-nav" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <ul class="nav navbar-nav pull-sm-left">
                <li>
                    <a class="navbar-brand" href="/">{{ $global['title'] }}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav mx-auto">
                <li>
                    <h1 class="navbar-page-title" >
                        @yield('page_title')
                    </h1>
                </li>
            </ul>
        </nav>
        <main role="main" id="app">

            @yield('content')
             <!-- /container -->
        </main>

        <footer class="container">
            <p>&copy; Company 2017-2018</p>
        </footer>
        
        <script src="{{mix('/js/app.js')}}"type="text/javascript"></script>
    </body>
</html>
