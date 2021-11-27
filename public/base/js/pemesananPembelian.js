// route 
var rGetMaterialPemesanan = server + "app/pemesanan-pembelian/get-material-pemesanan";
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
            for(j=0; j < jlhArray; j++){
                let nowRecKode = appPemesanan.dataMaterialPesanan[j].kode;
                if(nowRecKode === kode){
                    posKode = j;
                }
            }
            // pening dimulai 
            let qtKd = document.querySelector("#qt_"+kode).value;
            appPemesanan.dataMaterialPesanan[posKode].qtInput = qtKd;
        },
        setHarga : function(kode)
        {
            // let jlhArray = appPemesanan.dataMaterialPesanan.length;
            // var j;
            // var posKode = 0; 
        }
    }
});
// fungsi inisialisasi 
$("#tblPemesananPembelian").dataTable();
$("#tblModalSupplier").dataTable();
$("#tblModalPermintaanPembelian").dataTable();
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
