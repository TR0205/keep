<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();

        return view('tags.show', ['tag' => $tag]);
    }

    public function index()
    {
        $tags = Tag::all()->sortByDesc('created_at');

        return view('tags.index',['tags' => $tags]);
    }
}
