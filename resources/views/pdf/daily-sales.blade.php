<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjualan Harian</title>
    <style>
        table * {
            font-size: 10pt;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h1,
        h2 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 16px;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .penjualan {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Penjualan Harian</h1>
    <p>Data penjualan harian CV. Multi Grafika periode {{ Carbon\Carbon::now()->isoFormat('MMMM YYYY') }}</p>

    @foreach ($orders as $date => $order)
        <div class="penjualan">
            <h2>Tanggal {{ $date }}</h2>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Sticker</th>
                        <th>Price</th>
                        <th>Freelance Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->sticker->name }}</td>
                            <td>Rp. {{ number_format($item->price) }}</td>
                            <td>Rp. {{ number_format($item->freelance_price) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td>Rp. {{ number_format($order->sum('price')) }}</td>
                        <td>Rp. {{ number_format($order->sum('freelance_price')) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</body>

</html>
