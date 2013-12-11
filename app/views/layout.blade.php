<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Laravel Paste Bucket</title>
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('css/style.css') }}
</head>
<body onload="prettyPrint()">
        <div class="header">
                <script type="text/javascript">
                function createPaste()
                {
                        $("#paster").submit();
                }
                </script>
                <a class="logo" href="http://laravel.com">{{ HTML::image('img/logo-head.png') }}</a>
                <ul class="buttons">
                        @yield('buttons')
                </ul>
        </div>

        @yield('content')

        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') }}
        {{ HTML::script('js/prettify.js') }}
        {{ HTML::script('js/tabby.js') }}
        {{ HTML::script('js/script.js') }}
        @yield('scripts')
</body>
</html>