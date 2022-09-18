<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['userRoles'] = UserRole::get();
        return view('backend.users.user_role',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        return redirect()->back();
    }
}
