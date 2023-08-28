<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return view('user.edit', compact('user'));
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // get user role
            $role = $user->getRoleNames()->first();
            if ($role && $role == 'admin') {
                $this->validate($request, [
                    'username' => 'required|min:3|max:50',
                    'email' => 'email|required|unique:users,email,' . $id . '|max:50',
                ]);
            } else {
                $this->validate($request, [
                    'phone' => 'required|unique:users,phone,' . $id . '|max:13',
                ]);
            }

            $user->username = $request->username;
            $user->full_name = $request->full_name;
            $user->email  =  $request->email;
            $user->password  =  Hash::make($request->password);
            $user->nationality  =   $request->nationality;
            $user->phone  =  $request->phone;
            $user->issuing_country  =  $request->issuing_country;
            $user->document_type  =  $request->document_type;
            $user->verification_status  =  $request->verification_status;
            $user->date_of_birth  =  $request->date_of_birth;
            $user->id_expiry_date  =  $request->id_expiry_date;

            if ($request->hasFile('image')) {

                // remove previous image
                if ($user->image) {
                    $image_path = public_path($user->image);
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }

                $image = $request->file('image');
                $image_name = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/images/user'), $image_name);
                $user->image = '/images/user/' . $image_name;
            }
            $user->save();
            Session::flash('message', 'User successfully updated');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('message', $th->getMessage());
            Session::flash('type', 'error');
            return redirect()->back();

        }
    }


    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return $this->respondWithSuccess('User has been deleted successfully');
        } catch (\Throwable $th) {
            return $this->respondWithError('User has not been deleted successfully');
        }
    }
}
