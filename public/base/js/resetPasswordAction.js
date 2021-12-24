// route 
var rProsesUpdate = server + "auth/reset-password/";
// vue object 
var appReset = new Vue({
    el : '#appReset',
    data : {

    },
    methods : {
        prosesAtc : function()
        {
            let pass1 = document.querySelector("#txtPassword1").value;
            let pass2 = document.querySelector("#txtPassword2").value;
            if(pass1 === pass2){

            }else{
                pesanUmumApp('warning','Fail ...' ,'Password tidak sama, periksa kembali');
            }
        }
    }
});
// inisialisasi 
document.querySelector("#txtPassword1").focus();
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
