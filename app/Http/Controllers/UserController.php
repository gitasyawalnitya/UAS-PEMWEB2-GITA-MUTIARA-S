<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                'level'=>'required'
            ]
        );

        $validate['password'] = Hash::make($validate['password']);

        $user = new User;
        $user->create($validate);
        return redirect(route('users'))->with('success', 'Create new user is success.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email,' . $id,
                'password'=>'nullable|min:6',
                'level'=>'required'
            ]
        );

        $user = User::find($id);

        $validate['password'] = empty($validate['password'])
            ? $user->password : Hash::make($validate['password']);

        $user->update($validate);
        return redirect(route('users'))->with('success', 'Update user is success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('users'))->with('success', 'Delete user is success.');
    }
}
