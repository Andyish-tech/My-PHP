<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
@section('content')
<h1>Available Books</h1>
@foreach ($books as $book)
    <div class="book-card">
        <h2>{{ $book->title }}</h2>
        <p>Author: {{ $book->author }}</p>
        <p>Category: {{ $book->category }}</p>
        @if ($book->status == 'available')
            <form method="POST" action="{{ url('/rent-request/' . $book->id) }}">
                @csrf
                <button type="submit">Rent Book</button>
            </form>
        @else
            <p>Status: {{ $book->status }}</p>
        @endif
    </div>
@endforeach
@endsection

// resources/views/admin/books/index.blade.php
@extends('layouts.app')
@section('content')
<h1>Manage Books</h1>
<a href="{{ route('books.create') }}">Add New Book</a>
@foreach ($books as $book)
    <div class="book-admin-card">
        <strong>{{ $book->title }}</strong>
        <p>Author: {{ $book->author }}</p>
        <a href="{{ route('books.edit', $book->id) }}">Edit</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
@endsection

</body>
</html>