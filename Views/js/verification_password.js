function verificationPassword() {
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("confirmpassword");
    console.log("on teste: ");
    if(password.value !== confirmPassword.value) {
        console.log("ok");
        document.getElementById("errorMessage").innerHTML = "Les mots de passe ne correspondent pas";
        return false;
    } else {
        console.log("pas ok");
        return true;
    }
}