<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\{Note, Subject};
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::with('subject')->latest()->get();
        return NoteResource::collection($notes);
    }

    public function show(Note $note)
    {
        return new NoteResource($note);
    }

    public function store()
    {
        request()->validate([
            'subject' => 'required',
            'title' => 'required|unique:notes,title',
            'description' => 'required'
        ]);

        $note = Note::create([
            'subject_id' => request('subject'),
            'title' => request('title'),
            'slug' => \Str::slug(request('title')),
            'description' => request('description')
        ]);

        return response()->json([
            'message' => 'Your note was created',
            'notes' => $note,
        ]);
    }
}
