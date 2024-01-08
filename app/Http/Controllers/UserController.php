<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('users.index');
        $users=User::get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    validation start
    $request->validate([
    'name'=>'required',
    'email'=>'required',
    'number'=>'required',
     ]);
        
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->number=$request->number;

        $user->save();
        return redirect()->route('users.index')->withSuccess('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::where('id',$id)->first();
        return view('users.edit',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //    validation star
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'number'=>'required',
         ]);
            $user=User::where('id',$id)->first();
            
            $user->name=$request->name;
            $user->email=$request->email;
            $user->number=$request->number;
    
            $user->save();
            return redirect()->route('users.index')->withSuccess('Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        return back()->withSuccess('Data Deleted Successfully');
    }
}
