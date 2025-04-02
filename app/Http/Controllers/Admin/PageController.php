<?php

namespace App\Http\Controllers\Admin;

use App\Traits\SlugCreater;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use SlugCreater;

    public function index()
    {
        $pages = Page::with('user:id,name')->orderBy('id', 'desc')->paginate(15);

        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {

        return view('admin.page.create');
    }

    public function store(PageRequest $request)
    {
        Page::create($request->validated());

        return to_route('admin.page.index')->with('message', trans('admin.page_created'));
    }

    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());

        return to_route('admin.page.index')->with('message', trans('admin.page_updated'));
    }

    public function edit(Page $page)
    {

        return view('admin.page.edit', compact('page'));
    }

    public function uploadImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension();
    $image->move(public_path('uploads/pages'), $imageName);

    return response()->json(['url' => asset('uploads/pages/' . $imageName)]);
}

    public function destroy(Page $page)
    {
        $page->delete();

        return back()->with('message', trans('admin.page_deleted'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->createSlug($request, Page::class);

        return response()->json(['slug' => $slug]);
    }
}
