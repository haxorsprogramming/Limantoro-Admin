// route 
var rDataSupplier = server + "app/supplier/datatable";
var rProsesTambahSupplier = server + "app/supplier/tambah/proses";
// vue object 
var appSupplier = new Vue({
    el : '#appSupplier',
    data : {
        prosesBtnText : "Tambah Supplier",
        statusProsesTambah : false,
        updateBtnText : "Update Supplier"
    },
    methods : {
        tambahSupplierAtc : function()
        {
            $("#dSupplier").hide();
            $("#dFormTambahSupplier").show();
            document.querySelector("#txtKodeToko").focus();
        },
        prosesTambahSupplierAtc : async function()
        {
            if(appSupplier.statusProsesTambah === false){
                let kdToko = document.querySelector("#txtKodeToko").value;
                let namaToko = document.querySelector("#txtNamaToko").value;
                let phoneNumber = document.querySelector("#txtPhoneNumber").value;
                let contactPerson = document.querySelector("#txtContactPerson").value;
                let npwp = document.querySelector("#txtNpwp").value;
                let alamat = document.querySelector("#txtAlamat").value;
                if(kdToko === '' || namaToko === '' || phoneNumber === '' || contactPerson === '' || npwp === '' || alamat === ''){
                    pesanUmumApp('warning', 'Fill field !!!', 'Harap isi seluruh field !!!');
                }else{
                    let ds = {'kdToko':kdToko, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
                    appSupplier.prosesBtnText = "Memproses ...";
                    appSupplier.statusProsesTambah = true;
                    document.querySelector("#btnProsesTambah").setAttribute("disabled", "disabled");
                    dimForm();
                    axios.post(rProsesTambahSupplier, ds).then(function(res){
                        let dr = res.data;
                        console.log(dr);
                    });
                    await tidur_bentar(2000);
                    pesan_toast("Supplier baru berhasil di tambahkan ...");
                    load_page(rSupplier, 'Supplier');
                }
            }
        },
        kembaliAtc : function ()
        {
            load_page(rSupplier, 'Supplier');
        },
        editAtc : function(kdSupplier)
        {
            var rLoadDataSupplier = server + "app/supplier/"+kdSupplier+"/edit/data";
            axios.get(rLoadDataSupplier).then(function(res){
                let ds = res.data;
                console.log(ds);
            });
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