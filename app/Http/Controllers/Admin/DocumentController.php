<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        
        $filePath = $request->file('file') ? $request->file('file')->store('documents') : null;
        
        Document::create([
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $filePath
        ]);
        
        return redirect()->route('admin.documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return back();
    }
}
