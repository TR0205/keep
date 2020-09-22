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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('tags');
        if($search !==null)
        {
            $search_split = mb_convert_kana($search, 's');
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value)
            {
                $query->where('name', 'like', '%'.$value.'%');
            }
        };

        $query->select('id', 'name');
        $query->orderBy('created_at', 'asc');
        $tags = $query->paginate(20);

        //dd($tags);

        return view('tags.index', compact('tags'));


        //$tags = Tag::all()->sortByDesc('created_at');
        //return view('tags.index',['tags' => $tags]);
    }

    public function card_test()
    {
        return view('tags.card_test');
    }

}
