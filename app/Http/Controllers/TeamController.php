<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(config('pagination.count'));

        return view('admin.teams.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $validatedData = $request->validated();

        $newImageName = storeImage($request, 'teams');

        $validatedData['image'] = $newImageName;

        Team::create($validatedData);

        return to_route('admin.teams.index')->with('success', __('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $validatedData = $request->validated();


        // Update the image if a new image is uploaded
        $newImageName = updateImage($request, 'teams', $team);

        // If there is a new image name, update the validated data array
        if ($newImageName) {
            $validatedData['image'] = $newImageName;
        }

        $team->update($validatedData);

        return to_route('admin.teams.index')->with('success', __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return to_route('admin.teams.index')->with('success', __('keywords.deleted_successfully'));
    }
}
