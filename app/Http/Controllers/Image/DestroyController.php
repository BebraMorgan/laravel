<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke(Image $image)
    {
        $image->delete();
        return redirect()->route('userpage', Auth::user()->id);
    }
}
