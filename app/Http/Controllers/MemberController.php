<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(config('pagination.count'));
        return view('admin.members.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validatedData = $request->validated();

        // image uploading
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3-move image to my projet
        $image->storeAs('members', $newImageName, 'public');
        // 4- save new name to database record
        $validatedData['image'] = $newImageName;

        Member::create($validatedData);

        return to_route('admin.members.index')->with('success', __('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.members.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $validatedData = $request->validated();

        // chekc photo is found or not  => if has image uploading... or isn't imgage updated

        if ($request->hasFile('image')) :
            // image uploading
            // 1- delete old image
            Storage::delete("public/members/$member->image");
            // 2- get imgage
            $image = $request->image;
            // 3- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 4- move image to my project
            $image->storeAs('members', $newImageName, 'public');
            // 5- save new name to database record
            $validatedData['image'] = $newImageName;
        endif;

        $member->update($validatedData);

        return to_route('admin.members.index')->with('success', __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {

        Storage::delete("public/testmonials/$member->image");

        $member->delete();

        return to_route('admin.members.index')->with('success', __('keywords.deleted_successfully'));
    }
}
