function openPopup() {
    document.getElementById('popup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

function loginButton() {
    
}

document.getElementById('openPopup').addEventListener('click', openPopup);


function newUser() {
    jQuery(".form-signin").toggleClass("form-signin-left");
    jQuery(".form-signup").toggleClass("form-signup-left");
    jQuery(".frame").toggleClass("frame-long");
    jQuery(".signup-inactive").toggleClass("signup-active");
    jQuery(".signin-active").toggleClass("signin-inactive");
    jQuery(".forgot").toggleClass("forgot-left");
    jQuery(this).removeClass("idle").addClass("active");
};

function openAccount() {
    document.getElementById('account').style.display = 'flex';
}

function closeAccount() {
    var popup = document.querySelector('.account');
    popup.style.display = 'none';
}

document.getElementById('closeaccount').addEventListener('click', closeAccount);
