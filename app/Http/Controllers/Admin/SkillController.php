<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index() { return view('admin.skills.index', ['skills' => Skill::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.skills.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255','percentage'=>'required|integer|min:0|max:100','category'=>'nullable|string','icon'=>'nullable|string','color'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        Skill::create($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill created!');
    }
    public function edit(Skill $skill) { return view('admin.skills.edit', compact('skill')); }
    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate(['name'=>'required|string|max:255','percentage'=>'required|integer|min:0|max:100','category'=>'nullable|string','icon'=>'nullable|string','color'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        $skill->update($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated!');
    }
    public function destroy(Skill $skill) { $skill->delete(); return back()->with('success', 'Skill deleted!'); }
}
