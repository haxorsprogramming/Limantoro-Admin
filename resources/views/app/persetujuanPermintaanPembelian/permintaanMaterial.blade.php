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
    <a href="javascript:void(0)" class="btn" id="btnProses" onclick="prosesPersetujuan('{{ $noPr }}')">@{{ btnProsesText }}</a>
</div>

<script>

    var rToProsesPersetujuanPermintaan = server + "app/persetujuan-permintaan-pembelian/proses";

    $("#tblPermintaanMaterial").dataTable();
    
    var dBantuan = new Vue({
        el : '#dDataMaterialBot',
        data : {
            dataQt : [],
            btnProsesText : 'Proses Persetujuan'
        }
    });

    async function prosesPersetujuan(noPr)
    {
        let ti = document.querySelectorAll('.qtRequest').length;
        for(let i = 0; i < ti; i++){
            let qt = document.getElementsByClassName('qtRequest')[i].value;
            let kd = document.getElementsByClassName('kdBat')[i].value;
            dBantuan.dataQt.push({kode:kd, qt:qt});
            document.getElementsByClassName('qtRequest')[i].setAttribute('disabled', 'disabled');
        }
        let ds = {'noPr':noPr, 'dataQt':dBantuan.dataQt}
        dBantuan.btnProsesText = "Memproses ...";
        document.querySelector("#btnProses").setAttribute('disabled', 'disabled');
        await tidur_bentar(2000);
        axios.post(rToProsesPersetujuanPermintaan, ds).then(function(res){
            pesan_toast("Persetujuan permintaan berhasil di proses ...");
            $("#modalPersetujuan").closeModal();
            tidur_bentar(1000);
            load_page(rPersetujuanPermintaanPembelian, 'Persetujuan Permintaan Pembelian');
        });
        
    }
</script>