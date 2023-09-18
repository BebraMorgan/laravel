<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\IndexRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->search) {
            $images = Image::join('users', 'user_id', '=', 'users.id')->where('title', 'LIKE', "%{$request->search}%")->orWhere('hashtags', 'LIKE', "%{$request->search}%")->paginate(6);
        } else {
            $images = Image::paginate(6);
        }
        return view('image.index', compact('images'));
    }
}
