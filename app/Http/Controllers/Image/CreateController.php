<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;

class CreateController extends Controller
{
    public function __invoke(){
        return view('image.create');
    }
}
