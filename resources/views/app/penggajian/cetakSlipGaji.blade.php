@include('layout.headerCetak')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table style="width:100%;font-size:10px;">
            <tr>
                <td>Nama Karyawan </td>
                <td> : {{ $dataKaryawan -> nama_lengkap }}</td>
                <td>Email </td>
                <td>: -</td>
                <td>Jabatan </td>
                <td>: </td>
            </tr>
            <tr>
                <td>Tipe Karywan </td>
                <td>: {{ $dataKaryawan -> tipe }}</td>
                <td>Alamat </td>
                <td>: {{ $dataKaryawan -> alamat }}</td>
                <td>Waktu Cetak</td>
                <td>: {{ $dataPenggajian -> created_at }}</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<hr/>
<strong>Earnings</strong>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table style="width:100%;font-size:10px;" class="table table-bordered">
            <tr>
                <th>Item</th><th>Value</th>
            </tr>
            <tr>
                <td>Gaji Pokok</td><td>Rp. {{ number_format($dataPenggajian -> gaji_pokok) }}</td>
            </tr>
            <tr>
                <td>Tunjangan Tetap</td><td>Rp. {{ number_format($dataPenggajian -> tunjangan_tetap) }}</td>
            </tr>
            <tr>
                <td>Tunjangan Makan</td><td>Rp. {{ number_format($dataPenggajian -> tunjangan_makan) }}</td>
            </tr>
            <tr>
                <td>Bonus</td><td>Rp. 0</td>
            </tr>
            <tr>
                <td>Lembur</td><td>Rp. {{ number_format($hasilPerhitungan -> earnings -> overtime) }}</td>
            </tr>
        </table>
    </div>
</div>

<strong>Deductions</strong>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table style="width:100%;font-size:10px;" class="table table-bordered">
            <tr>
                <th>Item</th><th>Value</th>
            </tr>
            <tr>
                <td>Kasbon</td><td>Rp. {{ number_format($hasilPerhitungan -> deductions -> kasbon) }}</td>
            </tr>
            <tr>
                <td>Pph 21</td><td>Rp. {{ number_format($hasilPerhitungan -> deductions -> pph21Tax) }}</td>
            </tr>
        </table>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table style="width:100%;font-size:10px;" class="table table-bordered">
            <tr>
                <td>Take Home Pay</td><td><b>Rp. {{ number_format($hasilPerhitungan -> takeHomePay) }}</b></td>
            </tr>
        </table>
    </div>
</div>

<div style="font-size:10px;">
Dicetak oleh : 
<br/>
<br/>
{{$userData -> username}} 
@if($userData -> role == '1')
(Owner)
@elseif($userData -> role == '2')
(Manager)
@else
(Purchasing)
@endif
</div>

@include('layout.footerCetak')