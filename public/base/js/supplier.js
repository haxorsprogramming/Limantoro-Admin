// route 
var rDataSupplier = server + "app/supplier/datatable";
var rProsesTambahSupplier = server + "app/supplier/tambah/proses";
// vue object 
var appSupplier = new Vue({
    el : '#appSupplier',
    data : {
        prosesBtnText : "Tambah Supplier"
    },
    methods : {
        tambahSupplierAtc : function()
        {
            $("#dSupplier").hide();
            $("#dFormTambahSupplier").show();
            document.querySelector("#txtKodeToko").focus();
        },
        prosesTambahSupplierAtc : function()
        {
            let kdToko = document.querySelector("#txtKodeToko").value;
            let namaToko = document.querySelector("#txtNamaToko").value;
            let phoneNumber = document.querySelector("#txtPhoneNumber").value;
            let contactPerson = document.querySelector("#txtContactPerson").value;
            let npwp = document.querySelector("#txtNpwp").value;
            let alamat = document.querySelector("#txtAlamat").value;
            let ds = {'kdToko':kdToko, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
            document.querySelector("#btnProsesTambah").innerHTML = ""
            dimForm();
            tidur_bentar(4000);
            // axios.post(rProsesTambahSupplier, ds).then(function(res){
            //     let dr = res.data;
            //     console.log(dr);
            // });
        }
    }
});
// function 
$('#tblSupplier').DataTable();

function dimForm()
{
    document.querySelector("#txtKodeToko").setAttribute("disabled", "disabled");
    document.querySelector("#txtNamaToko").setAttribute("disabled", "disabled");
    document.querySelector("#txtPhoneNumber").setAttribute("disabled", "disabled");
    document.querySelector("#txtContactPerson").setAttribute("disabled", "disabled");
    document.querySelector("#txtNpwp").setAttribute("disabled", "disabled");
    document.querySelector("#txtAlamat").setAttribute("disabled", "disabled");
}