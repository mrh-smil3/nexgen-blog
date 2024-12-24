<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $roles  = Roles::all();
        $users = User::with('roles')->select('id', 'full_name', 'email', 'role_id')->latest()->paginate(20);
        return view('dashboard.admin.user.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function editRoles(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->back()->with('success', 'User Role Updated');
    }
}
