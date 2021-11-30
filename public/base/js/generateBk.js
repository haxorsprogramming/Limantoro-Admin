// route 
var rProsesGenerate = server + "app/bukti-keluar/generate/proses";
// vue object 
var appBk = new Vue({
    el : '#dGenerateBk',
    data : {
        prosesGenerateText : 'Generate bukti keluar',
        totalTagihan : totalTagihan,
        totalDibayar : 0
    },
    methods : {
        prosesGenerateAtc : function()
        {
            let noPoe = document.querySelector("#txtNoPoe").value;
            let tanggal =  document.querySelector("#txtTanggal").value;
            let dibayar = document.querySelector("#txtDibayar").value;
            let tanggalDibayar = document.querySelector("#txtTanggalDibayar").value;
            let note = document.querySelector("#txtCatatan").value;
            let nmBank1 = document.querySelector("#txtNameBank1").value;
            let nmBank2 = document.querySelector("#txtNameBank2").value;
            let accBank1 = document.querySelector("#txtNoAcc1").value;
            let accBank2 = document.querySelector("#txtNoAcc2").value;
            let tBank1 = document.querySelector("#txtTotal1").value;
            let tBank2 = document.querySelector("#txtTotal2").value;
            let disc = document.querySelector("#txtDiskon").value;
            let ds = {
                'noPoe':noPoe, 'tanggal':tanggal, 'dibayar':dibayar, 'tanggalDibayar':tanggalDibayar, 'note':note, 'nmBank1':nmBank1, 'nmBank2':nmBank2,
                'accBank1' : accBank1, 'accBank2':accBank2, 'tBank1':tBank1, 'tBank2':tBank2, 'disc':disc
            }
            axios.post(rProsesGenerate, ds).then(function(res){
                let obj = res.data;
                console.log(obj);
            });
        },
        kembaliAtc : function()
        {

        }
    }
});
// fungsi inisialisasi 
$("#tblDataPo").dataTable();

function setDiskon()
{
    let diskon = document.querySelector("#txtDiskon").value;
    let totalTagihanDiskon = parseInt(totalTagihan) - parseInt(diskon);
    appBk.totalTagihan = totalTagihanDiskon;
}

function setBankT()
{
    let tb1 = document.querySelector("#txtTotal1").value;
    let tb2 = document.querySelector("#txtTotal2").value;
    let fin = parseInt(tb2) + parseInt(tb1);
    appBk.totalDibayar = fin;
}