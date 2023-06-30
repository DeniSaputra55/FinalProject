<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rating</title>
</head>
<body>
    <h3 align="center">Data Rating</h3>
<table border="1" cellpadding="10" align="center">
<thead>
    <tr>
        <td>No</td>
        <td>Pengunjung</td>
        <td>Wisata</td>
        <td>Rating</td>
    </tr>
</thead>
<tbody>
@php
                $no = 1;
                @endphp
                @foreach($data as $r)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$r->pengunjung}}</td>
                    <td>{{$r->wisata}}</td>
                    <td>{{$r->nama}}</td>
            </tr>
            @endforeach
        </tbody>

</table>
</body>
</html>