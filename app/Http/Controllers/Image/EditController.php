<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Image $image)
    {
        if ($image->user->id != Auth::user()->id) {
            return redirect()->route('image.index');
        } else {
            return view('image.edit', compact('image'));
        }
    }
}
