// route 
var rProsesTambah = server + "app/karyawan/tambah/proses";
// vue object 
var appKaryawan = new Vue({
    el : '#appKaryawan',
    data : {
        prosesBtnText : "Proses"
    },
    methods : {
        tambahKaryawanAtc : function()
        {
            $("#dKaryawan").hide();
            $("#dFormTambahKaryawan").show();
            document.querySelector("#txtUsername").focus();
        },
        editAtc : function(kdKaryawan)
        {
            console.log(kdKaryawan);
        },
        deleteAtc : function(kdKaryawan)
        {
            console.log(kdKaryawan);
        },
        kembaliAtc : function()
        {
            load_page(rKaryawan, 'Karyawan');
        },
        prosesAtc : function()
        {
            axios.post(rProsesTambah).then(function(res){
                let obj = res.data;
                console.log(obj);
            });
        }
    }
});

// fungsi 
$("#tblKaryawan").dataTable();

function bisaLoginSelect()
{
    let opsi = document.querySelector("#txtBisaLogin").value;
    if(opsi === 'y'){
        $("#dPasswordUser").show();
        document.querySelector("#txtPassword").focus();
    }else{
        $("#dPasswordUser").hide();
    }
}