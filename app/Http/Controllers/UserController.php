<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();
        return view('user.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repository = $this->repository;
        return view('user.crud',compact('repository'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $request->merge(['password'=>Hash::make($request->password)]);
        $model = User::create($request->all())->roles()->sync($request->role_id,false);;
        return redirect()->route("users.index")->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        $row = User::findOrFail($user);
        $repository = $this->repository;
        return view("user.crud",compact('row','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        $md = User::findOrFail($user);
        $md->update($request->all());
        $md->roles()->sync($request->role_id,true);
        return redirect()->route("users.index")->with('success','Data Saved');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
        $md = User::findOrFail($user);
        $md->delete();
        return redirect()->route("users.index")->with('success','Data Deleted');
    }
    public function install(Request $request)
    {








    }






}
