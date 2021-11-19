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
            let itemDim = ["#txtUsername", "#txtNamaKaryawan", "#txtNik", "#txtTanggalLahir"];
            dimField(itemDim);
            // axios.post(rProsesTambah, ds).then(function(res){
            //     let obj = res.data;
            //     console.log(obj);
            // });
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