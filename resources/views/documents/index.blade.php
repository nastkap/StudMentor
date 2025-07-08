@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
 
        <a href="{{ route('documents.create') }}" class="btn btn-primary">Dodaj dokument</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Tytuł</th>
                <th>Opis</th>
                <th>Plik</th>
                <th>Działanie</th>
            </tr>
        </thead>
        <tbody>+
            @if($document->count() > 0)
                @foreach($document as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->description }}</td> 
                        <td class="align-middle">{{ $rs->file }}</td>
                         
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('documents.show', $rs->id) }}" type="button" class="btn btn-secondary">Szczegóły</a>
                                <a href="{{ route('documents.edit', $rs->id)}}" type="button"  class="btn btn-success">Edytuj</a>
                               <form action="{{ route('documents.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Usuń</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Document not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection