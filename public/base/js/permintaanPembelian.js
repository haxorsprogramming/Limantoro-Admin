// vue object 
var appPermintaan = new Vue({
    el : '#appPermintaanPembelian',
    data : {
        prosesBtnText : 'Proses permintaan'
    },
    methods : {
        tambahPermintaanPembelian : function()
        {
            $("#dPermintaanPembelian").hide();
            $("#dFormTambahPermintaanPembelian").show();
        },
        pilihProjectAtc : function()
        {
            MicroModal.show('modalProject');
            $("#tblModalProject").dataTable();
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
