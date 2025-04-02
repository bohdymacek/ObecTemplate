<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('front.gallery.index', compact('galleries'));
    }
}