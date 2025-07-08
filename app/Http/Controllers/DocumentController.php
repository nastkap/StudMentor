<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Document;
class DocumentController extends Controller
{
   
    public function index()
    {
        $document = Document::orderBy('created_at', 'DESC')->get();
  
        return view('documents.index', compact('document'));
    }

    public function create()
    {
        return view('documents.create');
    }
    //Metoda obsługująca dodawanie nowego dokumentu.
    public function store(Request $request)
{
    // Walidacja danych wejściowych
    $request->validate([
        'title' => 'required|regex:/^[a-zA-Z0-9\s\-]+$/|string',
        'description' => 'required|nullable|regex:/^[a-zA-Z0-9\s\-]+$/|string',
        'fileToUpload' => 'required|file|max:5000000|mimes:pdf,zip',
    ],
    [
        'title.required' => 'Pole "Tytuł" jest wymagane.',
        'description.required' => 'Pole "Opis" jest wymagane.',
        'title.regex' => 'Tytuł może zawierać tylko litery, cyfry, spacje i myślniki.',
        'description.regex' => 'Opis może zawierać tylko litery, cyfry, spacje i myślniki.',
        'fileToUpload.required' => 'Plik jest wymagany.',
        'fileToUpload.mimes' => 'Przykro nam, dozwolone są tylko pliki pdf, zip.',
    ]);

    // Przetwarzanie przesłanego pliku.
    $file = $request->file('fileToUpload');
    $path = $file->store('uploads');

     // Zapis dokumentu w bazie danych
    Document::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'file' => $path,
    ]);

    return redirect()->route('documents')->with('success', 'Dokument został dodany pomyślnie');
}


    public function show(string $id)
    {
        $document = Document::findOrFail($id);
  
        return view('documents.show', compact('document'));
    }

    public function edit(string $id)
    {
        $document = Document::findOrFail($id);
  
        return view('documents.edit', compact('document'));
    }

   
    public function update(Request $request, string $id)
    {
        $document = Document::findOrFail($id);
  
        $document->update($request->all());
  
        return redirect()->route('documents')->with('success', 'Dokument został pomyślnie zaktualizowany');
    }

    
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        $document->delete();
  
        return redirect()->route('documents')->with('success', 'Dokument został pomyślnie usunięty');
    }

    //Pobiera plik dokumentu do pobrania.
    public function download($id)
{
    $document = Document::findOrFail($id);
    $file = storage_path('app/' . $document->file);

    return response()->download($file, $document->title . '.' . pathinfo($file, PATHINFO_EXTENSION), [], 'inline');
}
}