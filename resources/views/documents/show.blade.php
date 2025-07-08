@extends('layouts.app')
  
@section('title', 'Szczegóły dokumentu')
  
@section('contents')
    
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tytuł</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $document->title }}" readonly>
        </div>
     
        <div class="col mb-3">
            <label class="form-label">Opis</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $document->description }}</textarea>
        </div>

        <div class="col mb-3">
            <label class="form-label">Plik</label>
            <div class="mb-2">
                <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-primary">Wyświetl plik</a>
            </div>
            <span>{{ $document->file }}</span>
        </div>
    </div>
    

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Utworzono o</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $document->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Zaktualizowano o</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $document->updated_at }}" readonly>
        </div>
    </div>
@endsection
