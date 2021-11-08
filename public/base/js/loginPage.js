// function
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

function masukAtc()
{
    console.log("Masuk di klik!!!");
}