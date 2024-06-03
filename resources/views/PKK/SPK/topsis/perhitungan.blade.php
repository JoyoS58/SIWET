@extends('layouts.templatePKK')
@section('title', 'TOPSIS')

@section('content_header')
<h1>TOPSIS</h1>
@endsection

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPSIS Calculation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-align-left mb-4">TOPSIS Calculation</h1>

        <!-- Matriks Keputusan -->
        <h2>Matriks Keputusan</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Alternative</th>
                    <th>Criteria 1</th>
                    <th>Criteria 2</th>
                    <th>Criteria 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alternative 1</td>
                    <td>4</td>
                    <td>3</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Alternative 2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Alternative 3</td>
                    <td>5</td>
                    <td>2</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Alternative 4</td>
                    <td>3</td>
                    <td>5</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Alternative 5</td>
                    <td>4</td>
                    <td>4</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>

        <!-- Normalisasi Matriks Keputusan -->
        <h2>Normalisasi Matriks Keputusan</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Alternative</th>
                    <th>Criteria 1</th>
                    <th>Criteria 2</th>
                    <th>Criteria 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alternative 1</td>
                    <td>0.5</td>
                    <td>0.424</td>
                    <td>0.566</td>
                </tr>
                <tr>
                    <td>Alternative 2</td>
                    <td>0.25</td>
                    <td>0.566</td>
                    <td>0.453</td>
                </tr>
                <tr>
                    <td>Alternative 3</td>
                    <td>0.625</td>
                    <td>0.283</td>
                    <td>0.34</td>
                </tr>
                <tr>
                    <td>Alternative 4</td>
                    <td>0.375</td>
                    <td>0.707</td>
                    <td>0.226</td>
                </tr>
                <tr>
                    <td>Alternative 5</td>
                    <td>0.5</td>
                    <td>0.566</td>
                    <td>0.34</td>
                </tr>
            </tbody>
        </table>

        <!-- Matriks Keputusan Terbobot -->
        <h2>Matriks Keputusan Terbobot</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Alternative</th>
                    <th>Criteria 1 (0.3)</th>
                    <th>Criteria 2 (0.4)</th>
                    <th>Criteria 3 (0.3)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alternative 1</td>
                    <td>0.15</td>
                    <td>0.1696</td>
                    <td>0.1698</td>
                </tr>
                <tr>
                    <td>Alternative 2</td>
                    <td>0.075</td>
                    <td>0.2264</td>
                    <td>0.1359</td>
                </tr>
                <tr>
                    <td>Alternative 3</td>
                    <td>0.1875</td>
                    <td>0.1132</td>
                    <td>0.1017</td>
                </tr>
                <tr>
                    <td>Alternative 4</td>
                    <td>0.1125</td>
                    <td>0.2828</td>
                    <td>0.0678</td>
                </tr>
                <tr>
                    <td>Alternative 5</td>
                    <td>0.15</td>
                    <td>0.2264</td>
                    <td>0.1017</td>
                </tr>
            </tbody>
        </table>

        <!-- Solusi Ideal Positif dan Negatif -->
        <h2>Solusi Ideal Positif dan Negatif</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th></th>
                    <th>Criteria 1</th>
                    <th>Criteria 2</th>
                    <th>Criteria 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Solusi Ideal Positif</td>
                    <td>0.1875</td>
                    <td>0.2828</td>
                    <td>0.1698</td>
                </tr>
                <tr>
                    <td>Solusi Ideal Negatif</td>
                    <td>0.075</td>
                    <td>0.1132</td>
                    <td>0.0678</td>
                </tr>
            </tbody>
        </table>

        <!-- Jarak ke Solusi Ideal Positif dan Negatif -->
        <h2>Jarak ke Solusi Ideal Positif dan Negatif</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Alternative</th>
                    <th>Jarak Positif (S+)</th>
                    <th>Jarak Negatif (S-)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alternative 1</td>
                    <td>0.0742</td>
                    <td>0.1231</td>
                </tr>
                <tr>
                    <td>Alternative 2</td>
                    <td>0.1541</td>
                    <td>0.0985</td>
                </tr>
                <tr>
                    <td>Alternative 3</td>
                    <td>0.1535</td>
                    <td>0.0532</td>
                </tr>
                <tr>
                    <td>Alternative 4</td>
                    <td>0.1741</td>
                    <td>0.0674</td>
                </tr>
                <tr>
                    <td>Alternative 5</td>
                    <td>0.1078</td>
                    <td>0.0998</td>
                </tr>
            </tbody>
        </table>

        <!-- Skor Preferensi dan Perangkingan -->
        <h2>Skor Preferensi dan Perangkingan</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Ranking</th>
                    <th>Alternative</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Alternative 1</td>
                    <td>0.624</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alternative 5</td>
                    <td>0.481</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alternative 3</td>
                    <td>0.368</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Alternative 2</td>
                    <td>0.346</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Alternative 4</td>
                    <td>0.279</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>




@endsection