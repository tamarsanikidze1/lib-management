<!-- resources/views/authors/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Authors</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Books</th>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
