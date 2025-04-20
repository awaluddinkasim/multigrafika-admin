<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .invoice-box {
            max-width: 100%;
            padding: 20px;
            border: 1px solid #eee;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .info,
        .items,
        .totals {
            width: 100%;
            margin-bottom: 20px;
        }

        .items th,
        .items td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .totals td {
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="heading">
            <strong>Nota Transaksi</strong><br>
            ID Pesanan: {{ $order->order_id }}
        </div>

        <div class="info">
            <strong>Pelanggan</strong><br>
            Nama: {{ $order->user->name }}<br>
            Email: {{ $order->user->email }}<br>
            Telepon: {{ $order->user->phone }}<br>
            Alamat: {{ $order->user->address }}
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Stiker</th>
                    <th>Tipe</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Harga Freelance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->sticker->name }}</td>
                    <td>{{ ucfirst($order->sticker->type) }}</td>
                    <td>{{ ucfirst($order->sticker->brand) }}</td>
                    <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($order->freelance_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table class="totals">
            <tr>
                <td><strong>Status:</strong> {{ ucfirst($order->status) }}</td>
                <td><strong>Tanggal:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
