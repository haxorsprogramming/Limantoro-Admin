// vue object 
var appPermintaan = new Vue({
    el : '#appPermintaanPembelian',
    data : {
        prosesBtnText : 'Proses permintaan',
        kdProjectRowSelected : ''
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
            console.log(kdProject);
            $(".rwProject").css("background-color", "");
            appPermintaan.kdProjectRowSelected = kdProject;
            document.querySelector("#rwProject"+kdProject).style.backgroundColor = "#81ecec";
        },
        pilihProjectModalAtc : function()
        {
            document.querySelector("#txtProject").value = appPermintaan.kdProjectRowSelected;
            $("#modalProject").closeModal();
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
$("#tblModalProject").dataTable();
