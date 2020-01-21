<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $fake = Storage::disk("images");
        $fake->put('photo1.jpg', "content");
        $fake->put('photo2.jpg', "content");
    }
}
