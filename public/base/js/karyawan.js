// vue object 
var appKaryawan = new Vue({
    el : '#appKaryawan',
    data : {

    },
    methods : {
        tambahKaryawanAtc : function()
        {
            
        },
        editAtc : function(kdKaryawan)
        {
            console.log(kdKaryawan);
        },
        deleteAtc : function(kdKaryawan)
        {
            console.log(kdKaryawan);
        }
    }
});

// fungsi 
$("#tblKaryawan").dataTable();