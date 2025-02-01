<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Search by title
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Search by author
        if ($request->has('author')) {
            $query->whereHas('authors', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('author') . '%');
            });
        }

        $books = $query->with('authors')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'publication_year' => 'required|integer',
            'status' => 'required|in:Available,Checked out',
            'authors' => 'required|array',
        ]);

        $book = Book::create($request->only('title', 'publication_year', 'status'));
        $book->authors()->attach($request->input('authors'));

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'publication_year' => 'required|integer',
            'status' => 'required|in:Available,Checked out',
            'authors' => 'required|array',
        ]);

        $book->update($request->only('title', 'publication_year', 'status'));
        $book->authors()->sync($request->input('authors'));

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        foreach ($book->authors as $author) {
            if ($author->books()->count() == 1) {
                $author->delete();
            }
        }

        $book->authors()->detach();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

}
