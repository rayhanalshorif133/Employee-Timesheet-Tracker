<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.index', compact('users', 'roles'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $roles = Role::all();
            return view('user.edit', compact('user', 'roles'));
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function create(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email  =  $request->email;
            $user->password  =  Hash::make($request->password);
            $user->save();
            $user->assignRole($request->role);
            flash()->addSuccess('User created successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addSuccess('User not created successfully');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email  =  $request->email;
            $user->password  =  Hash::make($request->password);
            $user->save();
            $user->syncRoles($request->role);
            flash()->addSuccess('User updated successfully');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            flash()->addSuccess('User not updated successfully');
            return redirect()->route('user.index');

        }
    }


    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            flash()->addSuccess('User has been deleted successfully');
            return $this->respondWithSuccess('User has been deleted successfully');
        } catch (\Throwable $th) {
            return $this->respondWithError('User has been deleted successfully');
        }
    }
}
