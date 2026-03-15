<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() { return view('admin.services.index', ['services' => Service::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.services.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['title'=>'required|string|max:255','description'=>'required|string','icon'=>'nullable|string','color'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created!');
    }
    public function edit(Service $service) { return view('admin.services.edit', compact('service')); }
    public function update(Request $request, Service $service)
    {
        $data = $request->validate(['title'=>'required|string|max:255','description'=>'required|string','icon'=>'nullable|string','color'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated!');
    }
    public function destroy(Service $service) { $service->delete(); return back()->with('success', 'Service deleted!'); }
}
