<?php

namespace App\Http\Controllers\Dashboad;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use ReflectionClass;

class SettingController extends Controller
{
    //
    public function update (Request $request, Setting $settings)
    {
//        $methods = (new ReflectionClass('App\Models\Setting'))->getMethods();
//        dd($methods);

        $rules = [
            'logo' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
            'favicon' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ];

        foreach (config('app.languages') as $key => $value) {
            $rules[$key.'*.title'] = 'nullable|string';
            $rules[$key.'*.desc'] = 'nullable|string';
            $rules[$key.'*.address'] = 'nullable|string';
        }

        $validated = $request->validate($rules);

        $settings->update($validated);

        if($request->file('logo')) {
            $fileName = time() . '_logo_' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads/logo', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            $settings->update(['logo' => $logo]);
        }

        if($request->file('favicon')) {
            $fileName = time() . '_favicon_' . $request->file('favicon')->getClientOriginalName();
            $filePath = $request->file('favicon')->storeAs('uploads/favicon', $fileName, 'public');
            $favicon = '/storage/' . $filePath;
            $settings->update(['favicon' => $favicon]);
        }

        return redirect()->route('dashboard.settings');
    }
}
