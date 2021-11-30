// route 

// vue object 
var appPb = new Vue({
    el : '#appPb',
    data : {
        prosesBtnText : 'Proses penerimaan',
        kdSupplierSelected : '',
        namaSupplierSelected : '',
        dataPo : []
    },
    methods : {
        tambahPenerimaanAtc : function()
        {
            $("#dPenerimaanBarang").hide();
            $("#dFormTambahPenerimaan").show();
        },
        prosesPenerimaanAtc : function()
        {

        },
        modalSupplierOpenAtc : function()
        {
            $("#modalSupplier").openModal();
        },
        rwSupplierAtc : function(dataSupp)
        {
            let suppData = dataSupp.split("|");
            appPb.kdSupplierSelected = suppData[0];
            appPb.namaSupplierSelected = suppData[1];
            $(".rwSupplier").css("background-color", "");
            document.querySelector("#rwSupplier_"+suppData[0]).style.backgroundColor = "#81ecec";
        },
        pilihSupplierAtc : function()
        {
            document.querySelector("#txtSupplier").value = appPb.kdSupplierSelected+" - "+appPb.namaSupplierSelected;
            $("#modalSupplier").closeModal();
        },
        modalPoOpenAtc : async function()
        {
            if(appPb.kdSupplierSelected === ''){
                pesan_toast('Harap pilih supplier terlebih dahulu ...');
            }else{
                clearPo();
                $("#modalPo").openModal();
                var rGetDataPo = server + "app/penerimaan-barang/"+appPb.kdSupplierSelected+"/get-po";
                axios.get(rGetDataPo).then(function(res){
                    let obj = res.data;
                    let dp = obj.dataPemesanan;
                    dp.forEach(renderDp);
                    function renderDp(item, index){
                        appPb.dataPo.push({
                            noPo : dp[index].no_po,
                            tanggal : dp[index].tanggal,
                            noPr : dp[index].no_pr
                        });
                    }
                    $(".odd").hide();
                });
            }
        },
        pilihPoAtc : function()
        {
            
        }
    }
});
// inisialisasi 
$("#tblPenerimaanBarang").dataTable();
$("#tblModalPo").dataTable({
    "oLanguage": {
        "sZeroRecords": "",
        "sEmptyTable": ""
    }
});

function clearPo()
{
    // let pjgPo = appPb.dataPo.length;
    let dataPo = appPb.dataPo;
    let jlhPo = dataPo.length;
    var i;
    for(i=0; i < jlhPo; i++){
        appPb.dataPo.splice(0,1);
    }
}