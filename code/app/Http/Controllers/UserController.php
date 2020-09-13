<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;


use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        // $user = User::where('id', $user_id)->first();
        $user = User::where('name', $name)->first();


        return view('users.show', [
            'user' => $user
        ]);
    }

    // public function show(User $user)
    // {
    //     dd($user);

    //     return view('users.show', ['user' => $user]);
    // }

    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->all());
        // dd($user);
        // $user = User::find($user->id);

        // $user->name = $request->user_name;


        // $user->fill($request->all());
        // $user = User::find($user_id);
        // Tag::where('name', $name)->first();




        if ($request->hasFile('profile_photo')) {
            $request->file('profile_photo')->store('/public/images');
            $user->profile_photo =  $request->file('profile_photo')->hashName();
        }





        $user->save();

        return redirect()->route('users.show', [ 'name' => $user->name])->with('flash_message', 'ユーザー情報を変更しました');
    }

    // public function update(UserRequest $request, User $user)
    // {
    //     var_dump($user);


    //     $user->fill($request->all());

    //     if ($request->hasFile('imgpath')) {
    //         $request->file('profile_photo')->store('/public/images');
    //         $user->profile_photo =  $request->file('profile_photo')->hashName();
    //     }

    //     $user->save();

    //     return redirect()->route('users.show')->with('flash_message', 'ユーザー情報を変更しました');

    // }
}