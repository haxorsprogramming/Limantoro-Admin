// route 
var r_beranda = server + "app/beranda";
var r_member = server + "app/member";
var rSupplier = server + "app/supplier";
var rCustomer = server + "app/customer";
var rMaterial = server + "app/material";
var rKaryawan = server + "app/karyawan";
var rProject = server + "app/project";
var rPermintaanPembelian = server + "app/permintaan-pembelian";
var rPersetujuanPermintaanPembelian = server + "app/persetujuan-permintaan-pembelian";
// vue object 
var div_menu = new Vue({
    el : '#slide-out',
    data : {
        username : 'Admin'
    },
    methods : {
        dashboarc_atc : function()
        {
            load_page(r_beranda, 'Dashboard');
        },
        member_atc : function()
        {
            load_page(r_member, 'Member');
        },
        statistik_atc : function()
        {
            
        },
        supplierAtc : function()
        {
            load_page(rSupplier, 'Supplier');
        },
        customerAtc : function()
        {
            load_page(rCustomer, 'Customer');
        },
        materialAtc : function()
        {
            load_page(rMaterial, 'Material');
        },
        karyawanAtc : function()
        {
            load_page(rKaryawan, 'Karyawan');
        },
        projectAtc : function()
        {
            load_page(rProject, 'Project');
        },
        permintaanPembelianAtc : function()
        {
            load_page(rPermintaanPembelian, 'Permintaan Pembelian');
        },
        persetujuanPermintaanPembelianAtc : function()
        {
            load_page(rPersetujuanPermintaanPembelian, 'Persetujuan Permintaan Pembelian');
        }
    }
});

var footer_app = new Vue({
    el : '#footer_app',
    data : {
        page_title : 'Dashboard'
    },
    methods : {

    }
})
// fungsi 
document.addEventListener('DOMContentLoaded', function() {
    NProgress.configure({ showSpinner: false });
    load_page(r_beranda, 'Dashboard');
    
    MicroModal.init();
    $('.tooltipped').tooltip();
    $('.dropdown-trigger').dropdown();
  });


function pesan_toast(pesan)
{
    Materialize.toast(pesan, 3000);
}


async function load_page(page, page_title)
{
    footer_app.page_title = page_title;
    NProgress.start();
    document.querySelector("#div_utama").innerHTML = "<div style='text-align:center;width:100%;margin-top:40px;font-size:20px;'>Memuat halaman ...</div>";
    await tidur_bentar(1000);
    $("#div_utama").load(page);
    NProgress.done();
}

function tidur_bentar(ms){
    return new Promise(resolve => { setTimeout(resolve, ms) });
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function tip(element, isi)
{
    tippy(element, {content: isi});
}