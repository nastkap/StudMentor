<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudMentor</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> 
</head>
<body>
    <div class="welcome-container">
        <h1>Witaj na StudMentor!</h1>
        <p>StudMentor to miejsce, gdzie studenci dzielą się wiedzą i wspierają się nawzajem.</p>
        <p>Dołącz do naszej społeczności już teraz i czerp korzyści z doświadczeń innych studentów!</p>

           <!-- Przyciski do logowania i rejestracji -->
        <div class="buttons-container">
            <a href="{{ route('login') }}" class="login-button">Zaloguj się</a>
            <a href="{{ route('register') }}" class="register-button">Zarejestruj się</a>
        </div>
    </div>
</body>
</html>