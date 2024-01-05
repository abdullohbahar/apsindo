<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>
</head>

<body>
    <?php header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=Riwayat Pembayaran ' . $month . ' - ' . $year . '.xlsx');
    header('Cache-Control: max-age=0'); ?>
    <table style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Keterangan</th>
                <th>Tanggal Pembayaran</th>
                <th>Tanggal Langganan</th>
                <th>Tanggal Berakhir Langganan</th>
                <th>Metode Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($subs as $sub)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $sub->user->profile->nama_lengkap }}</td>
                    <td>{{ $sub->user->email }}</td>
                    <td>'{{ $sub->user->profile->no_telepon }}</td>
                    <td>{{ $sub->information }}</td>
                    <td>{{ Carbon\Carbon::parse($sub->updated_at)->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($sub->date_start)->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($sub->date_end)->format('d-m-Y') }}</td>
                    <td>{{ $sub->metode_pembayaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
