// route 
var r_get_provinsi = server + "daerah/get-provinsi/all";

// vue object 
var app_member = new Vue({
    el : '#app_member',
    data : {
        provinsi : []
    },
    methods : {
        tambah_member_atc : function()
        {
            get_provinsi();
            $('#d_member').hide();
            $("#d_form_tambah_member").show();
            document.querySelector("#txt_username").focus();
        },
        simpan_member_atc : function()
        {
            let id_prov = document.querySelector("#txt_provinsi").value;
            console.log(id_prov);
        }
    }
});

// function 
$('#tbl_member').dataTable();

function get_provinsi()
{
    axios.get(r_get_provinsi).then(function(res){
        let dr = res.data;
        dr.forEach(render_provinsi);
        function render_provinsi(item, index){
            app_member.provinsi.push({nama : dr[index].nama, id_prov : dr[index].id_prov});
        }
    });
}
