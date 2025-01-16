document.addEventListener("DOMContentLoaded", function() {
    const registerLink = document.getElementById("registerLink");
    const backButton = document.getElementById("backButton");
    const loginContainer = document.querySelector(".login-container");
    const registerContainer = document.querySelector(".register-container");

    registerLink.addEventListener("click", function(event) {
        event.preventDefault();
        loginContainer.style.display = "none";
        registerContainer.style.display = "block";
    });

    backButton.addEventListener("click", function(event) {
        event.preventDefault();
        registerContainer.style.display = "none";
        loginContainer.style.display = "block";
    });

    const registerForm = document.getElementById("registerForm");
    registerForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const name = document.getElementById("name").value;
        const regEmail = document.getElementById("regEmail").value;
        const regPassword = document.getElementById("regPassword").value;
        const confirmPassword = document.getElementById("confirmPassword").value;

        if (regPassword !== confirmPassword) {
            alert("Passwords do not match. Please re-enter.");
            return;
        }

        // You can send this data to the backend for registration
        console.log("Name: " + name);
        console.log("Email: " + regEmail);
        console.log("Password: " + regPassword);
        console.log("Confirm Password: " + confirmPassword);

        // Clear the form fields after registration
        registerForm.reset();
    });

    const loginForm = document.getElementById("loginForm");
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // You can send this data to the backend for authentication
        console.log("Email: " + email);
        console.log("Password: " + password);

        // Clear the form fields after login
        loginForm.reset();
    });
});