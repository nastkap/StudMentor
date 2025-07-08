

document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();
        validateForm();
    });

    function validateForm() {
        var emailInput = document.getElementById('exampleInputEmail');
        var passwordInput = document.getElementById('exampleInputPassword');
        var emailError = document.getElementById('email-error');
        var passwordError = document.getElementById('password-error');

        emailError.textContent = "";
        passwordError.textContent = "";

        if (emailInput.value.trim() === '') {
            emailError.textContent = 'Pole "Wprowadź adres e-mail" jest wymagane.';
        } else if (!isValidEmail(emailInput.value)) {
            emailError.textContent = 'Proszę podać poprawny adres e-mail.';
        }

        if (passwordInput.value.trim() === '') {
            passwordError.textContent = 'Pole "Hasło" jest wymagane.';
        }



        // Jeśli nie ma błędów, można wysłać formularz
        if (emailError.textContent === "" && passwordError.textContent === "") {
            loginForm.submit();
        }
    }

    function isValidEmail(email) {
        // Prosta walidacja adresu e-mail, można dostosować według własnych wymagań
        var emailRegex = /^\S+@\S+\.\S+$/;
        return emailRegex.test(email);
    }
});
