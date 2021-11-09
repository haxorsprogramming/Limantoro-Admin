// route 
var rDataSupplier = server + "app/supplier/datatable";
// vue object 
var appSupplier = new Vue({
    el : '#appSupplier',
    data : {

    },
    methods : {
        tambahSupplierAtc : function()
        {
            $("#dSupplier").hide();
            $("#dFormTambahSupplier").show();
        }
    }
});
// function 
$('#tblSupplier').DataTable();