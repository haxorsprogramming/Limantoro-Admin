// route 
var rProsesTambah = server + "app/karyawan/tambah/proses";
var rProsesHapus = server + "app/karyawan/hapus/proses";
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
            var rEditKaryawan = server + "app/karyawan/edit/"+kdKaryawan;
            load_page(rEditKaryawan, 'Edit Data Karyawan');
        },
        deleteAtc : function(kdKaryawan)
        {
            Swal.fire({
                title: "Hapus karyawan?",
                text: "Yakin menghapus karyawan ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                    let ds = {'username':kdKaryawan}
                    axios.post(rProsesHapus, ds).then(function(res){
                        pesan_toast("Karyawan berhasil di hapus ...");
                        load_page(rKaryawan, 'Karyawan');
                    });                  
                }
              });
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
                let email = document.querySelector("#txtEmail").value;
                let hp = document.querySelector("#txtHp").value;
                let foto = document.querySelector("#txtPreviewUpload").getAttribute("src");
                let ds = {
                    'username':username, 'nama':nama, 'nik':nik, 'tanggalLahir':tanggalLahir, 'jk':jk, 'alamat':alamat, 
                    'jabatan':jabatan, 'jenis':jenis, 'bisaLogin':bisaLogin, 'password':password, 'email':email, 'hp':hp,'foto':foto
                }
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

function setImg()
{
    var citraInput = document.querySelector('#txtFoto');
    var preview = document.querySelector('#txtPreviewUpload');
    var fileGambar = new FileReader();
    fileGambar.readAsDataURL(citraInput.files[0]);
    fileGambar.onload = function(e){
        let hasil = e.target.result;
        preview.src = hasil;
    }
    console.log("image ready to upload");
}