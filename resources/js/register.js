// public/js/register_validation.js

document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('registration-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');
        var ageInput = document.getElementById('age');
        var studyYearInput = document.getElementById('study_year');
        var passwordInput = document.getElementById('password');
        var passwordConfirmationInput = document.getElementById('password_confirmation');

        var errors = [];

        // Walidacja pola 'name'
        if (nameInput.value.trim() === '') {
            errors.push('Pole "Imię i nazwisko" jest wymagane.');
        } else if (!/^[A-Z][a-z]+\s[A-Z][a-z]+$/.test(nameInput.value)) {
            errors.push('Pole "Imię i nazwisko" musi składać się z dwóch słów, z dużą pierwszą literą każdego słowa.');
        }

        // Walidacja pola 'email'
        if (emailInput.value.trim() === '') {
            errors.push('Pole "Email" jest wymagane.');
        } else if (!/^\S+@\S+\.\S+$/.test(emailInput.value)) {
            errors.push('Pole "Email" musi być poprawnym adresem e-mail.');
        }

        // Walidacja pola 'age'
        if (ageInput.value.trim() === '') {
            errors.push('Pole "Wiek" jest wymagane.');
        } else if (!/^\d+$/.test(ageInput.value)) {
            errors.push('Pole "Wiek" musi być liczbą całkowitą.');
        }

        // Walidacja pola 'study_year'
        if (studyYearInput.value.trim() === '') {
            errors.push('Pole "Rok studiów" jest wymagane.');
        } else if (!/^\d{4}$/.test(studyYearInput.value)) {
            errors.push('Pole "Rok studiów" musi składać się dokładnie z 4 cyfr.');
        }

        // Walidacja pola 'password'
        if (passwordInput.value.trim() === '') {
            errors.push('Pole "Hasło" jest wymagane.');
        } else if (passwordInput.value.length < 8) {
            errors.push('Pole "Hasło" musi mieć co najmniej 8 znaków.');
        }

        // Walidacja potwierdzenia hasła
        if (passwordConfirmationInput.value.trim() === '') {
            errors.push('Pole "Potwierdź hasło" jest wymagane.');
        } else if (passwordConfirmationInput.value !== passwordInput.value) {
            errors.push('Potwierdzenie hasła nie zgadza się.');
        }

        if (errors.length > 0) {
            alert('Wystąpiły błędy:\n' + errors.join('\n'));
        } else {
            form.submit();
        }
    });
});
