// route 
var rLoginProses = server + "/login/proses";
var rDashboard = server + "/app";
// vue object 
var appLogin = new Vue({
    el : '#appLogin',
    data : {
        username : '',
        password : ''
    },
    methods : 
    {
        loginAtc : function()
        {
            document.querySelector("#btnMasuk").innerHTML = "<i class='zmdi zmdi-settings zmdi-hc-spin'></i> Login process ...";
            tidur_bentar(1500);
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let ds = {'username':username, 'password':password}
            axios.post(rLoginProses, ds).then(function(res){
                let dr = res.data;
                if(dr.status === 'no_user'){
                    pesanUmumApp('warning', 'No user!!!', 'Tidak ada user terdaftar!!!');
                }else if(dr.status === 'wrong_password'){
                    pesanUmumApp('warning', 'Auth fail!!!', 'Username / password salah!!!');
                }else if(dr.status === 'success'){
                    window.location.assign(rDashboard);
                }
            });
        }
    }
});

// function
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

document.querySelector("#txtUsername").focus();

var fillPassword = document.getElementById("txtPassword");

fillPassword.addEventListener("keyup", function (event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        document.getElementById("btnMasuk").click();
    }
});

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