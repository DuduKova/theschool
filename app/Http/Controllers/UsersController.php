<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::usersList();

        session(['users' => $users]);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $this->imageValidate($request);

        //create user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->img = $this->imageValidate($request);
        $user->save();

        session()->forget('users');

        session()->flash('message', 'User Saved!');

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:40|unique:users,id,' . $id,
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:7',
            'phone' => 'required|string|max:20',
            'img' => 'max:1999'
        ]);

        //create User
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');

        if($request->input('role') == 'Owner' && Auth::user()->role != 'Owner'){
            return Redirect::back()->withErrors(['There can be only one Owner!']);
        }

        if ($request->hasFile('img')) {
            if ($user->img != 'default.png') {
                //delete img
                Storage::delete('public/uploads/' . $user->img);

            }
            $user->img = $this->imageValidate($request);
        }
        $user->save();

        session()->forget('users');

        session()->flash('message', 'User Updated!');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if($id == Auth::user()->id){
            return Redirect::back()->withErrors(['You cannot delete yourself']);
        }
        if ($id === 1) {
            return Redirect::back()->withErrors(['You cannot delete the Owner']);
        }

        $user = User::find($id);

        if ($user->img != 'default.png') {
            //delete img
            Storage::delete('public/uploads/' . $user->img);
        }
        $user->delete();

        session()->forget('users');

        session()->flash('message', 'User Deleted!');

        return redirect('/users');
    }
}