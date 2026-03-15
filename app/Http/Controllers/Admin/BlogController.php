<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index() { return view('admin.blogs.index', ['blogs' => Blog::latest()->get()]); }
    public function create() { return view('admin.blogs.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['title'=>'required|string|max:255','excerpt'=>'required|string','content'=>'required|string','image'=>'nullable|image|max:2048','category'=>'nullable|string','tags'=>'nullable|string','meta_title'=>'nullable|string','meta_description'=>'nullable|string','published_at'=>'nullable|date']);
        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('image')) { $data['image'] = $request->file('image')->store('blogs', 'public'); }
        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created!');
    }
    public function edit(Blog $blog) { return view('admin.blogs.edit', compact('blog')); }
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate(['title'=>'required|string|max:255','excerpt'=>'required|string','content'=>'required|string','image'=>'nullable|image|max:2048','category'=>'nullable|string','tags'=>'nullable|string','meta_title'=>'nullable|string','meta_description'=>'nullable|string','published_at'=>'nullable|date']);
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('image')) {
            if ($blog->image) { Storage::disk('public')->delete($blog->image); }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated!');
    }
    public function destroy(Blog $blog) { if ($blog->image) { Storage::disk('public')->delete($blog->image); } $blog->delete(); return back()->with('success', 'Blog deleted!'); }
}
