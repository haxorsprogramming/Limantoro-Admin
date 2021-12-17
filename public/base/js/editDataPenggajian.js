// route 
var rProsesEditDataPenggajian = server + "app/penggajian/data-penggajian/edit/proses";
// vue object 
var appEdit = new Vue({
    el : '#dFormEditPenggajian',
    data : {
        btnProsesText : 'Simpan Data Penggajian Karyawan'
    },
    methods : {
        simpanDataPenggajianAtc : async function()
        {
            let username = document.querySelector("#txtUsername").value;
            let statusKawin = document.querySelector("#txtStatusKawin").value;
            let jumlahTanggungan = document.querySelector("#txtJumlahTanggungan").value;
            let gajiPokok = document.querySelector("#txtGajiPokok").value;
            let tunjanganTetap = document.querySelector("#txtTunjanganTetap").value;
            let tunjanganMakan = document.querySelector("#txtTunjanganMakan").value;
            let hariKerja = document.querySelector("#txtHariKerja").value;
            let lembur = document.querySelector("#txtLembur").value;
            let absent = document.querySelector("#txtAbsent").value;
            let splitShift = document.querySelector("#txtSplitShift").value;
            let kasbon = document.querySelector("#txtKasbon").value;
            let ds = {
                'username':username, 'statusKawin':statusKawin, 'jumlahTanggungan':jumlahTanggungan, 'gajiPokok':gajiPokok, 'tunjanganTetap':tunjanganTetap,
                'tunjanganMakan':tunjanganMakan, 'hariKerja':hariKerja, 'lembur':lembur, 'absent':absent, 'splitShift':splitShift, 'kasbon':kasbon
            }
            $('input').attr("disabled", "disabled");
            appEdit.btnProsesText = "Memproses ...";
            document.querySelector("#btnProsesUpdate").setAttribute('disabled', 'disabled');
            await tidur_bentar(2000);
            axios.post(rProsesEditDataPenggajian, ds).then(function(res){
                pesan_toast("Data penggajian karyawan berhasil diproses ...");
                load_page(rDataKaryawanPenggajian, 'Penggajian - Data Karyawan');
            });
        }
    }
});