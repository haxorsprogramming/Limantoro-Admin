<!DOCTYPE html>
<html>

<head>
    <title>Cetak Permintaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body style="margin-top: -40px;">

    <table style="width: 100%;border-bottom: 2px solid black;">
        <tr>
            <td style="width: 100px;">
                <img src="{{asset('base/logo.png')}}" style="width: 100px;">
            </td>
            <td>
                <b>PT. LIMANTORO AGUNG PROPERTY</b><br />
                Jln. Cemara asri, No 22<br />
                Telp. 061 4123 421 / 0814-8765-097
            </td>
            <td style="text-align: right;">
                <h3><b>{{ $judul }}</b></h3>
            </td>
        </tr>
    </table>