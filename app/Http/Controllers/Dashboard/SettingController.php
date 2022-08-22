<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function config;
use function redirect;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    //
    public function update (Request $request, Setting $settings)
    {
//        $methods = (new ReflectionClass('App\Models\Setting'))->getMethods();
//        dd($methods);

        // dd($settings);

        $rules = [
            'logo' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
            'favicon' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'required|email',
        ];

        foreach (config('app.languages') as $key => $value) {
            $rules[$key.'*.title'] = 'nullable|string';
            $rules[$key.'*.desc'] = 'nullable|string';
            $rules[$key.'*.address'] = 'nullable|string';
        }

        $validated = $request->validate($rules);
        Log::info("Site Settings has been validated: " . __METHOD__ ." at ".__LINE__);

        $settings->update($validated);
        Log::info("Site Settings has been updated: " . __METHOD__ ." at ".__LINE__);

        if($request->file('logo')) {
            $fileName = time() . '_logo_' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads/logo', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            $settings->update(['logo' => $logo]);
            Log::info("Site logo has been updated: " . __METHOD__ ." at ".__LINE__);
        }

        if($request->file('favicon')) {
            $fileName = time() . '_favicon_' . $request->file('favicon')->getClientOriginalName();
            $filePath = $request->file('favicon')->storeAs('uploads/favicon', $fileName, 'public');
            $favicon = '/storage/' . $filePath;
            $settings->update(['favicon' => $favicon]);
            Log::info("Site favicon has been updated: " . __METHOD__ ." at ".__LINE__);
        }

        return redirect()->route('dashboard.settings');
    }
}
