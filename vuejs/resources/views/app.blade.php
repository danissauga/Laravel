<html lang="{{str_replace('_','-', app()->getLocale()) }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="with=device-width, initial-scale-1" />
    <meta name="scrf-token" value="{{csrf_token()}}" />
    <title></title>
    <head>
        <body>
            <div id="app">
            </div>
            <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
            </div>
        </body>
    </head>
</html>