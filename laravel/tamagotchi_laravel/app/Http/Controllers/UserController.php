<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\userResource;
use App\Models\User;
use App\Http\Requests\userRequest;
use App\Http\Requests\bejelentkezesRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(bejelentkezesRequest $request)
    {
        $data = $request->validated();
        if(Auth::attempt($data)){
            if($request->wantsJson()){
                return response()->json(["data"=>new userResource(Auth::user())],200);
            }
        }
        else{
            if ($request->wantsJson()){
                return  response()->json(["data"=>["message"=>"Sikertelen belépés"]],401);
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return userResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        $newuser = new User();
        $newuser->username = $request->validated()['username'];
        $newuser->password = Hash::make($request->validated()['password']);
        $newuser->save();
        return new userResource($newuser);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return new userResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, $id)
    {
        $data = User::findOrFail($id);
        $data->username = $request->validated()['username'];
        $data->password = Hash::make($request->validated()['password']);
        $data->save();
        return new userResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id)->delete();
    }
}