<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Traits\Backend\FileUpload\FileUploadTrait;
class RegisterController extends Controller
{
     use FileUploadTrait;
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('backend-auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $request->input('phone'),
            'designation' => $request->input('designation'),
            'office_address' => $request->input('office_address'),
            'user_role_id' => 2 // author
        ]);

        if(isset($request->photo))
        {
            $this->destination  = 'user';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $user->photo = $this->storeImage();
            $user->save();
        }

        event(new Registered($user));

        // auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
