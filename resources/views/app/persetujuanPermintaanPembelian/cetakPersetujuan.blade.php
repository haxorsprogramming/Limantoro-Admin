@include('layout.headerCetak')
<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <table style="width:100%;font-size:10px;">
                <tr>
                    <td>Project </td><td> : {{ $dataProject -> nama}}</td>
                    <td>No Pr </td><td>: {{ $noPr }}</td>
                    <td>Tanggal Permintaan </td><td>: {{ $dataProject -> tanggal}}</td>
                </tr>
                <tr>
                    <td>Alamat </td><td>: {{ $dataProject -> alamat }}</td>
                    <td>Penanggung Jawab </td><td>: {{ $dataProject -> penanggung_jawab}}</td>
                    <td></td><td></td><td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <table class="table table-bordered" style="font-size:13px;">
            <thead>
                <tr style="background-color: #636e72;color:#dfe6e9;">
                    <td>No</td>
                    <td>Kode Material</td>
                    <td>Nama Material</td>
                    <td>Satuan</td>
                    <td>Quantity</td>
                    <td>Quantity Approve</td>
                    <td>Pesan</td>
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
                    <td>{{ $item -> qt_approve }}</td>
                    <td>{{ $item -> pesan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-4" style="float: right;font-size:11px;">
        <p style="text-align: center;">Disetujui oleh</p>
        <p></p>
        <p></p>
        <p style="text-align: center;">{{ $approver }}</p>
    </div>

</body>
