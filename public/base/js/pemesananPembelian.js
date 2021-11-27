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
            let ds = {'noPr':appPemesanan.noPrSelected}
            document.querySelector("#txtNoPr").value = appPemesanan.noPrSelected;
            axios.post(rGetMaterialPemesanan, ds).then(function(res){
                let obj = res.data;
                console.log(obj);
            });
            // appPemesanan.dataMaterialPesanan.push({nomor : noMaterial});
            $("#modalPermintaanPembelian").closeModal();
            noMaterial++;
        }
    }
});
// fungsi inisialisasi 
$("#tblPemesananPembelian").dataTable();
$("#tblModalSupplier").dataTable();
$("#tblModalPermintaanPembelian").dataTable();
var noMaterial = 1;