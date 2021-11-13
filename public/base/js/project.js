// route 

// vue object 
var appProject = new Vue({
    el : '#appProject',
    data : {
        prosesBtnText : "Tambah project",
        kdProjectRowSelected : ''
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
            $("#rwPj"+kdProject).css("background-color", "yellow");
            console.log(kdProject);
        },
        pilihPjAtc : function()
        {
            document.querySelector("#txtPenanggungJawab").value = appProject.kdProjectRowSelected;
            MicroModal.close('modal-1');
        }
    }
});
// function 
$("#tblProject").dataTable();
$(".select2").select2();
MicroModal.init();
