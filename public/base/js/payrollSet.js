// route 
var rProsesPayroll = server + "app/penggajian/proses-payroll";
// vue object 
var appPayroll = new Vue({
    el : '#dPayrollSet',
    data : {
        btnProsesText : 'Proses payroll karyawan'
    },
    methods : {
        prosesPayroll : function()
        {
            Swal.fire({
                title: "Proses penggajian?",
                text: "Yakin memproses penggajian karyawan ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                    let username = document.querySelector("#txtUsername").value;
                    let ds = {'username':username}
                    axios.post(rProsesPayroll, ds).then(function(res){
                        let obj = res.data;
                        let token = obj.token;
                        let rCetakGaji = server + "app/penggajian/cetak/"+token;
                        window.open(rCetakGaji);
                    });
                }
              });
        }
    }
});