<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index() { $settings = SiteSetting::pluck('value', 'key'); return view('admin.settings.index', compact('settings')); }
    public function update(Request $request)
    {
        $request->validate([
            'profile_photo' => ['nullable', 'file', 'mimes:jpg,jpeg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = 'profile_' . time() . '.' . $file->getClientOriginalExtension();
            // Delete old file if it exists
            $old = SiteSetting::get('profile_photo_path');
            if ($old && Storage::exists($old)) {
                Storage::delete($old);
            }
            $path = $file->storeAs('public/profile', $filename);
            SiteSetting::set('profile_photo_path', $path);
            SiteSetting::set('profile_photo_url', Storage::url($path));
        }

        foreach ($request->except(['_token', '_method', 'profile_photo']) as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return back()->with('success', 'Settings saved!');
    }
}
