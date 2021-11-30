<table id="tblMaterialData" class="table bordered highlight">
    <thead>
        <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
            <th>No</th>
            <th>Kode Material</th>
            <th>Nama Material</th>
            <th>Satuan</th>
            <th>Qt</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataItemMaterial as $itemMaterial)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $itemMaterial -> kode_material }}</td>
            <td>{{ $itemMaterial -> materialData -> nama }}</td>
            <td>{{ $itemMaterial -> materialData -> satuan }}</td>
            <td>
                <input type="number" style="width: 300px;" class="qtMasuk">
                <input type="hidden" class="kdMat" value="{{ $itemMaterial -> kode_material }}">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row" style="text-align: center;" id="dBantuan">
    <a href="javascript:void(0)" class="btn" id="btnProses" onclick="prosesPengembalian()">
        <i class="material-icons left">file_download_done</i> @{{ btnProsesText }}
    </a>
</div>

<script>
    var rProsesPengembalian = server + "app/pengembalian-barang/proses";

    var dBantuan = new Vue({
        el : '#dBantuan',
        data : {
            qtMasuk : [],
            btnProsesText : 'Proses Pengembalian',
            statusValid : true
        }
    });

    $("#tblMaterialData").dataTable();

    async function prosesPengembalian()
    {
        let noGr = document.querySelector("#txtNoGr").value;
        let kdSupplier = appPengembalianBarang.kdSupplierSelected;
        let tanggal = document.querySelector("#txtTanggal").value;
        let noPo = appPengembalianBarang.kdPoSelected;
        
        // 
        if(tanggal === ''){
            pesan_toast("Harap set tanggal ... !!!");
            dBantuan.statusValid = false;
        }else{
            let ti = document.querySelectorAll('.qtMasuk').length;
            for(let i = 0; i < ti; i++){
                let qt = document.getElementsByClassName('qtMasuk')[i].value;
                let kd = document.getElementsByClassName('kdMat')[i].value;
                if(qt === ''){
                    pesan_toast('Harap isi qt masuk !!!');
                    dBantuan.statusValid = false;
                }else{
                    dBantuan.statusValid = true;
                    dBantuan.qtMasuk.push({kode:kd, qt:qt});
                    document.getElementsByClassName('qtMasuk')[i].setAttribute('disabled', 'disabled');
                }
            }
            let ds = {'noGr':noGr, 'kdSupplier':kdSupplier, 'tanggal':tanggal, 'noPo':noPo, 'qtMasuk':dBantuan.qtMasuk}

            if(dBantuan.statusValid === true){
                dBantuan.btnProsesText = "Memproses ...";
                document.querySelector("#btnProses").setAttribute('disabled', 'disabled');
                await tidur_bentar(2000);
                axios.post(rProsesPengembalian, ds).then(function(res){
                    // console.log(res.data);
                    pesan_toast("Pengembalian barang berhasil di proses ...");
                    load_page(rPengembalianBarang, 'Pengembalian Barang');
                });
            }
        }
    }
</script>