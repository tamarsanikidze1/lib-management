@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Author</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Author</button>
        </form>
    </div>
@endsection
