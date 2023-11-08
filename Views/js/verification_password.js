let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmpassword");


function verificationPassword() {
    if(password != confirmPassword) {
        document.getElementById("errorMessage").style.display('block');
    }
}