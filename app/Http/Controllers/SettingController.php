<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::findOrFail(1);

        return view('admin.settings.index', get_defined_vars());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $validatedData = $request->validated();

        $setting->update($validatedData);

        return to_route('admin.settings.index')->with('success', __('keywords.updated_successfully'));
    }
}
