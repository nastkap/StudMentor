<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - StudMentor</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>   
<div class="p-5 register-container">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Formularz do rejestracji</h1>
              </div>
               <!-- Formularz rejestracji -->
             <form id="registration-form" method="POST" action="{{ route('register.save') }}">
        @csrf
         <!-- Pole imienia i nazwiska -->
        <label for="name">Imię i nazwisko:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
        <!-- Pole adresu e-mail -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
         <!-- Pole wieku -->
        <label for="age">Wiek:</label>
        <input type="text" id="age" name="age" value="{{ old('age') }}" required>
        @error('age')
            <span class="error">{{ $message }}</span>
        @enderror
        <!-- Pole roku studiów -->
        <label for="study_year">Rok studiów:</label>
        <input type="text" id="study_year" name="study_year" value="{{ old('study_year') }}" required>
        @error('study_year')
            <span class="error">{{ $message }}</span>
        @enderror
        <!-- Pole hasła -->
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
        <!-- Potwierdzenie hasła -->
        <label for="password_confirmation">Potwierdź hasło:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        @error('password_confirmation')
            <span class="error">{{ $message }}</span>
        @enderror
        <!-- Przycisk rejestracji -->
        <button type="submit">Zarejestruj się</button>
    </form>
    <!-- Dołączenie skryptu JavaScript -->
    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>

