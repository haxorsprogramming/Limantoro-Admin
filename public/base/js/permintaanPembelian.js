// route 
var rProsesPermintaan = server + "app/permintaan-pembelian/tambah/proses";
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
                    satuan : appPermintaan.satuanMaterialTemp,
                    jumlah : 0,
                    pesan : ''
                });
                dataMaterialKode.push(appPermintaan.kdMaterialTemp);
                noTabelMaterial++;
                $("#modalMaterial").closeModal();
            }
        },
        prosesPermintaanAtc : async function()
        {
            dataMaterialKode.forEach(renderMaterial);
            function renderMaterial(item, index){
                let valJumlahMaterial = document.querySelector("#txtJumlahBarang_"+dataMaterialKode[index]).value;
                let pesanMaterial = document.querySelector("#txtPesan_"+dataMaterialKode[index]).value;
                appPermintaan.materialData[index].jumlah = valJumlahMaterial;
                appPermintaan.materialData[index].pesan = pesanMaterial;
            }
            // proses 
            let kdProject = appPermintaan.kdProjectRowSelected;
            let tanggal = document.querySelector("#txtTanggalProject").value;
            let ds = {'dataMaterial':appPermintaan.materialData, 'kdProject':kdProject, 'tanggal':tanggal}
            appPermintaan.prosesBtnText = "Memproses ...";
            await tidur_bentar(2000);
            axios.post(rProsesPermintaan, ds).then(function(res){
                pesan_toast("Data permintaan pembelian berhasi di tambahkan ...");
                load_page(rPermintaanPembelian, 'Permintaan Pembelian');
            });
        },
        kembaliAtc : function()
        {
            load_page(rPermintaanPembelian, 'Permintaan Pembelian');
        }
    }
});
// fungsi inisialisasi 
$("#tblPermintaan").dataTable();
$("#tblModalProject").dataTable();
$("#tblModalMaterial").dataTable();

var noTabelMaterial = 1;
var dataMaterialKode = [];