// vue object 
var appPemesanan = new Vue({
    el : '#appPemesananPembelian',
    data : {
        prosesBtnText : 'Proses pemesanan',
        kdSupplierSelected : '',
        noPrSelected : ''
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
            $(".rwSupplier").css("background-color", "");
            document.querySelector("#rwSupplier_"+kdSupplier).style.backgroundColor = "#81ecec";
            appPemesanan.kdSupplierSelected = kdSupplier;
        },
        pilihSupplierAtc : function()
        {
            document.querySelector("#txtKdSupplier").value = appPemesanan.kdSupplierSelected;
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
            document.querySelector("#txtNoPr").value = appPemesanan.noPrSelected;
            $("#modalPermintaanPembelian").closeModal();
        }
    }
});
// fungsi inisialisasi 
$("#tblPemesananPembelian").dataTable();
$("#tblModalSupplier").dataTable();
$("#tblModalPermintaanPembelian").dataTable();