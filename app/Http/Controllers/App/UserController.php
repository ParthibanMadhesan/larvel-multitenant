<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::with('roles')->get();
        // dd($tenants->toArray());
        return view('app.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
    $validatedData=$request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255|unique:users,email',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
    
   User::create( $validatedData);

   
            return redirect()->route('users.index');  
    }
    // public function edit($id)
    // {
    //     // Retrieve the user by ID
    //     $user = User::findOrFail($id);

    //     // Return the edit view with the user data
    //     return view('app.profile.edit', compact('user'));
    // }


    public function edit(User $user)
    {User::with('roles')->get();
        $roles=Role::get();
        // dd($tenants->toArray());
        return view('app.users.edit',['user'=>$user,'roles'=>$roles]);
    }
  
 public function update(Request $request,User $user)
{

    $validatedDat=$request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255|unique:users,email,'.$user->id,
        'roles'=>'required|array',
    ]);
    
  

     $user->update($validatedDat);

     $user->roles()->sync($request->input('roles'));
     
            return redirect()->route('users.index');  
  
}
}