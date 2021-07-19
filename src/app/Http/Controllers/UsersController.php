<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    public function show()
    {
        //マイページ画面
        return view('user.show');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);
        return view('user.edit', ['user' => Auth::user()]);
    }
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return redirect()->route('user.show');
    }
}
