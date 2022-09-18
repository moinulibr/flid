<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Traits\Backend\FileUpload\FileUploadTrait;
class UserProfileController extends Controller
{
        use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::find(Auth::guard('web')->user()->id);
        return view('backend.users.profile',$data);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->password)
        {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }
        $user->name     = $request->name;
        $user->phone    = $request->phone;
        $user->designation  = $request->designation;
        $user->office_address   = $request->office_address;
        if($request->password && $request->password_confirmation)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if(isset($request->photo))
        {
            $this->destination  = 'user';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->dbImageField = $user->photo;  //its mandatory
            $user->photo = $this->updateImage();
            $user->save();
        }
        return back()->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect()->back();
    }
}
