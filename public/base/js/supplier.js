// route 
var rDataSupplier = server + "app/supplier/datatable";
var rProsesTambahSupplier = server + "app/supplier/tambah/proses";
var rProsesUpdateSupplier = server + "app/supplier/edit/proses";
var rProsesDeleteSupplier = server + "app/supplier/delete/proses";
// vue object 
var appSupplier = new Vue({
    el : '#appSupplier',
    data : {
        prosesBtnText : "Tambah Supplier",
        statusProsesTambah : false,
        updateBtnText : "Update Supplier",
        statusProsesUpdate :  false,
        kdSupplierSelected : ''
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
                let supplier = ds.dataSupplier;
                document.querySelector("#txtKodeTokoEdit").value = supplier.code;
                document.querySelector("#txtNamaTokoEdit").value = supplier.name;
                document.querySelector("#txtPhoneNumberEdit").value = supplier.phone_number;
                document.querySelector("#txtContactPersonEdit").value = supplier.contact_person;
                document.querySelector("#txtNpwpEdit").value = supplier.code;
                document.querySelector("#txtAlamatEdit").value = supplier.address;
            });
            appSupplier.kdSupplierSelected = kdSupplier;
            $("#dSupplier").hide();
            $("#dFormEditSupplier").show();
            document.querySelector("#txtNamaTokoEdit").focus();
        },
        prosesEditSupplierAtc : async function()
        {
            let kdSupplier = appSupplier.kdSupplierSelected;
            if(appSupplier.statusProsesUpdate === false){
                let namaToko = document.querySelector("#txtNamaTokoEdit").value;
                let phoneNumber = document.querySelector("#txtPhoneNumberEdit").value;
                let contactPerson = document.querySelector("#txtContactPersonEdit").value;
                let npwp = document.querySelector("#txtNpwpEdit").value;
                let alamat = document.querySelector("#txtAlamatEdit").value;
                if(namaToko === '' || phoneNumber === '' || contactPerson === '' || npwp === '' || alamat === ''){
                    pesanUmumApp('warning', 'Fill field !!!', 'Harap isi seluruh field !!!');
                }else{
                    let ds = {'kdToko':kdSupplier, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
                    appSupplier.updateBtnText = "Memproses ...";
                    appSupplier.statusProsesUpdate = true;
                    dimFormEdit();
                    axios.post(rProsesUpdateSupplier, ds).then(function(res){

                    });
                    await tidur_bentar(2000);
                    pesan_toast("Supplier berhasil di update ...");
                    load_page(rSupplier, 'Supplier');
                }
            }
        },
        deleteAtc : function(kdSupplier)
        {
            Swal.fire({
                title: "Hapus supplier?",
                text: "Yakin menghapus supplier ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                    let ds = {'kdSupplier':kdSupplier}
                    axios.post(rProsesDeleteSupplier, ds).then(function(res){
                        pesan_toast("Supplier berhasil di hapus ...");
                        load_page(rSupplier, 'Supplier');
                    });
                }
              });
        },
        deleteFromEditAtc : function()
        {
            kdSupplier = appSupplier.kdSupplierSelected;
            Swal.fire({
                title: "Hapus supplier?",
                text: "Yakin menghapus supplier ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                    let ds = {'kdSupplier':kdSupplier}
                    axios.post(rProsesDeleteSupplier, ds).then(function(res){
                        pesan_toast("Supplier berhasil di hapus ...");
                        load_page(rSupplier, 'Supplier');
                    });
                }
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

function dimFormEdit()
{
    document.querySelector("#txtNamaTokoEdit").setAttribute("disabled", "disabled");
    document.querySelector("#txtPhoneNumberEdit").setAttribute("disabled", "disabled");
    document.querySelector("#txtContactPersonEdit").setAttribute("disabled", "disabled");
    document.querySelector("#txtNpwpEdit").setAttribute("disabled", "disabled");
    document.querySelector("#txtAlamatEdit").setAttribute("disabled", "disabled");
}