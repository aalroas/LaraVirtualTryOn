<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([$request->all()]);
        $user = User::find($id);
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->is_admin =  $request->is_admin;
        $user->save();
     return redirect(route('backend.users.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // return dd($product);
        $user->delete();
       return redirect(route('backend.users.index'));
    }

}
