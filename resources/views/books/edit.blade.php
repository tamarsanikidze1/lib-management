<!-- resources/views/books/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="publication_year">Year of Publication</label>
                <input type="number" name="publication_year" id="publication_year" class="form-control" value="{{ $book->publication_year }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Available" {{ $book->status == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Checked out" {{ $book->status == 'Checked out' ? 'selected' : '' }}>Checked out</option>
                </select>
            </div>
            <div class="form-group">
                <label for="authors">Author(s)</label>
                <select name="authors[]" id="authors" class="form-control" multiple required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
@endsection
