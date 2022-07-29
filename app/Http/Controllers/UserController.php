<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function getUsers()
    {
        $user = User::all();
        if($user->count() == 0) {
            return response()->json([
                'error' => 'No user found'
            ]);
        }
        return response()->json([
            'success' => $user
        ]);
    }
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', "unique:users,email"],
            'password' => ['required', 'string', 'confirmed', 'min:5']
        ]);

        if($validation->fails()) {
            return response()->json([
                'error' => Arr::join(Arr::flatten($validation->errors()->all()), ', ')
            ]);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        return response()->json([
            'success' => $user
        ]);
    }
    public function getUser($id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                'error' => 'Invalid User ID'
            ]);
        }
        return response()->json([
            'success' => $user
        ]);
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', "unique:users,email,$id"]
        ]);
        if($validation->fails()) {
            return response()->json([
                'error' => Arr::join(Arr::flatten($validation->errors()->all()), ', ')
            ]);
        }
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                'error' => 'Invalid User ID'
            ]);
        }
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        return response()->json([
            'success' => $user
        ]);
    }
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        if($validation->fails()) {
            return response()->json([
                'error' => Arr::join(Arr::flatten($validation->errors()->all()), ', ')
            ]);
        }
        $user = User::where('email', $request->input('email'))->first();
        if(!$user) {
            return response()->json([
                'error' => 'Email does not exist.'
            ]);
        } else {
            if($user->password === $request->input('password')) {
                $request->session()->regenerate();
                return response()->json([
                    'success' => $request->session()->getId()
                ]);
            } else {
                return response()->json([
                    'error' => 'Invalid password.'
                ]);
            }
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                'error' => 'Invalid User ID'
            ]);
        }
        $user->delete();
        return response()->json([
            'success' => 'User deleted.'
        ]);
    }
}
