// vue object 
var appSetuju = new Vue({
    el : '#appPersetujuanPermintaanPembelian',
    data : {

    },
    methods : {
        setujuiAtc : function()
        {
            $("#modalPersetujuan").openModal();
        }
    }
});
// fungsi inisialisasi 
$("#tblPersetujuanPermintaanPembelian").dataTable();
tip('#btnSetujui', 'Setujui');
tip('#btnPrint', 'Print');