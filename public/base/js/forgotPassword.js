// route 
var rProsesReset = server + "/auth/send-reset-password";
// vue object 
var appForget = new Vue({
    el : '#appForgotPassword',
    data : {

    },
    methods : {
        sendAtc : async function()
        {
            let email = document.querySelector("#txtEmail").value;
            let ds = {'email':email}
            document.querySelector("#btnKirim").innerHTML = "<i class='zmdi zmdi-settings zmdi-hc-spin'></i> Memproses ...";
            axios.post(rProsesReset, ds).then(function(res){
                let obj = res.data;
                if(obj.status === 'no_email'){
                    pesanUmumApp('warning', 'No email', 'Tidak ada email terdaftar');
                    document.querySelector("#btnKirim").innerHTML = "Log In";
                }else{
                    pesanUmumApp('success', 'Success', 'Email reset password telah terkirim ke email, silahkan cek inbox / folder spam anda');
                    tidur_bentar(2000);
                    window.location.assign(server);
                }
            });
        }
    }
});



// inisialisasi 
document.querySelector("#txtEmail").focus();

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function tidur_bentar(ms){
    return new Promise(resolve => { setTimeout(resolve, ms) });
}