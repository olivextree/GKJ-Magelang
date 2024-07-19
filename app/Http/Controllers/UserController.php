<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function read()
    {
        $data['users'] = User::all();
        return view('admin.user.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $gambar = $request->file;
            $filename = time(). '.' . $gambar->extension();
            $gambar->move(public_path('upload/user'), $filename);
            $savegambar = 'upload/user/'.$filename;
        }
        User::create([
            'name' => $request['name'],
                'email' => $request['email'],
                'birthday' => $request['birthday'],
                'password' => Hash::make($request['password']),
                'address' => $request['address'],
                'phone' => $request['phone'],
                'jk' => $request['jk'],
                'file' => $filename,
                'role' => 'user'
        ]);
        Alert::Success('Berhasil','user berhasil ditambahkan');
        return redirect(route('user.index'));
    }


    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('admin.user.edit',compact('item'));
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
        $item = User::findOrFail($id);
        if($request['password'] != null){
            $password = Hash::make($request['password']);
        }else{
            $password = $item->password;
        }
        if ($request->hasFile('file')) {
            $gambar = $request->file;
            $filename = time(). '.' . $gambar->extension();
            $gambar->move(public_path('upload/user'), $filename);
            $savegambar = 'upload/user/'.$filename;
            $inputdata = [
                'name' => $request['name'],
                'email' => $request['email'],
                'birthday' => $request['birthday'],
                'password' => $password,
                'address' => $request['address'],
                'phone' => $request['phone'],
                'jk' => $request['jk'],
                'file' => $filename,
                'role' => 'user'
            ];
        }else{
            $inputdata = [
                'name' => $request['name'],
                'email' => $request['email'],
                'birthday' => $request['birthday'],
                'password' => $password,
                'address' => $request['address'],
                'phone' => $request['phone'],
                'jk' => $request['jk'],
                'role' => 'user'
            ];
        }
        $item->update($inputdata);
        Alert::Success('Berhasil','user berhasil diupdate');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','user Berhasil Dihapus');
        return redirect(route('user.index'));
    }
}
