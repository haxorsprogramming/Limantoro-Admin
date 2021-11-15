// route 
var namaUnitData = [];
var rProsesProject = server + "app/project/tambah/proses";
// vue object 
var appProject = new Vue({
    el : '#appProject',
    data : {
        prosesBtnText : 'Tambah project',
        kdProjectRowSelected : '',
        dataUnit : [],
        titleManageUnit : 'Tambah Unit',
        statusManage : 'add'
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
            load_page(rProject, 'Project');
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
            appProject.titleManageUnit = "Tambah Unit";
            appProject.statusManage = "add";
            MicroModal.show('mdlUnit');
            document.querySelector("#txtNamaUnit").focus();
        },
        prosesManageAtc : function()
        {
            if(appProject.statusManage === 'add'){
                let namaUnit = document.querySelector("#txtNamaUnit").value;
                let ukuranTanah = document.querySelector("#txtUkuranTanah").value;
                let ukuranBangunan = document.querySelector("#txtUkuranBangunan").value;
                let jumlahUnit = document.querySelector("#txtJumlahUnit").value;
                let unitTerjual = document.querySelector("#txtUnitTerjual").value;
                let hargaJual = document.querySelector("#txtHargaJual").value;
                let marketingFee = document.querySelector("#txtMarketingFee").value;

                let cekNama = namaUnitData.includes(namaUnit);

                if(cekNama === true){
                    pesan_toast("Nama unit sudah ada !!!");
                }else{
                    namaUnitData.push(namaUnit);
                    appProject.dataUnit.push({
                        namaUnit : namaUnit,
                        ukuranTanah : ukuranTanah,
                        ukuranBangunan : ukuranBangunan,
                        jumlahUnit : jumlahUnit,
                        unitTerjual : unitTerjual,
                        hargaJual : hargaJual,
                        marketingFee : marketingFee
                    });
                    pesan_toast("Unit "+namaUnit+" berhasil ditambahkan ...");
                    MicroModal.close('mdlUnit');
                }
            }else{
                
            }
        },
        editUnitAtc : function(namaUnit)
        {
            appProject.titleManageUnit = "Edit Unit"
            appProject.statusManage = "edit";
            let cekArrayNama = namaUnitData.indexOf(namaUnit);
            let dataUnitDetails = appProject.dataUnit[cekArrayNama];
            console.log(dataUnitDetails);   
            document.querySelector("#txtNamaUnit").value = dataUnitDetails.namaUnit;
            document.querySelector("#txtUkuranTanah").value = dataUnitDetails.ukuranTanah;
            document.querySelector("#txtUkuranBangunan").value = dataUnitDetails.ukuranBangunan;
            document.querySelector("#txtJumlahUnit").value = dataUnitDetails.jumlahUnit;
            document.querySelector("#txtUnitTerjual").value = dataUnitDetails.unitTerjual;
            document.querySelector("#txtHargaJual").value = dataUnitDetails.hargaJual;
            document.querySelector("#txtMarketingFee").value = dataUnitDetails.marketingFee;
            MicroModal.show('mdlUnit');
        },
        deleteUnitAtc : function(namaUnit)
        {
            let cekNama = namaUnitData.indexOf(namaUnit);
            namaUnitData.splice(cekNama, 1);
            appProject.dataUnit.splice(cekNama, 1);
            pesan_toast("Unit berhasil dihapus ...");
        },
        simpanProjectAtc : function()
        {
            let kdProject = document.querySelector("#txtKodeProject").value;
            let namaProject = document.querySelector("#txtNamaProject").value;
            let pj = document.querySelector("#txtPenanggungJawab").value;
            let jenisProject = document.querySelector("#txtJenisProject").value;
            let tanggalProject = document.querySelector("#txtTanggalProject").value;
            let statusProject = document.querySelector("#txtStatusProject").value;
            let ds = {'dataUnit':appProject.dataUnit, 'kdProject':kdProject, 'namaProject':namaProject, 'pj':pj, 'jenisProject':jenisProject, 'tanggalProject':tanggalProject, 'statusProject':statusProject}
            // console.log(appProject.dataUnit);
            axios.post(rProsesProject, ds).then(function(res){
                let obj = res.data;
                console.log(obj);
            });
        }
    }
});
// function 
$("#tblProject").dataTable();
$("#txtHargaJual").mask('000.000.000.000.000', {reverse: true});
$(".select2").select2();
