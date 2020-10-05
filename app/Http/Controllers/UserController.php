<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags']);

        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['likes.user', 'likes.likes', 'likes.tags']);

        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followers.followers');

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();
        // dd($user);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $name)
    {
        $user = User::where('name', $name)->first();

        if ($request->has('image'))
        {
            $file = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $request->file('image')->getClientOriginalName();
            $resize_img = Image::make($file)->resize(50, 50)->encode($extension);
            $path = Storage::disk('s3')->put('/keepbacket/'.$filename,(string)$resize_img, 'public');
            $user->image_path = Storage::disk('s3')->url('keepbacket/'.$filename);
        }

        $user->fill($request->all())->save();
        // dd($user);
        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}
