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
            
            tidur_bentar(1500);
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            if(username === '' || password === ''){
                pesanUmumApp("warning", "Fill field!!!", "Harap isi username/password!!!");
            }else{
                document.querySelector("#btnMasuk").innerHTML = "<i class='zmdi zmdi-settings zmdi-hc-spin'></i> Login process ...";
                let ds = {'username':username, 'password':password}
                axios.post(rLoginProses, ds).then(function(res){
                    let dr = res.data;
                    if(dr.status === 'no_user'){
                        pesanUmumApp('warning', 'No user!!!', 'Tidak ada user terdaftar!!!');
                        document.querySelector("#btnMasuk").innerHTML = "Log In";
                        document.querySelector("#txtPassword").value = "";      
                        document.querySelector("#txtUsername").focus();
                    }else if(dr.status === 'wrong_password'){
                        pesanUmumApp('warning', 'Auth fail!!!', 'Username / password salah!!!');
                        document.querySelector("#btnMasuk").innerHTML = "Log In";
                        document.querySelector("#txtPassword").value = "";      
                        document.querySelector("#txtUsername").focus();
                    }else if(dr.status === 'success'){
                        window.location.assign(rDashboard);
                    }
                });
            }
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