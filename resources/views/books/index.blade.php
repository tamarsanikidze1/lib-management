<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <form action="{{ route('books.index') }}" method="GET">
            <div class="form-group">
                <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">
                <input type="text" name="author" placeholder="Search by author" value="{{ request('author') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Authors</th>
                <th>Year of Publication</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach ($book->authors as $author)
                            {{ $author->name }}<br>
                        @endforeach
                    </td>
                    <td>{{ $book->publication_year }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('books.create') }}" class="btn btn-success">Add New Book</a>
    </div>
@endsection
