<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books',
            'published_date' => 'required|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|string',
            'isbn' => 'sometimes|string|unique:books,isbn,' . $book->id,
            'published_date' => 'sometimes|date',
            'author_id' => 'sometimes|exists:authors,id',
        ]);

        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json(['message' => 'Libro eliminado correctamente.']);
    }
}
