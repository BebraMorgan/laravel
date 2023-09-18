<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UpdateRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class UpdateController extends Controller
{
    public function __invoke(Image $image, UpdateRequest $request)
    {
        $manager = new ImageManager(['driver' => 'gd']);
        $request->validated();
        $img = $manager->make($request->image);
        $size = min($img->width(), $img->height());
        $img->fit($size, $size);
        $img->encode('png');
        $newImageName = time() . '-' . 'user' . '.' . $request->image->extension();
        $img->save(public_path(Auth::user()->phone . '-m2.wsr.ru/photos/') . $newImageName);

        $data = $request->validated();
        $data['image'] = $newImageName;
        $image->update($data);
        $user = Auth::user();
        return redirect()->route('userpage', compact('user'));
    }
}
