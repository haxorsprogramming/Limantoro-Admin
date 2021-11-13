// route 

// vue object 
var appProject = new Vue({
    el : '#appProject',
    data : {
        prosesBtnText : "Tambah project",
        kdProjectRowSelected : '',
        dataUnit : []
    },
    methods : {
        tambahProjectAtc : function()
        {
            $("#dProject").hide();
            $("#dFormTambahProject").show();
        },
        editAtc : function()
        {

        },
        deleteAtc : function()
        {

        },
        prosesTambahProjectAtc : function()
        {
            
        },
        kembaliAtc : function()
        {

        },
        showModalPenanggungJawabAtc : function()
        {
            MicroModal.show('modal-1');
        },
        selectRowPj : function(kdProject)
        {
            $(".rwPj").css("background-color", "");
            appProject.kdProjectRowSelected = kdProject;
            $("#rwPj"+kdProject).css("background-color", "#81ecec");
            console.log(kdProject);
        },
        pilihPjAtc : function()
        {
            document.querySelector("#txtPenanggungJawab").value = appProject.kdProjectRowSelected;
            MicroModal.close('modal-1');
        },
        tambahUnitAtc : function()
        {
            MicroModal.show('mdlUnit');
            document.querySelector("#txtNamaUnit").focus();
        },
        prosesTambahUnit : function()
        {
            let namaUnit = document.querySelector("#txtNamaUnit").value;
            let ukuranTanah = document.querySelector("#txtUkuranTanah").value;
            let ukuranBangunan = document.querySelector("#txtUkuranBangunan").value;
            let jumlahUnit = document.querySelector("#txtJumlahUnit").value;
            let unitTerjual = document.querySelector("#txtUnitTerjual").value;
            let hargaJual = document.querySelector("#txtHargaJual").value;
            let marketingFee = document.querySelector("#txtMarketingFee").value;

            appProject.dataUnit.push({
                namaUnit : namaUnit,
                ukuranTanah : ukuranTanah,
                ukuranBangunan : ukuranBangunan,
                jumlahUnit : jumlahUnit,
                unitTerjual : unitTerjual,
                hargaJual : hargaJual,
                marketingFee : marketingFee
            });
            MicroModal.close('mdlUnit');
        }
    }
});
// function 
$("#tblProject").dataTable();

$(".select2").select2();
MicroModal.init();
