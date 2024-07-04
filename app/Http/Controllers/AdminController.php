<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function editUser($id) {
        $user = User::findOrFail($id); //find users by id
        $roles = Role::all(); //retrieve all roles
        // $permissions = Permission::all();

        return view('admin.editUser', compact('user', 'roles'));
    }

    public function editUser1($id){
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.editUser', compact('user', 'roles'));
    }

    public function removeUser($id) {
        $user = User::findOrFail($id); //find user by id
        $user->delete(); //delete user

        return redirect()->route('usertool')->with('success', 'User removed successfully'); //redirects to the user management page
    }

    // public function updateUser(Request $request, $id) {
    // $user = User::findOrFail($id);

    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|email|max:255',
    //     'roles' => 'required|array', //roles are set as array
    // ]);

    // $user->update([
    //     'name' => $request->name,
    //     'email' => $request->email,
    // ]);

    // // Sync roles
    // $user->roles()->sync($request->roles);

    // return redirect()->route('usertool')->with('success', 'User updated successfully');
    // }

    public function updateUser(Request $request, $id)
    {
        //validate request data 
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'roles' => 'required|array',
        ]);

        // update user details
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // update user info details
        $userInfo = UserInfo::where('user_id', $id)->first(); //
        if (!$userInfo) {
            $userInfo = new UserInfo();
            $userInfo->user_id = $id;
        }
        //update's the first and lastname then save
        $userInfo->user_firstname = $request->firstname;
        $userInfo->user_lastname = $request->lastname;
        $userInfo->save();

        //sync user roles based on request
        $user->roles()->sync($request->roles);

        return redirect()->route('usertool')->with('success', 'User updated successfully.');
    }

}
