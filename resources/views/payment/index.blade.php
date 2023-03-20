<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>
<body>
    <h3>Info Pembayaran</h3>
    <div>
        <p>Total Tagihan: {{ $total_amount }}</p>
        <p>Total Pembayaran: {{ $total_payment }}</p>
        <p>Hutang/Kelebihan: {{ $credit }}</p>
    </div>

    <h3>Bayar</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/payments/{{$member_id}}" method="POST">
        @csrf
        <label for="fdate">Tanggal Bayar: </label>
        <input type="date" id="fdate" name="payment_date"><br><br>
        <label for="famount">Nilai: </label>
        <input type="number" id="famount" name="amount"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <h3>
        Daftar Pembayaran
    </h3>
    <table>
        <tr>
            <th>Tanggal Bayar</th>
            <th>Nilai</th>
        </tr>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->payment_date }}</td>
            <td>{{ $payment->amount }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
