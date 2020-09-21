<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\DB;

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

    public function card_test()
    {
        return view('tags.card_test');
    }

    public function search()
    {
        $tags = DB::table('tags')
        ->select('id', 'name')
        ->get();

        dd($tags);
        return view('tags.index');

    }
}
