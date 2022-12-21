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
        }

        body {
            padding: 50px;
            font-family: DejaVu Sans;
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
            margin-left: 100px;
        }

        header .half-desc p {
            text-align: center;
        }

        header .half-desc .font-sm {
            margin-bottom: 15px;
        }

        header img {
            width: 270px;
        }

        .half-desc h1 {
            margin-bottom: 5px;
            font-size: 35px;
        }

        .half-desc p {
            font-size: 15px;
        }

        .container-sm {
            margin-top: 15px;
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

        .container table .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .container table .width {
            width: 100px;
        }

        .page-break {
            page-break-after: always;
        }
        
        .dont-break {
            page-break-inside: avoid;
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
                    <td class="text-center">Numer Dokumentu</td>
                    <td class="text-center">{{ $data->number }}</td>
                </tr>
                <tr>
                    <td class="text-center">Marka/Model</td>
                    <td class="text-center">{{ $data->make }} {{ $data->model }}</td>
                </tr>
                <tr>
                    <td class="text-center">Numer Rejestracyjny</td>
                    <td class="text-center">{{ $data->registration }}</td>
                </tr>
                <tr>
                    <td class="text-center">Numer VIN</td>
                    <td class="text-center">{{ $data->vin }}</td>
                </tr>
                <tr>
                    <td class="text-center">Przebieg</td>
                    <td class="text-center">{{ $data->mileage }} km</td>
                </tr>
            </table>
        </div>
        <div class="container">
            <h2>Wykonane Czynności Serwisowe</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th class="text-left">Opis</th>
                        <th class="text-center width">Cena</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data->jobs['desc'] as $job)
                        <tr>
                            <td>{{ $loop->index + 1 }}. {{ $data->jobs['desc'][$loop->index] }}</td>
                            <td class="text-center width">{{ $data->jobs['price'][$loop->index] / 100 }} zł</td>
                        </tr>

                        @if ($loop->index == 8)
                        <tr class="page-break">
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="container">
            <h2>Części Serwisowe</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th class="text-left">Opis</th>
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
        <div class="container dont-break">
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
    <script type="text/php"> 
        
        if (isset($pdf)) { 
        //Shows number center-bottom of A4 page with $x,$y values
            $x = 290;  //X-axis i.e. vertical position 
            $y = 790; //Y-axis horizontal position
            $text = "{PAGE_NUM}/{PAGE_COUNT}";  //format of display message
            $font =  $fontMetrics->get_font("DejaVu");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    
    </script> 

</body>

</html>
