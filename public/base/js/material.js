// route 
var rProsesTambahMaterial = server + "app/material/tambah/proses";
// vue object 
var appMaterial = new Vue({
    el : '#appMaterial',
    data : {
        prosesBtnText : "Tambah material"
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
            var rLoadDataMaterial = "app/material/"+kdMaterial+"/edit/data";
            axios.get(rLoadDataMaterial).then(function(res){
                let dr = res.data;
                console.log(dr);
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
