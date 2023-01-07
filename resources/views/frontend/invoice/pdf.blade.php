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
            font-size: 20px;
            text-align: center;
        }
        h3 {
            font-size: 18px;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 4px;
        }

        header div {
            display: inline-block;
            text-align: center;
        }

        header .half-desc {
            margin-left: 250px;
            margin-bottom: 20px;
        }

        header .half-desc p {
            text-align: center;
        }

        header img {
            width: 180px;
        }

        .half-desc p {
            font-size: 15px;
        }

        .container-sm {
            margin-top: 15px;
            text-align: center;
        }

        .container-sm table {
            width: 100%;
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
            padding: 4px;
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
            width: 120px;
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
            <img src="{{ public_path('storage/logo/black-lg.jpg') }}" alt="" />
        </div>
        <div class="half-desc">
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
                    {{ $index = 0 }}

                    @foreach ($data->products as $product)
                        <tr>
                            <td>{{ $index + 1 }}. {{ $product['desc'] }}</td>
                            <td class="text-center width">{{ number_format($product['price'] / 100, 2) }} zł</td>
                        </tr>

                        
                        @if ($index == 12)
                        <tr class="page-break">
                            <td></td>
                            <td></td>
                        </tr>
                        @endif

                        {{ $index++ }}
                    @endforeach

                    @foreach ($data->selectProducts as $product)
                        <tr>
                            <td>{{ $index + 1 }}. {{ $product->proName }}   {{ $product->pivot->qnty != 1 ? 'x'.$product->pivot->qnty : '' }}</td>
                            <td class="text-center width">{{ number_format($product->price / 100 * $product->pivot->qnty, 2) }} zł</td>
                        </tr>

                        
                        @if ($index == 12)
                        <tr class="page-break">
                            <td></td>
                            <td></td>
                        </tr>
                        @endif

                        {{ $index++ }}
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="container {{ count($data->products) + count($data->selectProducts) < 12 ?  '' : 'dont-break' }}">
            <h2>Części Serwisowe</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th class="text-left">Opis</th>
                        <th class="text-center width">Cena</th>
                    </tr>
                </thead>
                <tbody>

                    {{ $index = 0 }}

                    @foreach ($data->parts as $part)
                        <tr>
                            <td>{{ $index + 1 }}. {{ $part['desc'] }}</td>
                            <td class="text-center width">{{ number_format($part['price'] / 100, 2) }} zł</td>
                        </tr>

                        {{ $index++ }}
                    @endforeach

                    @foreach ($data->selectParts as $part)
                        <tr>
                            <td>{{ $index + 1 }}. {{ $part->name }}   {{ $part->pivot->qnty != 1 ? 'x'.$part->pivot->qnty : '' }}</td>
                            <td class="text-center width">{{ number_format($part->price / 100 * $part->pivot->qnty, 2) }} zł</td>
                        </tr>

                        {{ $index++ }}
                    @endforeach

                    <tr>
                        <td>
                            <h3>Suma</h3>
                        </td>
                        <td>
                            <h3 class="text-center">{{ number_format($data->amount / 100, 2) }} zł</h3>
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
        <div class="container text-center">
			<p>Data utworzenia dokumentu: {{ $data->created_at->format('Y/m/d') }}</p>
        </div>
		<div class="container text-center">
			<p>
				<small>Dokument wygenerowany elektronicznie przez {{ $company->name }}. Podpis nie jest wymagany.</small>
			</p>
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
