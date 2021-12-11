// vue object 
var appKaryawan = new Vue({
    el : "#appDataKaryawan",
    data : {

    },
    methods : {
        tambahKaryawanModalAtc : function()
        {
            $("#modalKaryawan").openModal();
        }
    }
});
// inisialisasi 
$("#tblDataKaryawan").dataTable();
$("#tblModalKaryawan").dataTable();