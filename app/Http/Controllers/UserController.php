<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   
    public function index()
    {
        // $users = User::all();
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

   
    public function create()
    {
        return view('users.create');
    }
 
  
    public function store(Request $request)
    {
       $data= $request->validate([
        'name' =>[ 'required','string','min:2','max:100'],
        'email' => ['required','email','unique:users,email'],
        'password' => ['required','string','min:8','max:100'],
        'password_confirmation' => ['required','same:password'],
        'type' => ['required','in:admin,writer'],
       ]);
    //    best practice
       User::create($data);
       return redirect()->route('users.index')->with('success','User created successfully');
    }

 
    public function show(string $id)
    {
        //
    }
    


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);



        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'max:100'],
            'password_confirmation' => ['nullable', 'same:password'],
            'type' => ['required', 'in:admin,writer'],
        ]);

        if (!$data['password']) {
            unset($data['password']);
            unset($data['password_confirmation']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return back()->with('success','User  deleted successfully');
    }

    public function posts(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.posts', compact('user'));
    }
}
