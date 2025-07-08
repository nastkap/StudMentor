@extends('layouts.app')
  
@section('title', 'Edytuj dokument')
  
@section('contents')
    
 
    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tytuł</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $document->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Opis</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $document->description }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Plik</label>
                <div class="mb-2">
                    <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-primary">Wyświetl plik</a>
                   
                </div>
              
            </div>
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Aktualizacja</button>
            </div>
        </div>
    </form>

   
@endsection
