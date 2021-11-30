<table id="tblMaterialData" class="table bordered highlight">
    <thead>
        <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
            <th>No</th>
            <th>Kode Material</th>
            <th>Nama Material</th>
            <th>Satuan</th>
            <th>Qt Tersedia</th>
            <th>Qt Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataItemMaterial as $itemMaterial)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $itemMaterial -> kode_material }}</td>
            <td>{{ $itemMaterial -> materialData -> nama }}</td>
            <td>{{ $itemMaterial -> materialData -> satuan }}</td>
            <td>{{ $itemMaterial -> qt }}</td>
            <td>
                <input type="number" style="width: 300px;">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row" style="text-align: center;">
    <a href="javascript:void(0)" class="btn" id="btnProses" onclick="prosesPenerimaan()">
        <i class="material-icons left">file_download_done</i> Proses Penerimaan
    </a>
</div>

<script>
    $("#tblMaterialData").dataTable();
    function prosesPenerimaan()
    {
        let noGr = document.querySelector("#txtNoGr").value;
        
    }
</script>