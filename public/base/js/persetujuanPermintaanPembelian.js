// vue object 
var appSetuju = new Vue({
    el : '#appPersetujuanPermintaanPembelian',
    data : {
        noPrSelected : '-',
        tanggalPermintaan : '-',
        namaProject : '-',
        userRequest : '-'
    },
    methods : {
        setujuiAtc : function(noPr)
        {
            let rDataModal = server + "app/persetujuan-permintaan-pembelian/"+noPr+"/data-for-modal";
            let rTabelPermintaanMaterial = server + "app/persetujuan-permintaan-pembelian/"+noPr+"/tabel-permintaan-material";
            
            axios.get(rDataModal).then(function(res){
                let obj = res.data;
                appSetuju.namaProject = obj.namaProject;
                appSetuju.tanggalPermintaan = obj.dp.tanggal;
                appSetuju.userRequest = obj.dp.user_request;
            });
            appSetuju.noPrSelected = noPr;
            $("#modalPersetujuan").openModal();
            document.querySelector("#dPermintaanMaterial").innerHTML = "Memuat ...";
            $("#dPermintaanMaterial").load(rTabelPermintaanMaterial);
        }
    }
});
// fungsi inisialisasi 
$("#tblPersetujuanPermintaanPembelian").dataTable();
tip('#btnSetujui', 'Setujui');
tip('#btnPrint', 'Print');
