<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function manageUserDetails($id){
        $roles = Role::all();
        $permissions = $roles->flatMap->permissions;
        $user = User::findOrFail($id);


        // dd($permissions);
        session(['pwChangeEnabled'=>'disabled']);

        return view('admin.processUserDetail')->with(compact('user','roles','permissions'));
    }

    public function storeUserDetails(Request $request, $id) {
         $pwChangeEnabled = $request->session()->get('pwChangeEnabled');

        //  dd(session()->has('pwChangeEnabled'));

         $user = User::find($id);

         if($user->name !== $request->login_user_name){   //no change is done
                $request->validate([
                    'login_user_namme' => 'required|string|unique:users'
                ]);
         }


         if($request->enable_password_change){
             $pwChangeEnabled = 'enabled';

             $request->session()->put('pwChangeEnabled',$pwChangeEnabled);

             dd(session()->get('pwChangeEnabled'));

             $request->validate([
                  'user_password' => 'required|min:8|confirmed'
             ]);
         }


        // Detach the

        //  dd($request->all());

        //  if($userValid && $passwordsValid){

        //  } else {

        //  }

        // dd($pwChangeEnabled);


        return redirect()->back()->withErrors($request->all());

    }

    public function getPermissionProfiles($id) {
          $role = Role::find($id);

          $permissions = $role->permissions;

          return response(json_encode($permissions),200);
    }
}
