@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="publication_year">Year of Publication</label>
                <input type="number" name="publication_year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Available">Available</option>
                    <option value="Checked out">Checked out</option>
                </select>
            </div>
            <div class="form-group">
                <label for="authors">Authors</label>
                <select name="authors[]" class="form-control" multiple required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Book</button>
        </form>
    </div>
@endsection
