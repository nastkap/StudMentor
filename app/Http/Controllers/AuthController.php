<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
          // Metoda wyświetlająca formularz rejestracji
        return view('auth/register');
    }

    // Metoda obsługująca zapis użytkownika po rejestracji
     public function registerSave(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'regex:/^[A-Z][a-z]+\s[A-Z][a-z]+$/','max:255'],
        'email' => 'required|email|unique:users', // Wymagane, format e-mail, unikalność w tabeli 'users'
        'age' => 'required|integer|max:40', // Wymagane, liczba całkowita, maksymalna wartość 40
        'study_year' => 'required|digits:4', // Wymagane, dokładnie 4 cyfry
        'password' => 'required|confirmed|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/', 
    ], [
          // Komunikaty błędów
        'name.required' => 'Pole ":attribute" jest wymagane.',
        'name.regex' => 'Pole ":attribute" musi składać się z dwóch słów, z dużą pierwszą literą każdego słowa.',
        'name.max' => 'Pole ":attribute" nie może być dłuższe niż :max znaków.',
        
        'email.required' => 'Pole ":attribute" jest wymagane.',
        'email.email' => 'Pole ":attribute" musi być poprawnym adresem e-mail.',
        'email.unique' => 'Pole ":attribute" musi być unikalne w systemie.',
        
        'password.required' => 'Pole ":attribute" jest wymagane.',
        'password.confirmed' => 'Potwierdzenie hasła nie zgadza się.',
        'password.min' => 'Pole ":attribute" musi mieć co najmniej :min znaków.',
        'password.regex' => 'Pole ":attribute" musi zawierać co najmniej jedną wielką literę, jedną cyfrę i jeden znak specjalny.',
        
        'age.required' => 'Pole ":attribute" jest wymagane.',
        'age.integer' => 'Pole ":attribute" musi być liczbą całkowitą.',
        'age.max' => 'Pole ":attribute" nie może przekraczać :max.',
        
        'study_year.required' => 'Pole ":attribute" jest wymagane.',
        'study_year.digits' => 'Pole ":attribute" musi mieć dokładnie :digits cyfry.',
    ], [
        'name' => 'Imię i nazwisko',
        'email' => 'Email',
        'age' => 'Wiek',
        'password' => 'Hasło',
        'study_year' => 'Rok studiów',
    ]);
    
     // Sprawdzenie, czy walidacja nie zakończyła się niepowodzeniem
    if ($validator->fails()) {
        return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
    }

  // Haszowanie hasła przed zapisem do bazy danych
  $hashedPassword = Hash::make($request->input('password'));

    // Zapis użytkownika do bazy danych
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
        'age' => $request->age,
        'study_year' => $request->study_year,
         
    ]);
    // Przekierowanie po udanej rejestracji
    return redirect()->route('login')->with('success', 'Rejestracja zakończona sukcesem! Teraz możesz zalogować się.');
}


    // Metoda wyświetlająca stronę powitalną
    public function welcome()
    {
        return view('/welcome');
    }

    // Metoda wyświetlająca formularz logowania
    public function login()
    {
        return view('auth/login');
    }
    // Metoda obsługująca logowanie
    public function loginAction(Request $request)
    {
        // Walidacja danych wejściowych
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Pole ":attribute" jest wymagane.',
            'email.email' => 'Pole ":attribute" musi być adresem e-mail.',
            'password.required' => 'Pole ":attribute" jest wymagane.'
        ]);
         // Sprawdzenie, czy walidacja nie zakończyła się niepowodzeniem
         if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
    
        try {
            // Próba uwierzytelnienia użytkownika
            if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed')
                ]);
            }

             // Sprawdzenie zgodności hasła
             $user = Auth::user();
             if (!Hash::check($request->input('password'), $user->password)) {
                 throw ValidationException::withMessages([
                     'email' => trans('auth.failed'),
                 ]);
             }
            // Odświeżenie sesji po udanym logowaniu
            $request->session()->regenerate();

             // Przekierowanie po udanym logowaniu
            return redirect()->route('dashboard');
        } catch (ValidationException $e) {
            // Przekierowanie w przypadku nieudanego logowania
            return redirect()->route('login')->withErrors($e->validator)->withInput();
        }
    }
    
    
    // Metoda obsługująca wylogowywanie
    public function logout(Request $request)
    { 
        // Wylogowanie użytkownika
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
   
     // Metoda wyświetlająca panel główny po zalogowaniu
    public function dashboard()
    {
        return view('dashboard');
    }

   // Metoda wyświetlająca profil użytkownika
    public function profile()
    {
        return view('profile');
    }
}
