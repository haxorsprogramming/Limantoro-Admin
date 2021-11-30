// route 
var rGetMaterialPemesanan = server + "app/pemesanan-pembelian/get-material-pemesanan";
var rProsesPemesananPembelian = server + "app/pemesanan-pembelian/proses";
// vue object 
var appPemesanan = new Vue({
    el : '#appPemesananPembelian',
    data : {
        prosesBtnText : 'Proses pemesanan',
        kdSupplierSelected : '',
        namaSupplierSelected : '',
        noPrSelected : '',
        dataMaterialPesanan : []
    },
    methods : {
        tambahPemesananAtc : function()
        {
            $("#dPemesananPembelian").hide();
            $("#dFormTambahPesananPembelian").show();
        },
        kembaliAtc : function()
        {

        },
        modalSupplierAtc : function()
        {
            $("#modalSupplier").openModal();
        },
        rwSupplierAtc : function(kdSupplier)
        {
            let supSplit = kdSupplier.split("|");
            $(".rwSupplier").css("background-color", "");
            document.querySelector("#rwSupplier_"+supSplit[0]).style.backgroundColor = "#81ecec";
            appPemesanan.kdSupplierSelected = supSplit[0];
            appPemesanan.namaSupplierSelected = supSplit[1];
        },
        pilihSupplierAtc : function()
        {
            document.querySelector("#txtKdSupplier").value = appPemesanan.namaSupplierSelected;
            $("#modalSupplier").closeModal();
        },
        modalPrAtc : function()
        {
            $("#modalPermintaanPembelian").openModal();
        },
        rwPjAtc : function(noPr)
        {
            appPemesanan.noPrSelected = noPr;
            $(".rwPr").css("background-color", "");
            document.querySelector("#rwPr_"+noPr).style.backgroundColor = "#81ecec";
        },
        pilihPrAtc : function()
        {
            resetMaterial();
            let ds = {'noPr':appPemesanan.noPrSelected}
            document.querySelector("#txtNoPr").value = appPemesanan.noPrSelected;
            axios.post(rGetMaterialPemesanan, ds).then(function(res){
                let obj = res.data;
                let dataMaterial = obj.dataMaterial;
                dataMaterial.forEach(renderMaterial);
                function renderMaterial(item, index){
                    let kdMaterial = dataMaterial[index].kode_material;
                    let qt = dataMaterial[index].qt;
                    let qtApprove = dataMaterial[index].qt_approve;
                    let namaMaterial = dataMaterial[index].nama_material;
                    let satuan = dataMaterial[index].satuan;
                    appPemesanan.dataMaterialPesanan.push({
                        nomor : noMaterial,
                        kode : kdMaterial,
                        nama : namaMaterial,
                        qt : qt,
                        qtApprove : qtApprove,
                        qtInput : 0,
                        satuan : satuan,
                        hargaAt : 0,
                        subTotal : 0,
                        note : ''
                    });
                    noMaterial++;
                }
            });
            $("#modalPermintaanPembelian").closeModal();
        },
        setQtAtc : function(kode)
        {
            let jlhArray = appPemesanan.dataMaterialPesanan.length;
            let j;
            let posKode = 0;
            for(j = 0; j < jlhArray; j++){
                let nowRecKode = appPemesanan.dataMaterialPesanan[j].kode;
                if(nowRecKode === kode){
                    posKode = j;
                }
            }
            let qtKd = document.querySelector("#qt_"+kode).value;
            let capHarga = document.querySelector("#harga_"+kode).value
            let hargaKd = capHarga.replace(".", "");
            let subTotal = BigInt(qtKd) * BigInt(hargaKd);
            appPemesanan.dataMaterialPesanan[posKode].qtInput = qtKd;
            appPemesanan.dataMaterialPesanan[posKode].subTotal = subTotal;
        },
        setHarga : function(kode)
        {
            let jlhArray = appPemesanan.dataMaterialPesanan.length;
            let j;
            let posKode = 0;
            for(j = 0; j < jlhArray; j++){
                let nowRecKode = appPemesanan.dataMaterialPesanan[j].kode;
                if(nowRecKode === kode){
                    posKode = j;
                }
            }
            let qtKd = document.querySelector("#qt_"+kode).value;
            let capHarga = document.querySelector("#harga_"+kode).value
            let hargaKd = capHarga.replace(".", "");
            let subTotal = qtKd * hargaKd;
            appPemesanan.dataMaterialPesanan[posKode].hargaAt = hargaKd;
            appPemesanan.dataMaterialPesanan[posKode].subTotal = subTotal;
        },
        prosesPemesananAtc : async function()
        {
            let jlhArray = appPemesanan.dataMaterialPesanan.length;
            let j;
            let statusValidasi = true;
            for(j = 0; j < jlhArray; j++){
                let qtApprove = appPemesanan.dataMaterialPesanan[j].qtApprove;
                let kdMaterial = appPemesanan.dataMaterialPesanan[j].kode;
                let qtKd = document.querySelector("#qt_"+kdMaterial).value;
                if(qtApprove < qtKd){
                    pesan_toast("Qt "+kdMaterial+" tidak boleh dari qt approve");
                    statusValidasi = false;
                }
            }
            let tanggal = document.querySelector("#txtTanggalPesanan").value;
            let noPr = appPemesanan.noPrSelected;
            let kdSupplier = appPemesanan.kdSupplierSelected;
            let material = appPemesanan.dataMaterialPesanan;
            let ds = {'tanggal':tanggal, 'noPr':noPr, 'kdSupplier':kdSupplier, 'material':material}
            if(statusValidasi === true){
                if(tanggal === ''){
                    pesan_toast('Harap set tanggal !!!');
                }else{
                    appPemesanan.prosesBtnText = "Memproses ...";
                    document.querySelector("#btnProsesPemesanan").setAttribute('disabled', 'disabled');
                    await tidur_bentar(2000);
                    axios.post(rProsesPemesananPembelian, ds).then(function(res){
                        pesan_toast("Pemesanan pembelian berhasil di proses ...");
                        load_page(rPemesananPembelian, 'Pemesanan Pembelian');
                    });
                }
            }
        },
        generateBkAtc : function(noPo)
        {
            let pageGenerate = server + "app/bukti-keluar/"+noPo+"/generate";
            load_page(pageGenerate, "Generate bukti keluar ("+noPo+")");
        }
    }
});
// fungsi inisialisasi 
$("#tblPemesananPembelian").dataTable();
$("#tblModalSupplier").dataTable();
$("#tblModalPermintaanPembelian").dataTable();
// $(".hargaAt").mask('000.000.000.000.000.000.000.000.000.000', {reverse: true});
tip(".btnPrintBk", "Cetak Pemesanan Pembelian");
tip(".btnGenBk", "Generate bukti keluar");
tip(".btnLock", "Lock");
var noMaterial = 1;

function resetMaterial()
{
    let dataMaterial = appPemesanan.dataMaterialPesanan;
    let jlhMaterial = dataMaterial.length;
    var i;
    for(i=0; i < jlhMaterial; i++){
        appPemesanan.dataMaterialPesanan.splice(0,1);
    }
}
