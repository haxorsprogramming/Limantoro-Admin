// route 
var rProsesTambah = server + "app/karyawan/tambah/proses";
// vue object 
var appKaryawan = new Vue({
    el : '#appKaryawan',
    data : {
        prosesBtnText : "Proses",
        stateProses : false
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
        prosesAtc : async function()
        {
            if(appKaryawan.stateProses === false){
                console.log("cutt");
                appKaryawan.stateProses = true;
                let username = document.querySelector("#txtUsername").value;
                let nama = document.querySelector("#txtNamaKaryawan").value;
                let nik = document.querySelector("#txtNik").value;
                let tanggalLahir = document.querySelector("#txtTanggalLahir").value;
                let jk = document.querySelector("#txtJk").value;
                let alamat = document.querySelector("#txtAlamat").value;
                let jabatan = document.querySelector("#txtJabatan").value;
                let jenis = document.querySelector("#txtJenis").value;
                let bisaLogin = document.querySelector("#txtBisaLogin").value;
                let password = document.querySelector("#txtPassword").value;
                let ds = {'username':username, 'nama':nama, 'nik':nik, 'tanggalLahir':tanggalLahir, 'jk':jk, 'alamat':alamat, 'jabatan':jabatan, 'jenis':jenis, 'bisaLogin':bisaLogin, 'password':password}
                let itemDim = ["#btnProses","#txtUsername", "#txtNamaKaryawan", "#txtNik", "#txtTanggalLahir", "#txtJk", "#txtAlamat", "#txtJabatan", "#txtJenis", "#txtBisaLogin", "#txtPassword"];
                dimField(itemDim);
                appKaryawan.prosesBtnText = "Memproses ...";
                await tidur_bentar(2000);
                axios.post(rProsesTambah, ds).then(function(res){
                    let obj = res.data;
                    pesan_toast("Karyawan baru berhasil di tambahkan ...");
                    load_page(rKaryawan, 'Karyawan');
                });
            }
            
            
        }
    }
});

// fungsi 
$("#tblKaryawan").dataTable();

function dimField(itemDim)
{
    itemDim.forEach(renderItemDim);
    function renderItemDim(item, index){
        document.querySelector(itemDim[index]).setAttribute("disabled", "disabled");
    }
}

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