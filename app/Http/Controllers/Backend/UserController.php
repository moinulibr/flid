<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Backend\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Traits\Backend\FileUpload\FileUploadTrait;

class UserController extends Controller
{
        use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uty = NULL)
    {
        $user_role_id = NULL;
        if(strtolower($uty) == 'administrator'){
            $user_role_id = 1;
        }
        else if(strtolower($uty) == 'author'){
            $user_role_id = 2;
        } 
       else if(strtolower($uty) == 'editor'){
            $user_role_id = 3;
        }
        $query = User::query();
        if($user_role_id)
        {
            $query->where('user_role_id',$user_role_id);
        }
        $data['users']          = $query->whereNull('deleted_at')->where('status',1)->latest()->get();
        $data['userCountables'] = User::whereNull('deleted_at')->where('status',1)->get();
        $data['utyUrl']         = $uty;
       return view('backend.users.index',$data);
    }

    public function inactiveIndex($uty = NULL)
    {
        $user_role_id = NULL;
        if(strtolower($uty) == 'administrator'){
            $user_role_id = 1;
        }
        else if(strtolower($uty) == 'author'){
            $user_role_id = 2;
        } 
       else if(strtolower($uty) == 'editor'){
            $user_role_id = 3;
        }
        $query = User::query();
        if($user_role_id)
        {
            $query->where('user_role_id',$user_role_id);
        }
        $data['users']          = $query->whereNull('deleted_at')->where('status',2)->latest()->get();
        $data['userCountables'] = User::whereNull('deleted_at')->where('status',2)->get();
        $data['utyUrl']         = $uty;
       return view('backend.users.inactive_index',$data);
    }

    public function pendingIndex($uty = NULL)
    {
        $user_role_id = NULL;
        if(strtolower($uty) == 'administrator'){
            $user_role_id = 1;
        }
        else if(strtolower($uty) == 'author'){
            $user_role_id = 2;
        } 
       else if(strtolower($uty) == 'editor'){
            $user_role_id = 3;
        }
        $query = User::query();
        if($user_role_id)
        {
            $query->where('user_role_id',$user_role_id);
        }
        $data['users']          = $query->whereNull('deleted_at')->where('status',0)->latest()->get();
        $data['userCountables'] = User::whereNull('deleted_at')->where('status',0)->get();
        $data['utyUrl']         = $uty;
       return view('backend.users.pending_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
        return view('backend.users.add_new',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->password)
        {
            $request->validate([
                'name'      => 'required|string|max:150',
                'phone'     => 'required|string|max:15|unique:users,phone',
                'email'     => 'required|email|unique:users,email',
                'user_role_id'     => 'required',
                'password'  => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }
        $user                           = new User();
        $user->email                    = $request->email;
        $user->name                     = $request->name;
        $user->phone                    = $request->phone;
        $user->user_role_id             = $request->user_role_id;
        $user->status                   = 0;
        $user->designation             = $request->designation;
        $user->office_address          = $request->office_address;
        $user->send_user_notification   = $request->send_user_notification ?? 0;
        $user->password = Hash::make($request->password);
        $user->save();

        if(isset($request->photo))
        {
            $this->destination  = 'user';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $user->photo = $this->storeImage();
            $user->save();
        }
        return redirect()->route('admin.user.index')->with('success','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
        $data['user'] = $user;
        return view('backend.users.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::guard('web')->user()->user_role_id == 2)
        {
            if($user->id == Auth::guard('web')->user()->id)
            {
                $data['userRoles'] = UserRole::where('id',2)->get();
                $data['user'] = $user;
                return view('backend.users.edit',$data);
            }else{
                return redirect()->back()->with('error','You are not permitted to access this');
            }
        }else{
            if(Auth::guard('web')->user()->user_role_id == 1)
            {
                if(Auth::guard('web')->user()->id == $user->id)
                {
                    $data['userRoles'] = UserRole::where('id',1)->get();
                }else{
                    $data['userRoles'] = UserRole::get();
                }
            }else{
                $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
            }
            
            //$data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
            $data['user'] = $user;
            return view('backend.users.edit',$data);
        }
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
        $request->validate([
            'name'      => 'required|string|max:150',
            'phone'     => 'required|string|max:15|unique:users,phone,'.$user->id,
            'user_role_id'     => 'required',
        ]);

        if($request->password)
        {
            $request->validate([
                //'email'     => 'required|email|unique:users,email',
                'password'  => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }
        //$user->email                  = $request->email;
        $user->name                     = $request->name;
        $user->phone                    = $request->phone;
        $user->user_role_id             = $request->user_role_id;
        $user->designation             = $request->designation;
        $user->office_address         = $request->office_address;
        $user->send_user_notification   = $request->send_user_notification ?? 0;
        if($request->password)
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
            $this->dbImageField = $user->photo; 
            $user->photo = $this->updateImage();       //its mandatory
            $user->save();
        }
        return redirect()->route('admin.user.index')->with('success','User updated successfully');
    }



    public function bulkChangeStatus (Request $request)
    {
        ini_set('max_execution_time', 28800);
        $users = User::whereIn('id',$request->ids)->get();
        foreach($users as $user){
            if($user->user_role_id != 1)
            {
                $user->status = $request->cstatus;
                $user->save();
            }
        }

        /* User::whereIn('id',$request->ids)->update([
            'status'    => $request->cstatus
        ]); */
        return response()->json([
            'status' => true,
            'mess' => "User status changed successfully"
        ]);
    }

    public function  changeStatus(User $user,$cstatus)
    {
        $data['user'] = $user;
        $data['changingStatus'] = $cstatus;
        $view =  view('backend.users.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    public function changingStatus(User $user , Request $request)
    {
        ini_set('max_execution_time', 28000);
        $sendMailToAuthor = 0;
        if($user->status == 0 && $request->changing_status == 1)
        {
            $sendMailToAuthor = 1;
        }
        if($user->user_role_id == 1)
        {
            return redirect()->back()->with('error','User status not changed');
        }
        $user->status  = $request->changing_status;
        $user->save();

        if($sendMailToAuthor == 1)
        {
            Mail::send('email.authorinfo', ['username' => $user->name,'email'=>$user->email,'phone'=>$user->phone,'designation'=>$user->designation,'office_address'=>$user->office_address], function($message) use($user){
                $message->to($user->email);
                $message->subject('Membership Accepted');
            });
        }
        return redirect()->back()->with('success','User status changed successfully');
    }

    


    //not using now.. using status
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\User  $user
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        User::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s'),
            'status'    => 0
        ]);
        return response()->json([
            'status' => true,
            'mess' => "User Deleted Successfully"
        ]);
    }
    public function delete(User $user)
    {
        $data['user'] = $user;
        $view =  view('backend.users.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    public function destroy(User $user)
    {
        $user->deleted_at   = date('Y/m/d h:i:s');
        $user->status  = 0;
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Deleted Successfully');
    }

    
}
