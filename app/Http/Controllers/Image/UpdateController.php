<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UpdateRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(Image $image, UpdateRequest $request)
    {
        $data = $request->validated();
        $newImageName = time() . '-' . 'user' . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $data['image'] = $newImageName;
        $image->update($data);
        $user = Auth::user();
        return redirect()->route('userpage', compact('user'));
    }
}
