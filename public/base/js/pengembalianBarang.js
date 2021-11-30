// vue object 
var appPengembalianBarang = new Vue({
    el : '#appPengembalianBarang',
    data : {
        kdSupplierSelected : '',
        namaSupplierSelected : '',
        dataPo : [],
        kdPoSelected : ''
    },
    methods : {
        tambahPengembalianAtc : function()
        {
            $("#dPengembalianBarang").hide();
            $("#dFormTambahPengembalianBarang").show();
        },
        openModalSupplierAtc : function()
        {
            $("#modalSupplier").openModal();
        },
        rwSupplierAtc : function(dataSupp)
        {
            let suppData = dataSupp.split("|");
            appPengembalianBarang.kdSupplierSelected = suppData[0];
            appPengembalianBarang.namaSupplierSelected = suppData[1];
            $(".rwSupplier").css("background-color", "");
            document.querySelector("#rwSupplier_"+suppData[0]).style.backgroundColor = "#81ecec";
        },
        pilihSupplierAtc : function()
        {
            document.querySelector("#txtSupplier").value = appPengembalianBarang.kdSupplierSelected+" - "+appPengembalianBarang.namaSupplierSelected;
            $("#modalSupplier").closeModal();
        },
        modalPoOpenAtc : async function()
        {
            if(appPengembalianBarang.kdSupplierSelected === ''){
                pesan_toast('Harap pilih supplier terlebih dahulu ...');
            }else{
                clearPo();
                $("#modalPo").openModal();
                var rGetDataPo = server + "app/penerimaan-barang/"+appPengembalianBarang.kdSupplierSelected+"/get-po";
                axios.get(rGetDataPo).then(function(res){
                    let obj = res.data;
                    let dp = obj.dataPemesanan;
                    dp.forEach(renderDp);
                    function renderDp(item, index){
                        appPengembalianBarang.dataPo.push({
                            noPo : dp[index].no_po,
                            tanggal : dp[index].tanggal,
                            noPr : dp[index].no_pr
                        });
                    }
                });
            }
        },
        rwPoAtc : function(noPo)
        {
            appPengembalianBarang.kdPoSelected = noPo;
            $(".rwPo").css("background-color", "");
            document.querySelector("#rwPo_"+noPo).style.backgroundColor = "#81ecec";
        },
        pilihPoAtc : function()
        {
            document.querySelector("#txtNoPo").value = appPengembalianBarang.kdPoSelected;
            $("#modalPo").closeModal();
            document.querySelector("#dDataMaterial").innerHTML = "Memuat ...";
            var rLoadDataMaterial = server + "app/pengembalian-barang/"+appPb.kdPoSelected+"/get-material";
            $("#dDataMaterial").load(rLoadDataMaterial);
        }
    }
});
// inisialisasi 
$("#tblPengembalianBarang").dataTable();
$("#tblModalPo").dataTable();
$("#tblModalSupplier").dataTable();

function clearPo()
{
    // let pjgPo = appPb.dataPo.length;
    let dataPo = appPb.dataPo;
    let jlhPo = dataPo.length;
    var i;
    for(i=0; i < jlhPo; i++){
        appPengembalianBarang.dataPo.splice(0,1);
    }
}