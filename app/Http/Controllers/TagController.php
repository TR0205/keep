<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;
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

        $tags = DB::table('tags')
        ->join('article_tag', 'tags.id', '=', 'article_tag.tag_id')
        ->join('articles', 'article_tag.article_id', '=', 'articles.id')
        ->select('tags.id', 'tags.name')
        ->when($search, function ($query, $search) {
            $search_split = mb_convert_kana($search, 's');
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
            return $query->where(function ($query) use ($search_split2) {
                foreach ($search_split2 as $value) {
                    $query->where('name', 'like', '%' . $value . '%');
                }
            });
        })
        ->groupBy('tags.id')
        ->orderBy('tags.id', 'asc')
        ->get();

        // if($search === null)
        // {
        //     $tags = DB::table('tags')
        //     ->join('article_tag', 'tags.id', '=', 'article_tag.tag_id')
        //     ->join('articles', 'article_tag.article_id', '=', 'articles.id')
        //     ->select('tags.id', 'tags.name')
        //     ->groupBy('tags.id')
        //     ->orderBy('tags.id', 'asc')
        //     ->get();
        // };

        // if($search !== null)
        // {
        //     $search_split = mb_convert_kana($search, 's');
        //     $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

        //     foreach($search_split2 as $value)
        //     {
        //         $tags = DB::table('tags')
        //         ->join('article_tag', 'tags.id', '=', 'article_tag.tag_id')
        //         ->join('articles', 'article_tag.article_id', '=', 'articles.id')
        //         ->select('tags.id', 'tags.name')
        //         ->groupBy('tags.id')
        //         ->orderBy('tags.id', 'asc')
        //         ->where('name', 'like', '%'.$value.'%')
        //         ->get();
        //     }
        // };

        return view('tags.index', compact('tags'));
    }

    public function card_test()
    {
        return view('tags.card_test');
    }

}
