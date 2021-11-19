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
            $("#modalProject").openModal();
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
$("#tblModalProject").dataTable();
