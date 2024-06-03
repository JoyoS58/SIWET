@extends('layouts.templatePKK')
@section('title', 'Pengelolaan Kas PKK')

@section('content_header')
<h1>Pengelolaan Keuangan PKK</h1>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPSIS Calculation Steps</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>TOPSIS Calculation Steps</h1>

    <h2>Normalized Matrix</h2>
    <table>
        <tr>
            <th>Alternative</th>
        </tr>
    </table>

    <h2>Weighted Normalized Matrix</h2>
    <table>
        <tr>
            <th>Alternative</th>
        </tr>
    </table>

    <h2>Ideal Solutions</h2>
    <table>
        <tr>
            <th>Type</th>
        </tr>
        <tr>
            <td>Ideal Best</td>
        </tr>
        <tr>
            <td>Ideal Worst</td>
        </tr>
    </table>

    <h2>Distances</h2>
    <table>
        <tr>
            <th>Alternative</th>
            <th>Distance to Ideal Best</th>
            <th>Distance to Ideal Worst</th>
        </tr>
    </table>

    <h2>Scores</h2>
    <table>
        <tr>
            <th>Alternative</th>
            <th>Score</th>
        </tr>
    </table>

    <h2>Rankings</h2>
    <table>
        <tr>
            <th>Alternative</th>
            <th>Score</th>
        </tr>
    </table>
</body>
</html>
@endsection