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
            <input type="hidden" class="kdBat" value="{{ $item -> kode_material }}">
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div style="text-align: center;" id="dDataMaterialBot">
    <a href="javascript:void(0)" class="btn" onclick="prosesPersetujuan('{{ $noPr }}')">Proses Persetujuan</a>
</div>

<script>

    var rToProsesPersetujuanPermintaan = server + "app/persetujuan-permintaan-pembelian/proses";

    $("#tblPermintaanMaterial").dataTable();
    
    var dBantuan = new Vue({
        el : '#dDataMaterialBot',
        data : {
            dataQt : []
        }
    });

    function prosesPersetujuan(noPr)
    {
        let ti = document.querySelectorAll('.qtRequest').length;
        for(let i = 0; i < ti; i++){
            let qt = document.getElementsByClassName('qtRequest')[i].value;
            let kd = document.getElementsByClassName('kdBat')[i].value;
            dBantuan.dataQt.push({kode:kd, qt:qt});
        }
        let ds = {'noPr':noPr, 'dataQt':dBantuan.dataQt}

        axios.post(rToProsesPersetujuanPermintaan, ds).then(function(res){
            let obj = res.data;
            console.log(obj);
        });

    }
</script>