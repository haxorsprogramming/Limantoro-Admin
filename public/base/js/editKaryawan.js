// vue object 
var appEdit = new Vue({
    el : '#dFormEditKaryawan',
    data : {
        prosesBtnText : "Proses"
    },
    methods : {
        kembaliAtc : function()
        {

        },
        prosesAtc : function()
        {
            pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate data karyawan');
            load_page(rKaryawan, 'Karyawan');
        }
    }
});

// inisialisasi 
function setImg()
{

}

function bisaLoginSelect()
{

}