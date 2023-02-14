<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ampeco</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Ampeco assignment</h1>
        </div>

        <div class="container mt-5">
            <h4>Bitcoin price USD</h4>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <h4>Subscribe for email notification on price exceeded</h4>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <form method="POST" action="/">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labels = {!! json_encode($labels, JSON_HEX_TAG) !!};
            const bitcoinValues = {!! json_encode($bitcoinValues, JSON_HEX_TAG) !!};
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Bitcoin price USD',
                        data: bitcoinValues,
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                        x: {
                            ticks: {
                                callback: function(val, index) {
                                    return index % 2 === 0 ? this.getLabelForValue(val) : '';
                                },
                            },
                        },
                    },
                },
            });
        </script>
    </body>
</html>
