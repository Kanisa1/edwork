const signUpLink = document.getElementById("signUpLink");
const loginLink = document.getElementById("loginLink");
const loginForm = document.getElementById("loginForm");
const signUpForm = document.getElementById("signUpForm");
const formHeading = document.getElementById("form-heading");
const infoHeading = document.getElementById("info-heading");
const infoText = document.getElementById("info-text");

signUpLink.addEventListener("click", function(e) {
    e.preventDefault();
    formHeading.innerText = "Sign Up";
    infoHeading.innerText = "HELLO THERE!";
    infoText.innerText = "Enter your details to start your journey with us.";
    loginForm.style.display = "none";
    signUpForm.style.display = "block";
});

loginLink.addEventListener("click", function(e) {
    e.preventDefault();
    formHeading.innerText = "Login";
    infoHeading.innerText = "WELCOME BACK!";
    infoText.innerText = "Please enter your correct credentials to continue your journey with us";
    loginForm.style.display = "block";
    signUpForm.style.display = "none";
});
