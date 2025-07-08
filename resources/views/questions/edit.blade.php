@extends('layouts.app')
  
@section('title', 'Edytuj pytanie')
  
@section('contents')
    
 
    <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tytuł</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $question->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Opis</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $question->description }}</textarea>
            </div>
        
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Aktualizacja</button>
            </div>
        </div>
    </form>

   
@endsection
