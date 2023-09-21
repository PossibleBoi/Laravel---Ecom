<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Team;

use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function vendors()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();

        $teams = Team::all();

        return view('vendor.vendors', compact('users', 'teams'));
    }

    public function vendor_edit(User $user)
    {
        $roles = Role::all();
        $team = Team::all();

        return view('vendor.edit', compact('user', 'roles', 'team'));
    }

    public function vendor_update(Request $request, User $user)
    {
        $data = $request->validate([
            'email' => ['required'],
            'team_id' => ['required'],
            'role_id' => ['required'],
        ]);

        $user->roles()->sync($data['role_id']);
        $user->roles()->updateExistingPivot($data['role_id'], ['team_id' => $data['team_id']]);

        $user->update($data);

        return redirect()->route('admin.vendors');
    }

    public function vendor_add()
    {
        return view('vendor.add');
    }

    public function create_team(Request $request)
    {
        $data = $request->validate([
            'display_name' => ['required'],
            'description' => ['required'],
        ]);

        $new_team = Team::create([
            'display_name' => $data['display_name'],
            'description' => $data['description'],
        ]);

        return redirect()->route('admin.vendors');
    }


    public function team_edit(Request $request)
    {
        $team = Team::find($request->team);
        return view('vendor.team_edit', compact('team'));
    }

    public function team_update(Request $request)
    {
        $team = Team::find($request->team);

        $data = $request->validate([
            'display_name' => ['required'],
            'description' => ['required'],
        ]);

        $team->update($data);

        return redirect()->route('admin.vendors');
    }

    public function team_delete(Request $req)
    {
        $team = Team::find($req->team);

        // Update user roles' team_id to 3
        $users = User::whereHas('roles', function ($query) use ($team) {
            $query->where('name', 'vendor')->where('team_id', $team->id);
        })->get();

        foreach ($users as $user) {
            $user->roles()->updateExistingPivot($user->roles->first()->id, ['team_id' => 3]);
        }

        // Now, delete the team
        $team->delete();

        return redirect()->route('admin.vendors');
    }
}
