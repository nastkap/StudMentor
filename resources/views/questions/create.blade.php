@extends('layouts.app')

@section('title', 'Dodaj pytanie')

@section('contents')
   
    <hr />
    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Tytuł">
            </div>
            
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Opis"></textarea>
            </div>
        </div>
       
        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Dodać</button>
            </div>
        </div>
    </form>
@endsection
