<!-- Wyświetlanie komunikatu sukcesu -->
@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StudMentor</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="p-5 login-container">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Zaloguj się</h1>
        </div>
       <!-- Formularz logowania -->
        <form action="{{ route('login.action') }}" method="POST" class="user">
            @csrf
       <!-- Wyświetlanie błędów walidacji -->      
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! htmlspecialchars($error) !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Pole adresu e-mail -->
            <div class="mb-4"></div>
            <div class="form-group">
                <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Wprowadź adres e-mail" value="{{ old('email') }}">
            </div>
            <!-- Pole hasła -->
            <div class="form-group">
                <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword"
                    placeholder="Hasło">
            </div>
            <!-- Opcja zapamiętania danych logowania -->
            <div class="form-group custom-control custom-checkbox small">
                <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Zapamiętaj mnie</label>
            </div>
            <!-- Przycisk logowania -->
            <div class="buttons-container">
                <button type="submit" class="login-button">Zaloguj</button>
            </div>
        </form>
    </div>
</body>
</html>

