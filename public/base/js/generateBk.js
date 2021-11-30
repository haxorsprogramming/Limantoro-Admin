var appBk = new Vue({
    el : '#dGenerateBk',
    data : {
        prosesGenerateText : 'Generate bukti keluar',
        totalDibayar : totalTagihan,

    },
    methods : {
        prosesGenerateAtc : function()
        {
            let totalTagihan = appBk.totalDibayar;
            console.log(totalTagihan);
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
    
}
