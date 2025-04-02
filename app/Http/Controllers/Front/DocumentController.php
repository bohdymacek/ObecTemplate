<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('front.documents.index', compact('documents'));
    }
}