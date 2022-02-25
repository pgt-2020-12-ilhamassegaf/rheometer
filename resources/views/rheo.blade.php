<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
    <script type="text/javascript">
        function autoRefreshPage() {
            window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 15000);
    </script>

    <table border="1">
        <tr>
            <th>No</th>
            <th>IDRHEO</th>
            <th>TANGGAL</th>
            <th>JAM</th>
            <th>COMPOUND</th>
            <th>SHIFT</th>
            <th>ARMB</th>
            <th>MCA</th>
            <th>LOT</th>
            <th>BATCH</th>
            <th>ML</th>
            <th>TC30</th>
            <th>TC95</th>
            <th>MH</th>
            <th>HASIL</th>
            <th>BARCODE</th>
        </tr>
        <?php $no = 1; ?>
        @foreach ($data as $d)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d['idrheo'] }}</td>
                <td>{{ $d['tanggal'] }}</td>
                <td>{{ $d['jam'] }}</td>
                <td>{{ $d['compd'] }}</td>
                <td>{{ $d['shift'] }}</td>
                <td>{{ $d['mesin'] }}</td>
                <td>{{ $d['mixing'] }}</td>
                <td>{{ $d['lot'] }}</td>
                <td>{{ $d['batch'] }}</td>
                <td>{{ $d['ml'] }}</td>
                <td>{{ $d['mh'] }}</td>
                <td>{{ $d['hasiltest'] }}</td>
                <td>{{ $d['tc30'] }}</td>
                <td>{{ $d['tc95'] }}</td>
                <td>{{ $d['barcode'] }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
