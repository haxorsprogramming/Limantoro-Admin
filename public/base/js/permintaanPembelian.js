// vue object 
var appPermintaan = new Vue({
    el : '#appPermintaanPembelian',
    data : {
        prosesBtnText : 'Proses permintaan',
        kdProjectRowSelected : '',
        titleProjectSelected : ''
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
        rwMaterialSelectAtc : function(kdMaterial)
        {
            console.log("haloo");
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
$("#tblModalProject").dataTable();
$("#tblModalMaterial").dataTable();
