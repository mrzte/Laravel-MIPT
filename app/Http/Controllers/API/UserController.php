<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Gate;
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
        
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request, [
            'name' => 'required|string|max:200|unique:users',
            'email' => 'required|email|max:200|unique:users',
            'password' => 'required|string|max:200|min:8|unique:users',
            
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'no_hp' => $request['no_hp'],
            'kota' => $request['kota'],
            'photo' => $request['photo'],
            'provinsi' => $request['provinsi'],
            'type' => $request['type'],
            'password' => Hash::make($request['password']), 
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['message' => 'User Berhasil Dihapus'];
    }
}
