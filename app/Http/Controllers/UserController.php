<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
    }

    public function login() {
        return view('login');
    }

    public function doLogin(Request $request) {
        $username = $request->username ?? '';
        $password = $request->password ?? '';

        if ($username == '' || $password == '') return redirect('/login');

        $user = DB::table('users')
                    ->where('username', $username)
                    ->where('password', $password)
                    ->first();

        if ($user == null) return redirect('/login');

        $request->session()->put('user_id', $user->user_id);
        $request->session()->put('name', $user->name);
        $request->session()->put('role', $user->role);

        return redirect('/');
    }

    public function register() {
        return view('register');
    }

    public function doRegister(Request $request) {
        $username = $request->username ?? '';
        $password = $request->password ?? '';
        $confirm = $request->confirm ?? '';
        $name = $request->name ?? '';
        $phone = $request->phone ?? '';
        $role = 'user';

        if ($username == '' || $password == '' || $name == '' || $phone == '' || $password != $confirm)
            return redirect('/register');

        $user_id = DB::table('users')
                        ->insertGetId([
                            'username'  => $username,
                            'password'  => $password,
                            'name'      => $name,
                            'phone'     => $phone,
                            'role'      => $role,
                        ]);

        return redirect('/login');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
