// route 
var rLoginProses = server + "/login/proses";
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
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let ds = {'username':username, 'password':password}
            axios.post(rLoginProses, ds).then(function(res){
                let dr = res.data;
                console.log(dr);
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
