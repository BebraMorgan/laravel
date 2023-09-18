<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
   public function __invoke(User $user){
       $images = Image::all();
       return view('userpage', compact('images', 'user'));
   }
}
