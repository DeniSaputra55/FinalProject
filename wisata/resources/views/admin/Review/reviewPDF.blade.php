<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ulasan</title>
</head>
<body>
    <h3 align="center">Data Ulasan</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <td>No</td>
                <td>Pengunjung</td>
                <td>Wisata</td>
                <td>Ulasan</td>
                
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($ulasan as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->nama}}</td>
                <td>{{$row->wisata}}</td>
                <td>{{$row->komentar}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
