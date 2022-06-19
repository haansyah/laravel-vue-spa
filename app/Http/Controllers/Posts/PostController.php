<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\{Note, Subject};
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
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

    public function index(){
        return "Hallo Guys";
    }
}