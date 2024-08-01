<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->department_id;
        $faculty=Faculty::where('depart_id',$id)->get();
       return view('Faculties.index')->with('facultys',$faculty);
    }

    
    public function create()
    {
        return view('Faculties.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            // 'name'=>'required|unique:faculties,name',
        ]);
       $uemail=User::where('email',$request['email'])->get();
        $string = Str::random(8);
        $role=Role::where('slug','faculty')->first();
       $d_id=Auth::user()->department_id;
       $user=new User();
       $faculty=new Faculty();
    if(empty($uemail)){
       $user->name=$request['name'];
       $user->email=$request['email'];
       $user->password=Hash::make($string);
       $user->role_id=$role->id;
       $user->department_id= $d_id;
       $user->save();
        }
       $u=User::find($request['email']);
       return $u;
       $faculty->name=$request['name'];
       $faculty->phone_no=$request['phone_no'];
       $faculty->depart_id= $d_id;
       $faculty->user_id= $u->id;
       $faculty->save();
       $detail = [
        'description' => $string,
    ];
    $operator['to']=$request['email'];
    Mail::send('operators.mailindex', $detail, function ($message) use($operator) {
        $message->subject("Hello");
        $message->to($operator['to']);
    });
    Flash::success('Faculty Save Successfully');
    return redirect(route('facultys.index'));

       


    }

   
    public function show($id)
    {
       
        $faculty=Faculty::find($id);
        if(empty($faculty)){
            Flash::error('Department not found');
            return redirect(route('departments.index'));
        }
        
        return view('Faculties.detail')->with('facultys',$faculty);
    }

 
    public function edit(Faculty $faculty)
    {
       
    }

   
    public function update(Request $request, Faculty $faculty)
    {
        
    }

    
    public function destroy(Faculty $faculty)
    {
       
    }
}
