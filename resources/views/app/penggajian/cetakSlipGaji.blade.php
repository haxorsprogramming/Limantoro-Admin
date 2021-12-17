@include('layout.headerCetak')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table style="width:100%;font-size:10px;">
            <tr>
                <td>Nama Karyawan </td>
                <td> : {{ $dataKaryawan -> nama_lengkap }}</td>
                <td>NIK </td>
                <td>: </td>
                <td>Jabatan </td>
                <td>: </td>
            </tr>
            <tr>
                <td>Tipe Karywan </td>
                <td>: </td>
                <td>Alamat </td>
                <td>: </td>
                <td> </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>

@include('layout.footerCetak')