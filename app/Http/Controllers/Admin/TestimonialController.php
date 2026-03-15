<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index() { return view('admin.testimonials.index', ['testimonials' => Testimonial::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.testimonials.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255','position'=>'nullable|string','company'=>'nullable|string','country'=>'nullable|string','message'=>'required|string','rating'=>'integer|min:1|max:5','avatar'=>'nullable|image|max:1024','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        if ($request->hasFile('avatar')) { $data['avatar'] = $request->file('avatar')->store('testimonials', 'public'); }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created!');
    }
    public function edit(Testimonial $testimonial) { return view('admin.testimonials.edit', compact('testimonial')); }
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate(['name'=>'required|string|max:255','position'=>'nullable|string','company'=>'nullable|string','country'=>'nullable|string','message'=>'required|string','rating'=>'integer|min:1|max:5','avatar'=>'nullable|image|max:1024','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) { Storage::disk('public')->delete($testimonial->avatar); }
            $data['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
    }
    public function destroy(Testimonial $testimonial) { $testimonial->delete(); return back()->with('success', 'Deleted!'); }
}
