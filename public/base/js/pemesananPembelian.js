// vue object 
var appPemesanan = new Vue({
    el : '#appPemesananPembelian',
    data : {
        prosesBtnText : 'Proses pemesanan',
        kdSupplierSelected : ''
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
        }
    }
});
// fungsi inisialisasi 
$("#tblPemesananPembelian").dataTable();
$("#tblModalSupplier").dataTable();
$("#tblModalPermintaanPembelian").dataTable();