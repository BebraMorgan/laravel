<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $manager = new ImageManager(['driver' => 'gd']);
        $request->validated();
        $image = $manager->make($request->image);
        $size = min($image->width(), $image->height());
        $image->fit($size, $size);
        $image->encode('png');
        $newImageName = time() . '-' . 'user' . '.' . $request->image->extension();
        $image->save(public_path(Auth::user()->phone . '-m2.wsr.ru/photos/') . $newImageName);


        $data = $request->validated();
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;
        Image::create($data);
        return redirect()->route('image.index');
    }
}
