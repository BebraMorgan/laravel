<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;

class DestroyController extends Controller
{
    public function __invoke(Image $image)
    {
        $image->delete();
        return redirect()->route('userpage', $image->user->id);
    }
}
