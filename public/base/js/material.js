// route 
var rProsesTambahMaterial = server + "app/material/tambah/proses";
var rProsesUpdateMaterial = server + "app/material/edit/proses";
var rProsesHapusMaterial = server + "app/material/hapus/proses";
// vue object 
var appMaterial = new Vue({
    el : '#appMaterial',
    data : {
        prosesBtnText : "Tambah material",
        selectedKdMaterial : ''
    },
    methods : {
        tambahMaterialAtc : function()
        {
           $("#dMaterial").hide();
           $("#dFormTambahMaterial").show();
           document.querySelector("#txtKodeMaterial").focus();
        },
        deleteAtc : function(kdMaterial)
        {
            console.log(kdMaterial);
        },
        kembaliAtc : function()
        {
            load_page(rMaterial, 'Material');
        },
        prosesTambahMaterialAtc : async function()
        {
            let kdMaterial = document.querySelector("#txtKodeMaterial").value;
            let namaMaterial = document.querySelector("#txtNamaMaterial").value;
            let satuan = document.querySelector("#txtSatuan").value;
            if(kdMaterial === '' || namaMaterial === ''){
                pesanUmumApp('warning', 'Fill field!!!', 'Isi field yang diperlukan ...');
            }else{
                let ds = {'kdMaterial':kdMaterial, 'namaMaterial':namaMaterial, 'satuan':satuan}
                appMaterial.prosesBtnText = "Memproses ...";
                document.querySelector("#btnProsesTambah").setAttribute("disabled", "disabled");
                dimForm();
                await tidur_bentar(2000);
                axios.post(rProsesTambahMaterial, ds).then(function(res){
                    pesan_toast("Material baru berhasil di tambahkan ...");
                    load_page(rMaterial, 'Material');
                });
            }
        },
        editAtc : function (kdMaterial)
        {
            appMaterial.selectedKdMaterial = kdMaterial;
            var rLoadDataMaterial = "app/material/"+kdMaterial+"/edit/data";
            axios.get(rLoadDataMaterial).then(function(res){
                let dr = res.data;
                let dataMaterial = dr.dataMaterial;
                $("#dMaterial").hide();
                $("#dFormEditMaterial").show();
                document.querySelector("#txtSatuanEdit").value = dataMaterial.satuan;
                document.querySelector("#txtNamaMaterialEdit").value = dataMaterial.nama;
                document.querySelector("#txtKodeMaterialEdit").value = appMaterial.selectedKdMaterial;
            });
        },
        prosesUpdateMaterialAtc : async function()
        {
            let kdMaterial = appMaterial.selectedKdMaterial;
            let namaMaterial = document.querySelector("#txtNamaMaterialEdit").value;
            let satuan = document.querySelector("#txtSatuanEdit").value;
            let ds = {'kdMaterial':kdMaterial, 'namaMaterial':namaMaterial, 'satuan':satuan}
            
            dimFormEdit();
            await tidur_bentar(2000);
            axios.post(rProsesUpdateMaterial, ds).then(function(res){
                pesan_toast("Data material berhasil di update ...");
                load_page(rMaterial, 'Material');
            });
        },
        deleteAtc : function(kdMaterial)
        {
            Swal.fire({
                title: "Hapus Material?",
                text: "Yakin hapus ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                   let ds = {'kdMaterial':kdMaterial}
                   axios.post(rProsesHapusMaterial, ds).then(function(res){
                    pesan_toast("Material berhasil di hapus ...");
                    load_page(rMaterial, 'Material');
                   });
                }
              });
        }
    }
});
// function 
$("#tblMaterial").dataTable();

function dimForm()
{
    document.querySelector("#txtKodeMaterial").setAttribute("disabled", "disabled");
    document.querySelector("#txtNamaMaterial").setAttribute("disabled", "disabled");
    document.querySelector("#txtSatuan").setAttribute("disabled", "disabled");
}

function dimFormEdit()
{
    document.querySelector("#txtNamaMaterialEdit").setAttribute("disabled", "disabled");
    document.querySelector("#txtSatuanEdit").setAttribute("disabled", "disabled");
}