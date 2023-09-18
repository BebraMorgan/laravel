<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\IndexRequest;
use App\Models\Image;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke( User $user)
    {
        $images = Image::paginate(6);
        return view('image.index', compact('images', 'user'));
    }
}
