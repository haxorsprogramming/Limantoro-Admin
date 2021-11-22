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
                <h3><b>Permintaan Pembelian</b></h3>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <table style="width:100%;font-size:10px;">
                <tr>
                    <td>Project </td><td>: Project</td>
                    <td>No Pr </td><td>: {{ $noPr }}</td>
                    <td>Tanggal Permintaan </td><td>: Project</td>
                </tr>
                <tr>
                    <td>Alamat </td><td>: Project</td>
                    <td>Penanggung Jawab </td><td>: Project</td>
                    <td> </td><td></td><td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <table class="table table-bordered" style="font-size:13px;">
            <thead>
                <tr style="background-color: #636e72;color:#dfe6e9;">
                    <td>No</td><td>Kode Material</td><td>Nama Material</td><td>Satuan</td><td>Quantity</td><td>Pesan</td>
                </tr>
            </thead>
            <tbody>
                @foreach($dataItem as $item)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $item -> kode_material }}</td>
                    <td>{{ $item -> materialData -> nama }}</td>
                    <td>{{ $item -> materialData -> satuan }}</td>
                    <td>{{ $item -> qt }}</td>
                    <td>{{ $item -> pesan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-4" style="float: right;font-size:11px;">
        <p style="text-align: center;">Dibuat oleh</p>
        <p></p>
        <p></p>
        <p style="text-align: center;">{{ $userProfile -> nama_lengkap }}</p>
    </div>

</body>

</html>