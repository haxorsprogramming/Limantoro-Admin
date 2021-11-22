<table class="table bordered highlight" id="tblPermintaanMaterial">
    <thead>
        <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
            <th>No</th>
            <th>Kode Material</th>
            <th>Nama Material</th>
            <th>Qt Diminta</th>
            <th>Qt Disetujui</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataItem as $item)
    <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $item -> kode_material }}</td>
        <td>{{ $item -> materialData -> nama }}</td>
        <td>{{ $item -> qt }}</td>
        <td>
            <input type="number" class="qtRequest" style="width: 150px;" placeholder="Total disetujui">
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div style="text-align: center;">
    <a href="javascript:void(0)" class="btn" onclick="prosesPersetujuan()">Proses Persetujuan</a>
</div>

<script>
    $("#tblPermintaanMaterial").dataTable();
    
    function prosesPersetujuan()
    {
        let ti = document.querySelectorAll('.qtRequest').length;
        for(let i = 0; i < ti; i++){
            let qt = document.getElementsByClassName('qtRequest')[i].value;
            console.log(qt);
        }
        // $("#modalPersetujuan").closeModal();
    }
</script>