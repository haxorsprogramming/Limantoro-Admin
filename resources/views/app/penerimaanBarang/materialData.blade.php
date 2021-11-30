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
                <input type="number" style="width: 300px;" class="qtMasuk">
                <input type="hidden" class="kdMat" value="{{ $itemMaterial -> kode_material }}">
                <input type="hidden" id="kdts_{{ $itemMaterial -> kode_material }}" value="{{ $itemMaterial -> qt }}">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row" style="text-align: center;" id="dBantuan">
    <a href="javascript:void(0)" class="btn" id="btnProses" onclick="prosesPenerimaan()">
        <i class="material-icons left">file_download_done</i> @{{ btnProsesText }}
    </a>
</div>

<script>
    var rProsesPenerimaan = server + "app/penerimaan-barang/proses";

    var dBantuan = new Vue({
        el : '#dBantuan',
        data : {
            qtMasuk : [],
            btnProsesText : 'Proses Penerimaan',
            statusValid : true
        }
    });

    $("#tblMaterialData").dataTable();

    async function prosesPenerimaan()
    {
        let noGr = document.querySelector("#txtNoGr").value;
        let kdSupplier = appPb.kdSupplierSelected;
        let tanggal = document.querySelector("#txtTanggal").value;
        let noSurat = document.querySelector("#txtNoSurat").value;
        let noPo = appPb.kdPoSelected;
        
        // 
        if(tanggal === ''){
            pesan_toast("Harap set tanggal ... !!!");
            dBantuan.statusValid = false;
        }else{
            let ti = document.querySelectorAll('.qtMasuk').length;
            for(let i = 0; i < ti; i++){
                let qt = document.getElementsByClassName('qtMasuk')[i].value;
                let kd = document.getElementsByClassName('kdMat')[i].value;
                let qtTersedia = document.querySelector("#kdts_"+kd).value;
                if(qt === ''){
                    pesan_toast('Harap isi qt masuk !!!');
                    dBantuan.statusValid = false;
                }else{
                    if(parseInt(qt) > parseInt(qtTersedia)){
                        pesan_toast('Qt masuk tidak boleh lebih besar dari qt tersedia !!!');
                        dBantuan.statusValid = false;
                    }else{
                        dBantuan.statusValid = true;
                        dBantuan.qtMasuk.push({kode:kd, qt:qt});
                        document.getElementsByClassName('qtMasuk')[i].setAttribute('disabled', 'disabled');
                    }
                }
            }
            let ds = {'noGr':noGr, 'kdSupplier':kdSupplier, 'tanggal':tanggal, 'noSurat':noSurat, 'noPo':noPo, 'qtMasuk':dBantuan.qtMasuk}

            if(dBantuan.statusValid === true){
                dBantuan.btnProsesText = "Memproses ...";
                document.querySelector("#btnProses").setAttribute('disabled', 'disabled');
                await tidur_bentar(2000);
                axios.post(rProsesPenerimaan, ds).then(function(res){
                    pesan_toast("Penerimaan barang berhasil di proses ...");
                    load_page(rPenerimaanBarang, 'Penerimaan Barang');
                });
            }
        }
    }
</script>