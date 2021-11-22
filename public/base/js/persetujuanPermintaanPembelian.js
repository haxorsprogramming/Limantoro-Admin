// vue object 
var appSetuju = new Vue({
    el : '#appPersetujuanPermintaanPembelian',
    data : {
        noPrSelected : ''
    },
    methods : {
        setujuiAtc : function(noPr)
        {
            let rDataModal = server + "app/persetujuan-permintaan-pembelian/"+noPr+"/data-for-modal";
            axios.get(rDataModal).then(function(res){
                let obj = res.data;
                console.log(obj);
            });
            appSetuju.noPrSelected = noPr;
            $("#modalPersetujuan").openModal();
        }
    }
});
// fungsi inisialisasi 
$("#tblPersetujuanPermintaanPembelian").dataTable();
tip('#btnSetujui', 'Setujui');
tip('#btnPrint', 'Print');