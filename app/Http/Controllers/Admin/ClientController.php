<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() { return view('admin.clients.index', ['clients' => Client::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.clients.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255','country'=>'required|string|max:100','flag_emoji'=>'nullable|string','website'=>'nullable|url','description'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        Client::create($data);
        return redirect()->route('admin.clients.index')->with('success', 'Client created!');
    }
    public function edit(Client $client) { return view('admin.clients.edit', compact('client')); }
    public function update(Request $request, Client $client)
    {
        $data = $request->validate(['name'=>'required|string|max:255','country'=>'required|string|max:100','flag_emoji'=>'nullable|string','website'=>'nullable|url','description'=>'nullable|string','sort_order'=>'integer']);
        $data['is_active'] = $request->boolean('is_active', true);
        $client->update($data);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated!');
    }
    public function destroy(Client $client) { $client->delete(); return back()->with('success', 'Client deleted!'); }
}
