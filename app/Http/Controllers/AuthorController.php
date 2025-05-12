<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date',
            'nationality' => 'required|string',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string',
            'birthdate' => 'sometimes|date',
            'nationality' => 'sometimes|string',
        ]);

        $author->update($request->all());

        return response()->json($author);
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return response()->json(['message' => 'Autor eliminado correctamente.']);
    }
}
