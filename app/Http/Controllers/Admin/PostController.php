<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\SlugCreater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use SlugCreater;

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::with(['category:id,name', 'user:id,name', 'tags:id,name'])->latest()->paginate(15);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $post_data = $request->safe()->except('image');

        if ($request->hasFile('image')) {
            $get_file = $request->file('image')->store('uploads', 'public');
            $post_data['image'] = $get_file;
        }

        $post = Post::create($post_data);
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return to_route('admin.post.index')->with('message', trans('admin.post_created'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post_data = $request->safe()->except('image');

        if ($request->hasFile('image')) {
            $get_file = $request->file('image')->store('uploads', 'public');
            $post_data['image'] = $get_file;
        }

        $post->update($post_data);
        $post->tags()->sync($request->tags);

        return to_route('admin.post.index')->with('message', trans('admin.post_updated'));
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return back()->with('message', trans('admin.post_deleted'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->createSlug($request, Post::class);
        return response()->json(['slug' => $slug]);
    }

    public function search(Request $request)
    {
        $searched_text = $request->input('search');
        $posts = Post::query()->with(['category', 'user', 'tags'])
            ->where('title', 'LIKE', "%{$searched_text}%")
            ->orWhere('content', 'LIKE', "%{$searched_text}%")
            ->paginate(10);
        return view('admin.post.search', compact('posts'));
    }

    public function uploadImage(Request $request)
    {
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/posts'), $imageName);

        return response()->json(['url' => asset('uploads/posts/' . $imageName)]);
    }

    return response()->json(['error' => 'No image uploaded'], 400);
    }
}
