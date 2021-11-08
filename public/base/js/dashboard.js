// route 
var r_beranda = server + "app/beranda";
var r_member = server + "app/member";
var rSupplier = server + "app/supplier";

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
NProgress.configure({ showSpinner: false });
load_page(r_beranda, 'Dashboard');

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