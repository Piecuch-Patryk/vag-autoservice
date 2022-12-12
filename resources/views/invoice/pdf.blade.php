<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            padding: 50px;
        }

        h2 {
            margin-bottom: 10px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
        }

        header div {
            display: inline-block;
            text-align: center;
        }

        header .half-desc {
            margin-left: 150px;
        }

        header .half-desc p {
            text-align: center;
        }

        header img {
            width: 300px;
        }

        .half-desc h1 {
            margin-bottom: 20px;
            font-size: 40px;
        }

        .half-desc p {
            font-size: 20px;
			margin-bottom: 8px;
        }

        .container-sm {
            margin-top: 50px;
            text-align: center;
        }

        .container-sm table {
            width: 70%;
            margin: 0 auto;
        }

        .container-sm table td {
            border-right: 0;
        }

        .container-sm table td {
            border-left: 0;
        }

        .container {
            margin: 15px 0;
        }

        .container .half {
            display: inline-block;
            width: 49%;
            text-align: center;
        }

        .container .lg {
            border: 1px solid black;
            padding: 10px;
        }

        .container table {
            width: 100%;
            text-align: left;
        }

        .container table .text-center {
            text-align: center;
        }

        .container table .width {
            width: 100px;
        }

        footer {
            margin-top: 75px;
        }
    </style>

</head>

<body>
    <header>
        <div>
            <img
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/logo/black-lg.png'))) }}">
        </div>
        <div class="half-desc">
            <h1>{{ $company->name }}</h1>
            <p>{{ $company->phone }}</p>
			<p>{{ $company->email }}</p>
            <p class="font-sm">{{ $company->post_code }} {{ $company->city }}, {{ $company->street }} {{ $company->number }} </p>
        </div>
    </header>

    <main>
        <div class="container-sm">
            <h2>Dane Samochodu</h2>
            <table border="1">
                <tr>
                    <td>Numer Dokumentu</td>
                    <td>{{ $data->number }}</td>
                </tr>
                <tr>
                    <td>Marka/Model</td>
                    <td>{{ $data->make }} {{ $data->model }}</td>
                </tr>
                <tr>
                    <td>Numer Rejestracyjny</td>
                    <td>{{ $data->registration }}</td>
                </tr>
                <tr>
                    <td>Numer VIN</td>
                    <td>{{ $data->vin }}</td>
                </tr>
                <tr>
                    <td>Przebieg</td>
                    <td>{{ $data->milage }} km</td>
                </tr>
            </table>
        </div>
        <div class="container">
            <h2>Wykonane Czynności Serwisowe</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Opis</th>
                        <th class="text-center width">Cena</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data->jobs['desc'] as $job)
                        <tr>
                            <td>{{ $loop->index + 1 }}. {{ $data->jobs['desc'][$loop->index] }}</td>
                            <td class="text-center width">{{ $data->jobs['price'][$loop->index] / 100 }} zł</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="container">
            <h2>Części Serwisowe</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Opis</th>
                        <th class="text-center width">Cena</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data->parts['desc'] as $job)
                        <tr>
                            <td>{{ $loop->index + 1 }}. {{ $data->parts['desc'][$loop->index] }}</td>
                            <td class="text-center width">{{ $data->parts['price'][$loop->index] / 100 }} zł</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td>
                            <h3>Suma</h3>
                        </td>
                        <td>
                            <h3 class="text-center">{{ $data->amount / 100 }} zł</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h2>Uwagi Dotyczące Serwisu</h2>
            <div class="lg">
                <p>{{ $data->description ? $data->description : 'Brak dodatkowych informacji.' }}</p>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="half">
                <p>Data utworzenia dokumentu:</p>
                <p>{{ $data->created_at->format('Y/m/d') }}</p>
            </div>
            <div class="half">
                <p>Podpis/Pieczęć</p>
                <p>.......................................</p>
            </div>
        </div>
    </footer>
</body>

</html>
