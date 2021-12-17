// route 

// vue object 
var appKaryawan = new Vue({
    el : "#appDataKaryawan",
    data : {

    },
    methods : {
        editSetAtc : function(username)
        {
            var r_set_data_penggajian = server + "app/penggajian/set-data-penggajian/"+username;
            load_page(r_set_data_penggajian, 'Set data penggajian karyawan');
        },
        btnProsesUpdate : function()
        {
            
        }
    }
});
// inisialisasi 
tip('.btnEdit', 'Edit data set penggajian');
tip('.btnPayrollSet', 'Payroll set');
$("#tblDataKaryawan").dataTable();
$("#tblModalKaryawan").dataTable();