@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Authors</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Books</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>
                        @foreach ($author->books as $book)
                            {{ $book->title }}<br>
                        @endforeach
                    </td>
                    <td>
                        <!-- Add any actions like edit or delete here -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('authors.create') }}" class="btn btn-success">Add New Author</a>
    </div>
@endsection
