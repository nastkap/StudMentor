<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $question =  Question::orderBy('created_at', 'DESC')->get();
  
        return view(' questions.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {$request->validate([
        'title' => 'required|regex:/^[a-zA-Z0-9\s\-]+$/|string',
        'description' => 'nullable|regex:/^[a-zA-Z0-9\s\-!?\']+$/|string',

        
    ],
    [
        'title.regex' => 'Tytuł może zawierać tylko litery, cyfry, spacje i myślniki.',
        'description.regex' => 'Opis może zawierać tylko litery, cyfry, spacje i myślniki.',
    
    ]);
      

        
        

        // Save document to the database
        Question::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            
        ]);
        return redirect()->route('questions')->with('success', 'Pytanie zostało dodane pomyślnie');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::findOrFail($id);
  
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
  
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);
  
        $question->update($request->all());
  
        return redirect()->route('questions')->with('success', 'Pytanie zostało pomyślnie zaktualizowane');
    }

    
    

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);

        
  
        $question->delete();
  
        return redirect()->route('questions')->with('success', 'Pytanie zostało pomyślnie usunięte');
    }

   

}
