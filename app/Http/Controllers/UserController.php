<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm'  => 'required|same:password'
        ]);
        $data = User::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name'  => $request->name,
            'email'  => $request->email,
            'phone'   => $request->phone,
            'password' => bcrypt($request->password)
        ]);
        if($data)
        {
            return redirect()->route('user.index')->with('success','Berhasil!');
        }else{
            return redirect()->route('user.index')->with('error','Error');
        }
        
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
        $data = User::all()->where('uuid',$id)->first();
        return view('user.edit',compact('data'));
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
        $data = User::find($id);
        if(empty($request->password))
        {
            $data->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'phone'   => $request->phone,
            ]);
            if($data)
            {
                return redirect()->route('user.index')->with('success','Berhasil!');
            }else{
                return redirect()->route('user.index')->with('error','Error');
            }
        }else{
            $request->validate(['password' => 'required|min:8','confirm' => 'required|same:password']);
            $data->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'phone'   => $request->phone,
                'password' => bcrypt($request->password)
            ]);
            if($data)
            {
                return redirect()->route('user.index')->with('success','Berhasil!');
            }else{
                return redirect()->route('user.index')->with('error','Error');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        if($data)
        {
            return redirect()->route('user.index')->with('success','Berhasil!');
        }else{
            return redirect()->route('user.index')->with('error','Error');
        }
    }
}
