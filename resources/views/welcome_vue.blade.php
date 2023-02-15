<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ampeco</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        <div id="app"></div>
    </body>
    <script>
        window.labels = {!! json_encode($labels, JSON_HEX_TAG) !!};
        window.bitcoinValues = {!! json_encode($bitcoinValues, JSON_HEX_TAG) !!};
    </script>
</html>
