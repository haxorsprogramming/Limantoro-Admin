// vue object 
var appPermintaan = new Vue({
    el : '#appPermintaanPembelian',
    data : {
        prosesBtnText : 'Proses permintaan',
        kdProjectRowSelected : '',
        titleProjectSelected : '',
        materialData : [],
        kdMaterialTemp : '',
        namaMaterialTemp : '',
        satuanMaterialTemp : ''
    },
    methods : {
        tambahPermintaanPembelian : function()
        {
            $("#dPermintaanPembelian").hide();
            $("#dFormTambahPermintaanPembelian").show();
            document.querySelector("#txtNomorPr").focus();
        },
        pilihProjectAtc : function()
        {
            $("#modalProject").openModal();
        },
        selectRowProject : function(kdProject)
        {
            let prSplit = kdProject.split("-");
            $(".rwProject").css("background-color", "");
            appPermintaan.kdProjectRowSelected = prSplit[0];
            appPermintaan.titleProjectSelected = prSplit[1];
            document.querySelector("#rwProject"+prSplit[0]).style.backgroundColor = "#81ecec";
        },
        pilihProjectModalAtc : function()
        {
            document.querySelector("#txtProject").value = appPermintaan.kdProjectRowSelected + " - " + appPermintaan.titleProjectSelected;
            $("#modalProject").closeModal();
        },
        tambahMaterialAtc : function()
        {
            $("#modalMaterial").openModal();
        },
        rwMaterialSelectAtc : function(dataMaterial)
        {
            let matSplit = dataMaterial.split("-");
            appPermintaan.kdMaterialTemp = matSplit[0];
            appPermintaan.namaMaterialTemp = matSplit[1];
            appPermintaan.satuanMaterialTemp = matSplit[2];
            $(".rwMaterial").css("background-color", "");
            document.querySelector("#rwMaterial"+matSplit[0]).style.backgroundColor = "#81ecec";
        },
        tambahMaterialAtcModal : function()
        {
            let kdMaterialTemp = appPermintaan.kdMaterialTemp;
            if(dataMaterialKode.indexOf(kdMaterialTemp) !== -1){
                pesan_toast("Material sudah dimasukkan ... !!!");
            }else{
                appPermintaan.materialData.push({
                    no : noTabelMaterial,
                    kode : appPermintaan.kdMaterialTemp,
                    nama : appPermintaan.namaMaterialTemp,
                    satuan : appPermintaan.satuanMaterialTemp
                });
                dataMaterialKode.push(appPermintaan.kdMaterialTemp);
                noTabelMaterial++;
                $("#modalMaterial").closeModal();
            }
        },
        prosesPermintaanAtc : function()
        {
            dataMaterialKode.forEach(renderMaterial);
            function renderMaterial(item, index){
                let valJumlahMaterial = document.querySelector("#txtJumlahBarang_"+dataMaterialKode[index]).value;
                let pesanMaterial = document.querySelector("#txtPesan_"+dataMaterialKode[index]).value;
            }
            let kdPr = '';
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
$("#tblModalProject").dataTable();
$("#tblModalMaterial").dataTable();

var noTabelMaterial = 1;
var dataMaterialKode = [];